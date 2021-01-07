

<!DOCTYPE html>
<html>
<head>
	<title></title>

    <style>

    .kepalatable{

    	text-align: center;
    }

    tr,td {
    	border: 0px solid black;
    	margin: 0.3px;
    		font-family: arial, sans-serif
    }

    .nomor {
    	margin: 6px;

    }

    .formulir {
    	text-align: right;

    }


    .header {
    	font-family: arial, sans-serif;
        border: 2px solid black;
        border-collapse: collapse;
        width: 100%;

    }

    .header td{
    	font-family: arial, sans-serif;
        border: 2px solid black;
        border-collapse: collapse;
        border-bottom:2px solid black;

    }

    .tablec {
    	font-family: arial, sans-serif;
        border: 2px solid black;
        border-collapse: collapse;
        width: 100%;

    }

    .tablec td{
    	border: 0px solid black;
    	margin: 0.3px;
    	margin-top: 6px;

    }

    .td td{
    	border: none;
    }
    .ahha {

    	font-size: 9px;
    	padding-left: 25px;
    	line-height: 0.3;
    	letter-spacing: -1px;


    }

    .bawahhilang {
    border-bottom:none;

    }

    h4 {

    	margin: 6px;
    	margin-right: px;
    }

    h5 {


    	letter-spacing: 3px;
    }
    .no{
    	margin: 5px;
    }

    .table-table2 h5{

    		margin: 3px;

    }
    a {
    	font-size: 12px;
    	 font-weight: 600;




    }
    b {
    	font-size: 10px;
    	 font-weight: 600;




    }
    .biasa{
    font-size: 11px;

    }


    .delapan{
    	width: 80%;

    }

    span {

    	color: blue;
    	font-size: 11px;
    	vertical-align: sub;


    }

    input{
    	border:none;
    	padding-left: 10px;
    	border-bottom:1px solid black;
    }

    .inputtable{
    	border:none;
    	padding-left: 10px;
    	text-align: right;

    }

    .tdtop{

    	text-align: top;

    }

    .table-table3 {

    	border: 0px solid black;
    	margin: 0.3px;
    	text-align: top;
    }

    .table-table2 {

    	border: none;
    	margin: 0.3px;
    	margin-top: 6px;
    }

    .table-table2 td {

    	border: 0px solid black;
    	margin: 0.3px;
    	margin-top: 6px;
    }

    .table-table4 {

    	font-family: arial, sans-serif;
        border: 2px solid black;
        border-collapse: collapse;
        width: 100%;
        margin-top: 6px;
    }

    .table-table4 td {

    	border: 0px solid black;
    	margin: 0.3px;
    	text-align: left;
    	margin-top: 6px;
    }

    </style>
