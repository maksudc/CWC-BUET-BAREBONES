<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$data = array("name" => "Hagrid", "age" => "36");
$data_string = json_encode($data);

$ch = curl_init('http://localhost:9090/code/api/category/add');

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_string))
);

$result = curl_exec($ch);

print_r($result);
