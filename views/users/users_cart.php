
<?php 
ob_start();
include "includes/header2.php"; 
 
 if(!isset($_SESSION['id'])){
 	$user_id = $sid;
 $row = selectCart($conn, $user_id);
 	extract($row);

}else{
 	$user_id = $_SESSION['id'];

 		$row = selectCart($conn, $user_id);
 		extract($row);
}if (isset($_GET['msg'])) {
	$msg = $_GET ['msg'];
}


?>
	<!--bottom-header-->
	<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="index.html">Home</a></li>
					<li class="active">cart</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--start-ckeckout-->
	<div class="ckeckout">
		<div class="container">
			<div class="ckeck-top heading">
				<h2>cart</h2>
			</div>
			<div class="ckeckout-top">
			<div class="cart-items">
			 <h3>My Shopping Bag (3)</h3>
		<!-- 		<script>$(document).ready(function(c) {
					$('.close1').on('click', function(c){
						$('.cart-header').fadeOut('slow', function(c){
							$('.cart-header').remove();
						});
						});	  
					});
			   </script>
			<script>$(document).ready(function(c) {
					$('.close2').on('click', function(c){
						$('.cart-header1').fadeOut('slow', function(c){
							$('.cart-header1').remove();
						});
						});	  
					});
			   </script>
			   <script>$(document).ready(function(c) {
					$('.close3').on('click', function(c){
						$('.cart-header2').fadeOut('slow', function(c){
							$('.cart-header2').remove();
						});
						});	  
					});
			   </script> -->
				
			<div class="in-check" >
				<ul class="unit">
					<li style="width: 20%"><span>Item</span></li>
					<li style="width: 20%"><span>Product Name</span></li>		
					<li style="width: 20%"><span>update</span></li>
					<li style="width: 20%"><span>price</span></li>
					<li style="width: 20%"> <span>Remove</span></li>
					<div class="clearfix"> </div>
				</ul>
				<?php selectFromCart($conn, $user_id) ?>
				<h3 class="b3">
					<a href="checkout"><span class="label label-success">Go to checkout</span></a>
				</h3>
				<!-- <ul class="cart-header">
					<div class="close1"> </div>
						<li class="ring-in"><a href="single.html" ><img src="images/c-1.jpg" class="img-responsive" alt=""></a>
						</li>
						<li><span class="name">Analog Watches</span></li>
						<li><span class="cost">$ 290.00</span></li>
						<li><span>Free</span>
						<p>Delivered in 2-3 business days</p></li>
					<div class="clearfix"> </div>
				</ul>
				<ul class=" cart-header1">
					<div class="close2"> </div>
						<li class="ring-in"><a href="single.html" ><img src="images/c-2.jpg" class="img-responsive" alt=""></a>
						</li>
						<li><span class="name">Analog Watches</span></li>
						<li><span class="cost">$ 300.00</span></li>
						<li><span>Free</span>
						<p>Delivered in 2-3 business days</p></li>
						<div class="clearfix"> </div>
				</ul>
				<ul class="cart-header2">
					<div class="close3"> </div>
						<li class="ring-in"><a href="single.html" ><img src="images/c-3.jpg" class="img-responsive" alt=""></a>
						</li>
						<li><span class="name">Analog Watches</span></li>
						<li><span class="cost">$ 360.00</span></li>
						<li><span>Free</span>
						<p>Delivered in 2-3 business days</p></li>
						<div class="clearfix"> </div>
				</ul> -->
			</div>
			</div>  
		 </div>
		</div>
	</div>

	<!--end-ckeckout-->
	<!--footer-starts-->
	<?php 
	include "includes/footer.php";

	 ?>