<?php
	class User_model extends CI_Model{
			public function __construct(){
				$this->load->database();
			}
			

			
			public function AuthLDAP($username, $password){
		        $adServer = "ldap://bankjateng.co.id";

		        $ldap = ldap_connect($adServer, 389);

		        ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
		        ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

		        $bind = @ldap_bind($ldap, $username, $password);

		        if ($bind) {
		            $filter="(sAMAccountName=$username)";
		            $result = ldap_search($ldap,"OU=PC User,OU=UserBJTG,DC=bankjateng,DC=co,DC=id",$filter);
		            @ldap_sort($ldap,$result,"sn");
		            $info = ldap_get_entries($ldap, $result);
		            //print_r($info);
		            //print_r($info[0]);

		            // echo $info[0]["cn"][0];  //username
		            // echo $info[0]["employeeid"][0];  //nip
		            // echo $info[0]["physicaldeliveryofficename"][0]; //unit_kerja_id
		            // echo $info[0]["userprincipalname"][0]; //email
		            // echo $info[0]["department"][0]; //jabatan_id
		            // echo $info[0]["givenname"][0]; //nama

		            $hasil = array("cn"                             => $info[0]["cn"][0],                           //id
		                            "nip"                           => $info[0]["employeeid"][0],                   //nip
		                            "unit_kerja_id"                 => $info[0]["physicaldeliveryofficename"][0],   //unit_kerja_id
		                            "username"                      => $info[0]["userprincipalname"][0],            //username
		                            "nama"                          => $info[0]["givenname"][0],                    //nama
		                            "jenjang_jabatan_id"            => $info[0]["description"][0],                    //nama
		                            "jabatan_id"                    => $info[0]["department"][0]);                  //jabatan_id
		            @ldap_close($ldap);
		            
		        } else {
		            $hasil = false;
		        }

		        return $hasil;
		    }

		    public function authNonAD($username, $password){
		        $hasil=$this->db->get_where("pegawai",array("pegawai_id" => $username,"pegawai_id" => $password))->row_array();
		        return $hasil;
		    }
		    public function getPegawai($nip){
		        $hasil=$this->db->get_where("pegawai",array("pegawai_id" => $nip))->row_array();
		        return $hasil;
		    }
		    public function getUnit($unit_kerja_id_penempatan){
		        $hasil=$this->db->get_where("unit_kerja_mikro",array("kode_unit" => $unit_kerja_id_penempatan))->row_array();
		        return $hasil;
		    }
			//check username exists
			public function check_username_exists($username){
				$query = $this->db->get_where('users',array('username' => $username));

				if(empty($query->row_array())){
					return true;
				}else{
					return false;
				}
			}

			//check email exists
			public function check_email_exists($email){
				$query = $this->db->get_where('users',array('email' => $email));

				if(empty($query->row_array())){
					return true;
				}else{
					return false;
				}
			}

		}

?>
