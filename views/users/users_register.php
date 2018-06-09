<?php 
ob_start();
include "includes/header2.php"; 
	
	$error = [];

if(array_key_exists('register', $_POST)){

  if(empty($_POST['fname'])){
    $error['fname']="Enter a firstname";
  }

  if(empty($_POST['lname'])){
    $error['lname']="Enter a lastname";
  }

  if(empty($_POST['email'])){
    $error['email']="Enter a email";
  }

  if(doesUserEmailExist($conn,$_POST['email'])){
    $error['email'] = "email already exists";
  }
  if(empty($_POST['pnumber'])){
    $error['pnumber']="Enter a email";
  }

  if(empty($_POST['password'])){
    $error['password']="Enter a password";
  }
  if(empty($_POST['pword'])){
    $error['pword']="enter confirm password";
  }

  if($_POST['pword']!=$_POST['password']){
    $error['pword']="Password mismatch";
  }

  if(empty($error)){
    $clean = array_map('trim', $_POST);
    doUserRegister($conn, $clean, $sid);
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
						<?php  $display = displayErrors($error, 'fname'); echo $display; ?>
						<input placeholder="First name" type="text" tabindex="1" required name="fname">
						<?php  $display = displayErrors($error, 'lname'); echo $display; ?>
						<input placeholder="Last name" type="text" tabindex="2" required name="lname">
						<?php  $display = displayErrors($error, 'email'); echo $display; ?>
						<input placeholder="Email address" type="text" tabindex="3" required name="email">
						<?php  $display = displayErrors($error, 'uname'); echo $display; ?>
						<input placeholder="User Name" type="text" tabindex="3" required name="uname">
						<?php  $display = displayErrors($error, 'pnumber'); echo $display; ?>
						<input placeholder="Mobile" type="text" tabindex="3" required name="pnumber">
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
							<input type="submit" value="Submit" name="register">
						</form>
						</div>
		</div>
	</div>
	<!--register-end-->


	<?php include "includes/footer.php"; ?>