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

if(array_key_exists('checkout', $_POST)){


  if(empty($_POST['name'])){
    $error['name']="Enter a fullname";
  }



  if(empty($_POST['adress'])){
    $error['adress']="Enter an adress";
  }

  if(empty($_POST['phone_number'])){
    $error['phone_number']="Enter your Phone Number";
  }


  if(empty($error)){
  	
   	$clean = array_map('trim', $_POST);

    addCheckout($conn, $user_id, $clean);
  }
  checkInventory($conn, $user_id);
}




?>

<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="hime">Home</a></li>
					<li class="active">Login</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--account-starts-->
	<div class="account">
		<div class="container">
		<div class="account-top heading">
				<h2>ACCOUNT</h2>
			</div>
			<div class="account-main">
				<div class="col-md-6 account-left">
					<h3>Existing User</h3>
					<div class="account-bottom">
						<form method="POST">
							<?php $display = displayErrors($error, 'name'); echo $display; ?>
						<input placeholder="Full name" type="text" tabindex="3" required name="name">
						<?php $display = displayErrors($error, 'adress'); echo $display; ?>
						<input placeholder="Adress" type="text" tabindex="4" required name="adress">
						<?php $display = displayErrors($error, 'phone_number'); echo $display; ?>
						<input placeholder="Phone Number" type="text" tabindex="4" required name="phone_number">
						<div class="address">
							<a class="forgot" href="#">Forgot Your Password?</a>
							<input type="submit" value="Checkout" name="checkout">
							</form>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<div class="col-md-6 account-right account-left">
					<div class="in-check" >
						<ul class="unit">
							
							<li style="width: 20%" ><span>Product Name</span></li>
							<li style="width: 20%"><span>Quantity</span></li>
							<li style="width: 20%"><span>Price</span></li>
							<div class="clearfix"> </div>
					</ul>
						<?php displayCheckout($conn, $user_id); ?>
						
	
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<?php include "includes/footer.php"; ?>