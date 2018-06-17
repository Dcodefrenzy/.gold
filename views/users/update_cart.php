<?php
ob_start();
$page_title = "Preview";
include 'includes/header.php';
	if(!isset($_SESSION['id'])){
	$user_id = $sid;

	}else{
	$user_id = $_SESSION['id'];

	}if (isset($_GET['stock'])) {
		$stock = $_GET['stock'];
	}
			$error = [];

		if(array_key_exists("update", $_POST)){
			if(empty($_POST['quantity'])){
				$error['quantity'] = "Please input a value";
				 }
			if ($stock < $_POST['quantity'] || $_POST['quantity'] < 1) {
				 $error['quantity']= 'Whoops! The quantity you entered is more than stocked';
				 header("Location:cart");
				 } else{ $clean = array_map("trim",$_POST);
					editCart($conn,$clean,$_GET['cart_id']);
			}
		}