<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

//$tres = file_get_contents("http://simona.bankjateng.co.id/treasurymiddle/web/jetfx?access-token=X2h7lAjGCTaE_rruadZrKhZKY1qM1AcL");
//$tres = json_decode($tres, true);

//print_r($tres);

$ch = curl_init();

//curl_setopt($ch, CURLOPT_URL,"https://eoffice.bankjateng.co.id/html/lifeatbankjateng_v2/api/updatekurs?id=XX&currency=XX&bid=XX&offer=XX&created_date=XX&time_date=XX&status=XX&bid_last=XX&bid_offer=XX");
// curl_setopt($ch, CURLOPT_URL,"http://10.64.5.40/sikeren/zdwh/insertdwh");
curl_setopt($ch, CURLOPT_URL,"http://magang.bankjateng.co.id/zdwh/insertdwh");
// curl_setopt($ch, CURLOPT_POST, 1);
// curl_setopt($ch, CURLOPT_POSTFIELDS, array("data" => json_encode($tres)));
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec($ch);

//print_r($tres);

curl_close ($ch);

//echo $server_output;

$file= dirname(__FILE__) . '/output.txt';
$server_output = $server_output. " ".date("Y-m-d H:i:s")."\n";
file_put_contents($file, $server_output,FILE_APPEND);

?>