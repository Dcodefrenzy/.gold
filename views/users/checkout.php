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
 	$cart_numb = getCart($conn, $user_id);
	if($cart_numb < 1){
	header("Location:cart");
	}

 
	
	$error = [];

if(array_key_exists('Checkout', $_POST)){

  if(empty($_POST['name'])){
    $error['name']="Enter a fulltname";
  }



  if(empty($_POST['adress'])){
    $error['adress']="Enter an adress";
  }

  if(empty($_POST['phone_number'])){
    $error['phone_number']="Enter a email";
  }


  if(empty($error)){
   	$clean = array_map('trim', $_POST);
    addCheckout($conn, $user_id, $clean);
  }
}




?>

<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="index.html">Home</a></li>
					<li class="active">Register</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--register-starts-->
	<div class="register">
		<div class="container">
			<div class="register-top heading">
				<h2>REGISTER</h2>
			</div>
			<div class="register-main">
				<div class="col-md-6 account-left">
					<form method="POST">
						<?php  $display = displayErrors($error, 'name'); echo $display; ?>
						<input placeholder="Full name" type="text" tabindex="1" required name="name">
						<?php  $display = displayErrors($error, 'phone_number'); echo $display; ?>
						<input placeholder="Phone Number" type="text" tabindex="2" required name="phone_number">
						<?php  $display = displayErrors($error, 'adress'); echo $display; ?>
						<input placeholder="Main Address" type="text" tabindex="3" required name="adress">
				</div>
				<div class="col-md-6 account-left">
					<?php  $display = displayErrors($error, 'password'); echo $display; ?>
					<input placeholder="Password" type="password" tabindex="4" required name="password">
					<?php  $display = displayErrors($error, 'pword'); echo $display; ?>
						<input placeholder="Retype password" type="password" tabindex="4" required name="pword">
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="address submit">
							<input type="submit" value="Checkout" name="Checkout">
						</form>
						</div>

		</div>
	</div>
	<!--register-end-->


	<?php include "includes/footer.php"; ?>