<?php

include 'config.php';

$fname = $_POST["code"]; //code
$lname = $_POST["name"]; 
$address = $_POST["des"];
$city = $_POST["image"];
$pin = $_POST["qty"];
$email = $_POST["price"];


if($mysqli->query("INSERT INTO products (product_code,product_name,product_desc,product_img_name,qty,price) VALUES('$fname', '$lname', '$address', '$city', $pin, '$email')")){
	echo 'Data inserted';
	echo '<br/>';
}

header ("location:admin.php");

?>