</head>
<body>
    <table class="table-table3"> <tr> <td>

    		<table class="header">
    			<tr>
    				<td align="center" width="280" rowspan="2"> <img src="http://sdm.bankjateng.co.id/payroll/assets/images/logo.png" width="80" height="80" > <h4>KEMENTRIAN KEUANGAN RI DIREKTORAT JENDERAL PAJAK</h4></td>

    				<td align="center" width="380">
    					<h4>BUKTI PEMOTONGAN PAJAK PENGHASILAN PASAL 21 BAGI PEGAWAI TETAP ATAU PENERIMA
    				PENSIUN ATAU TUNJANGAN HARI TUA/JAMINAN HARI TUA BERKALA</h4>
    				</td>
    				<td align="left" colspan="2" width="210	">
    					<h4 class="formulir">FORMULIR 1721 - A1 </h4>
    					<a class="ahha">Lembar ke-1 : untuk Penerimaan Penghasilan</a><br>
    					<a class="ahha">Lembar ke-2 : untuk Memotong</a>
    				</td>
    			</tr>
    			<tr>
    				<td align="left" width="400" colspan="2">
    					<a class="nomor">NOMOR:</a>
    					<span>H.01</span>
    					<a>1 .1 -</a>
    					<input type="" name="" value="">
    				</td>

    			</tr>


    	</table>
    </td>
    </tr>

    <tr>
    	<td>
    		<h4>A. IDENTITAS PENERIMA PENGHASILAN YANG DI POTONG</h4>
    	</td>
    </tr>
    <tr>
    	<td>
    		<table class="table-table4">
    					<tr>
    					<td>
    						<table >
    							<tr >
    								<td class="tdtop"><a>1. </a></td>
    								<td><a>NPWP</a> </td>
    								<td>:<span>A.01</span></td>
    								<td>
                                        <input type="" name="" value="<?=$data['no_npwp']?>" size="25">
    								</td>
    							</tr>
    							<tr>
    								<td><a>3. </a></td>
    								<td align=left><a>NAMA</a> </td>
    								<td>:<span>A.03</span></td>
    								<td><input type="" name="" value="<?=$data['nama']?>" size="43">
    								</td>
    							</tr>
                  <tr>
    								<td><a>4. </a></td>
    								<td><a>ALAMAT</a> </td>
    								<td>:<span>A.04</span></td>
    								<td><input type="" name="" value="<?=$data['alamat']?>" size="43"	 >
    								</td>
    							</tr>
                  <tr>
    								<td>
    									<a>5. </a>
    								</td>
    								<td colspan="3">
    									<a>WAJIB PAJAK LUAR NEGERI</a> :
    									<span>A.05</span>
    									<input type="checkbox"> <a>YA</a>
    								</td>

    							</tr>

    						</table>
    					</td>
    					<td valign=top>
    						<table valign=top>
    							<tr>
    								<td><a>2. </a></td>
    								<td><a>NIK / NO.PASPOR</a> :
                      <span>A.02</span>

                      <input type="" name="" value="<?=$data['ktp']?>" size="30">

                    </td>

                  </tr>
    							<tr>
    								<td><a>6. </a></td>
    								<td><a>KODE NEGARA DOMISILI</a> </a>:
    									<span>A.06</span>
    									<input type="" name="" value="IND" size="7">
    								</td>
    							</tr>


    						</table>
    					</td>

    		</table>
    	</td>
    </tr>
    <tr>
    	<td>
    		<h4>B. PPh PASAL 21 DAN/ATAU PASAL 26 YANG DIPOTONG</h4>
    	</td>

    </tr>
    <tr>
    	<td>
    		<table class="header">
    			<tr>
    				<td class="kepalatable" width="200">
    					<a >KODE OBJEK PAJAK</a>
    				</td>
    				<td class="kepalatable" width="150">
              <a>JUMLAH </br>PENGHASILAN BRUTO</br>(RP)</a>
            </td>
            <td class="kepalatable" width="150">
              <a>DASAR PENGENAAN</br>PAJAK </br>(RP)</a>
            </td>
            <td class="kepalatable" width="75">
              <a>TARIF LEBIH </br>TINGGI 20% </br>(TIDAK BER- </br>NPWP)</a>
            </td>
            <td class="kepalatable" width="75">
              <a>TARIF</br>(%)</a>
            </td>
            <td class="kepalatable" width="150">
              <a>PPh DIPOTONG</br>(RP)</a>
            </td>
    			</tr>
          <tr>
    				<td bgcolor="gray" style="text-align: center">
    					<a >(1)</a>
    				</td>
    				<td bgcolor="gray" style="text-align: center">
              <a>(2)</a>
            </td>
            <td bgcolor="gray" style="text-align: center">
              <a>(3)</a>
            </td>
            <td bgcolor="gray" style="text-align: center">
              <a>(4)</a>
            </td>
            <td bgcolor="gray" style="text-align: center">
              <a>(5)</a>
            </td>
            <td bgcolor="gray" style="text-align: center">
              <a>(6)</a>
            </td>
    			</tr>
          <tr>
    				<td style="text-align: center">
    					<a >21   -    100    -   03</a>
    				</td>
    				<td style="text-align: center">
              <a>Gaji perbulan</a>
            </td>
            <td style="text-align: center">
              <a>0</a>
            </td>
            <td style="text-align: center">
              <a>0</a>
            </td>
            <td style="text-align: center">
              <a>5</a>
            </td>
            <td style="text-align: center">
              <a>0</a>
            </td>
    			</tr>
    			</table>
    	</td>

    </tr>
    <tr>
    	<td>
    		<h4>C. IDENTITAS PEMOTONGAN</h4>
    	</td>
    </tr>
    <tr>
    	<td>
    		<table class="tablec">
    		<tr>
    			<td class="tdtop"><a class="no">1. </a>
    				<a>NPWP</a>
    				:<span>C.01</span>
    				<input type="" name="" value="011071495511000" size="25">
    			</td>
    			<td rowspan="2">
    				<table class="table-table2">
    					<tr>
    						<td>
    							<a>3. </a>
    							<a>TANGGAL & TANDA TANGAN</a>
    						</td>
    					</tr>
    					<tr>
    						<td>
    							<span>C.03</span>

    							<input type="" name="" value="31" size="1">
    							<a>-</a>
    							<input type="" name="" value="12" size="1">
    							<a>-</a>
    							<input type="" name="" value="2019" size="8">
    						</td>
    					</tr>
    				</table>
    			</td>
    			<td class="" rowspan="2">
    				<table class="header">

    					<tr>
    						<td width="110" height="55" style="text-align: center">

    						</td>
    					</tr>
    				</table>

    			</td>
    		</tr>
    		<tr>
    			<td> <a class="no">2. </a>
    				<a>NAMA</a>
    				:<span>C.02</span>
    				<input type="" name="" value="PT.BANK PEMBANGUNAN DAERAH JAWA TENGAH" size="50">
    			</td>
    		</tr>

    		</table>
    	</td>

    </tr>
    <tr>
    	<td>
    		<h4>&nbsp;</h4>
    	</td>
    </tr>
    <tr>
    	<td>
    		<table class="tablec">
    		<tr>
    			<td bgcolor="gray" style="text-align: center">
    				<a>KODE OBJEK PAJAK PENGHASILAN PASAL 21 (TIDAK FINAL) ATAU PASAL 26</a>
    			</td>
    		</tr>
        <tr>
    			<td >
            <b>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>PPh PASAL 21 TIDAK FINAL</strong></br>
            1.&nbsp;&nbsp;21-100-03&nbsp;Upah Pegawai Tidak Tetap atau Tenaga Kerja Lepas</br>
            2.&nbsp;&nbsp;21-100-04&nbsp;Imbalan Kepada Distributor Multi Level Marketing (MLM)</br>
            3.&nbsp;&nbsp;21-100-05&nbsp;Imbalan Kepada Petugas Dinas Luar Asuransi</br>
            4.&nbsp;&nbsp;21-100-06&nbsp;Imbalan Kepada Penjaja Barang Dagangan</br>
            5.&nbsp;&nbsp;21-100-07&nbsp;Imbalan Kepada Tenaga Ahli</br>
            6.&nbsp;&nbsp;21-100-08&nbsp;Imbalan Kepada Bukan Pegawai yang Menerima Penghasilan yang Bersifat Berkesinambungan</br>
            7.&nbsp;&nbsp;21-100-09&nbsp;Imbalan Kepada Bukan Pegawai yang Menerima Penghasilan yang Tidak Bersifat Berkesinambungan</br>
            8.&nbsp;&nbsp;21-100-10&nbsp;Honorarium atau Imbalan Kepada Anggota Dewan Komisaris atau Dewan Pengawas yang tidak Merangkap sebagai Pegawai Tetap</br>
            9.&nbsp;&nbsp;21-100-11&nbsp;Jasa Produksi, Tantiem, Bonus atau Imbalan Kepada Mantan Pegawai</br>
            10.&nbsp;21-100-12&nbsp;Penarikan Dana Pensiun oleh Pegawai</br>
            11.&nbsp;21-100-13&nbsp;Imbalan Kepada Peserta Kegiatan</br>
            12.&nbsp;21-100-14&nbsp;Objek PPh Pasal 21 Tidak Final Lainnya</br></br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>PPh PASAL 26</strong></br>
            1.&nbsp;&nbsp;27-100-99&nbsp;Imbalan sehubungan dengan jasa, pekerjaan dan kegiatan, hadiah dan penghargaan, pensiun dan pembayaran berkala lainnya yang dipotong PPh Pasal 26</br>
    			</td>
    		</tr>
    		</table>
    	</td>

    </tr>
    </table>





</body>
</html>
