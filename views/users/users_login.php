	<?php 
	ob_start();
	$page_title="Login";
	include "includes/header2.php"; 

$error =  []; 
if(array_key_exists('login', $_POST)){

  if(empty($_POST['email'])){
    $error['email'] = "Please enter email";
  }
  if(empty($_POST['hash'])){
    $error['hash'] = "please enter password";
  }

  if(empty($error)){
    $clean = array_map('trim', $_POST);

    userLogin($conn, $sid, $clean);
  }
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
							<?php $display = displayErrors($error, 'email'); echo $display; ?>
						<input placeholder="Email" type="text" tabindex="3" required name="email">
						<?php $display = displayErrors($error, 'hash'); echo $display; ?>
						<input placeholder="password" type="password" tabindex="4" required name="hash">
						<div class="address">
							<a class="forgot" href="#">Forgot Your Password?</a>
							<input type="submit" value="Login" name="login">
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-6 account-right account-left">
					<h3>New User? Create an Account</h3>
					<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
					<a href="register">Create an Account</a>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<?php include "includes/footer.php"; ?>