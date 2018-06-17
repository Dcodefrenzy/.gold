<?php  
ob_start();
$page_title = "Checkout";
include "includes/header2.php";

	if(!isset($_SESSION['id'])){
    header("Location:register");
  }
 	else{
 	$user_id = $_SESSION['id'];
 	}
 	delALLCart($conn, $user_id);

 	?>