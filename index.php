<?php

header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-headers: *");

include "/database/dbconn.php";
$objdb = new DbConnect;
$conn = $objdb->connect();
var_dump($conn);