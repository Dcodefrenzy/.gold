<?php 
ob_start();
include "includes/header2.php";
if (isset($_GET['cart_id'])) {
	$cart_id = $_GET['cart_id'];

}
 if(!isset($_SESSION['id'])){
 	$user_id = $sid;

}else{
 	$user_id = $_SESSION['id'];

}
	delCart($conn, $user_id, $cart_id);
	header('Location:cart');
 ?>