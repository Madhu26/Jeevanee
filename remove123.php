<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

$fname = $_GET["id"];
//echo "$fname";
if($fname!=""){
  $result = $mysqli->query('DELETE FROM products WHERE product_code ="'. $fname .'"');
  if($result){
	  echo "Done";
	header("location:admin.php");
  }
  else{
	  //echo "Not Done";
  }
}


//$result = $mysqli->query('Select password from users WHERE id ='.$_SESSION['id']);

//$obj = $result->fetch_object();


//else {
//  echo 'Wrong Password. Please try again. <a href="account.php">Go Back</a>';
//}

//header("location:success.php");


?>
