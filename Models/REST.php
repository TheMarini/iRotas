<?php
//// JSon request format is :
//// {"userName":"654321@zzzz.com","password":"12345","emailProvider":"zzzz"}
//
//// read JSon input
//$data_back = json_decode(file_get_contents('php://input'));
//
//// set json string to php variables
//$placa = $data_back->{"placa"};
//$latitude = $data_back->{"latitude"};
//$longitude = $data_back->{"longitude"};
//
//// create json response
//$responses = array();
//for ($i = 0; $i < 10; $i++) {
//    $responses[] = array("placa" => $placa, "latitude" => $userName, "longitude" => $longitude);
//}
//
//// JSon response format is :
//// [{"name":"eeee","email":"eee@zzzzz.com"},
//// {"name":"aaaa","email":"aaaaa@zzzzz.com"},{"name":"cccc","email":"bbb@zzzzz.com"}]
//
//// set header as json
//header("Content-type: application/json");
//
//// send response
//echo json_encode($responses);

include('SQL_config.php');
?>
