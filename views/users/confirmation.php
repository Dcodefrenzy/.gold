<?php  
ob_start();
$page_title = "Comfirmation";
include "includes/header2.php";

	if(!isset($_SESSION['id'])){
    header("Location:register");
  }
 	else{
 	$user_id = $_SESSION['id'];
 	}
 	if (isset($_GET['hash_id'])) {
 		$hash_id = $_GET['hash_id'];
 	}
	getQuantityforinventory($conn, $user_id);

 	delALLCart($conn, $user_id);

 	?>



 
				<?php displayCustomerCheckout($conn, $user_id, $hash_id ); ?>
	
				</div>