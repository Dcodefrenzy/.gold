<?php 
	ob_start();
	$page_title = "preview";
	include "includes/header2.php";
	if(!isset($_SESSION['id'])){
	$user_id = $sid;

	}else{
	$user_id = $_SESSION['id'];

	}
	if(isset($_GET['hid'])){
	$id = $_GET['hid'];
}else{
	header('Location:home');
}

/*	 $result = viewpreviewProduct($conn, $hash_id);
	 extract($result);*/

	$show = fetchPreviewProducts($conn, $id);
	extract($show);
	  if ($inventory == 0) {
		$inventory= "<h4 style=color:red;>Out Of Stock!</h4>";
		}

	if ($id!=$hash_id ) {
		header('Location:home');
	}


	$error = [];

	if(array_key_exists("submit", $_POST)){
		if(empty($_POST['quantity'])){
			$error['quantity'] = "Please add quantity";
		}
		if(!is_numeric($_POST['quantity'])){
			$error['quantity'] = "Please add numeric value";
		}
		if($inventory < $_POST['quantity'] || $_POST['quantity'] < 1){
			$error['quantity'] = "<div class='alert alert-danger' role='alert'>
										<strong>whoops!</strong> The quantity you entered is more that stocked 
			  						 </div>";
		}
		if(empty($error)){
			$clean = array_map('trim', $_POST);
			$total_price = $clean['quantity'] * $price;

			addToCart($conn, $user_id, $hash_id, $product_name, $total_price,$price, $clean);
		}
	}


 ?>
	<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="home">Home</a></li>
					<li class="active">Single</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--start-single-->
	<div class="single contact">
		<div class="container">
			<div class="single-main">
				<div class="col-md-9 single-main-left">
				<div class="sngl-top">
					<div class="col-md-5 single-top-left">	
						<div class="flexslider">
							  <ul class="slides">
								<li data-thumb="images/s-1.jpg">
									<div class="thumb-image"> <img src=<?php echo $file_path; ?> data-imagezoom="true" class="img-responsive" alt=""/> </div>
								</li>
							<!-- 	<li data-thumb="images/s-2.jpg">
									 <div class="thumb-image"> <img src="images/s-2.jpg" data-imagezoom="true" class="img-responsive" alt=""/> </div>
								</li>
								<li data-thumb="images/s-3.jpg">
								   <div class="thumb-image"> <img src="images/s-3.jpg" data-imagezoom="true" class="img-responsive" alt=""/> </div>
								</li>  -->
							  </ul>
						</div>
						<!-- FlexSlider -->
						<script src="js/imagezoom.js"></script>
						<script defer src="js/jquery.flexslider.js"></script>
						<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

						<script>
						// Can also be used with $(document).ready()
						$(window).load(function() {
						  $('.flexslider').flexslider({
							animation: "slide",
							controlNav: "thumbnails"
						  });
						});
						</script>
					</div>	
					<div class="col-md-7 single-top-right">
						<div class="single-para simpleCart_shelfItem">
						<h2><?php echo $product_name; ?></h2>
							<div class="star-on">
							<!-- 	<ul class="star-footer">
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
									</ul> -->
								<div class="review">
									<a href="#"><b>Stock <?php echo $inventory  ?></b> </a>
									
								</div>
							<div class="clearfix"> </div>
							</div>
							
							<h5 class="item_price"><?php echo $price; ?></h5>
							<p><?php echo $description; ?></p>
							<div class="available">
								<?php 

										  if ($inventory == 0) {
										echo  	"<form action='home'>
     									 <div  class='btn btn-warning'><a href='product' style=color:white; >Out Of Stock</a></div>
     									</div>
									</form>";
   										}else{
								 ?>
								<form method="POST">
									 <?php $display = displayErrors($error, 'quantity'); echo $display; ?>
									<input type="number" name="quantity" placeholder="Quantity" required="" size="5">
									
								</div>
								<input type="submit" value="Add to Cart" name="submit" class='btn btn-warning'>

							</form>
							<?php } ?>

						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<!-- <div class="tabs">
					<ul class="menu_drop">
				<li class="item1"><a href="#"><img src="images/arrow.png" alt="">Description</a>
					<ul>
						<li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
						<li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
						<li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
					</ul>
				</li>
				<li class="item2"><a href="#"><img src="images/arrow.png" alt="">Additional information</a>
					<ul>
					    <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
						<li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
					</ul>
				</li>
				<li class="item3"><a href="#"><img src="images/arrow.png" alt="">Reviews (10)</a>
					<ul>
						<li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
						<li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
						<li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
					</ul>
				</li>
				<li class="item4"><a href="#"><img src="images/arrow.png" alt="">Helpful Links</a>
					<ul>
					    <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
						<li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
					</ul>
				</li>
				<li class="item5"><a href="#"><img src="images/arrow.png" alt="">Make A Gift</a>
					<ul>
						<li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
						<li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
						<li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
					</ul>
				</li>
	 		</ul>
				</div> -->
				<?php userDisplayTopSelling($conn) ?>
			<!-- 	<div class="latestproducts">
					<div class="product-one">
						<div class="col-md-4 product-left p-left"> 
							<div class="product-main simpleCart_shelfItem">
								<a href="single.html" class="mask"><img class="img-responsive zoom-img" src="images/p-1.png" alt="" /></a>
								<div class="product-bottom">
									<h3>Smart Watches</h3>
									<p>Explore Now</p>
									<h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">$ 329</span></h4>
								</div>
								<div class="srch">
									<span>-50%</span>
								</div>
							</div>
						</div>
						<div class="col-md-4 product-left p-left"> 
							<div class="product-main simpleCart_shelfItem">
								<a href="single.html" class="mask"><img class="img-responsive zoom-img" src="images/p-2.png" alt="" /></a>
								<div class="product-bottom">
									<h3>Smart Watches</h3>
									<p>Explore Now</p>
									<h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">$ 329</span></h4>
								</div>
								<div class="srch">
									<span>-50%</span>
								</div>
							</div>
						</div>
						<div class="col-md-4 product-left p-left"> 
							<div class="product-main simpleCart_shelfItem">
								<a href="single.html" class="mask"><img class="img-responsive zoom-img" src="images/p-3.png" alt="" /></a>
								<div class="product-bottom">
									<h3>Smart Watches</h3>
									<p>Explore Now</p>
									<h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">$ 329</span></h4>
								</div>
								<div class="srch">
									<span>-50%</span>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
				<div class="col-md-3 single-right">
					<div class="w_sidebar">
						<section  class="sky-form">
							<h4>Catogories</h4>
							<div class="row1 scroll-pane">
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>All Accessories</label>
								</div>
								<div class="col col-4">								
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Women Watches</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Kids Watches</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Men Watches</label>			
								</div>
							</div>
						</section>
						<section  class="sky-form">
							<h4>Brand</h4>
							<div class="row1 row2 scroll-pane">
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>kurtas</label>
								</div>
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Sonata</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Titan</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Casio</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Omax</label>
									<label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>shree</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Fastrack</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Sports</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Fossil</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Maxima</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Yepme</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Citizen</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Diesel</label>			
								</div>
							</div>
						</section>
						<section class="sky-form">
							<h4>Colour</h4>
								<ul class="w_nav2">
									<li><a class="color1" href="#"></a></li>
									<li><a class="color2" href="#"></a></li>
									<li><a class="color3" href="#"></a></li>
									<li><a class="color4" href="#"></a></li>
									<li><a class="color5" href="#"></a></li>
									<li><a class="color6" href="#"></a></li>
									<li><a class="color7" href="#"></a></li>
									<li><a class="color8" href="#"></a></li>
									<li><a class="color9" href="#"></a></li>
									<li><a class="color10" href="#"></a></li>
									<li><a class="color12" href="#"></a></li>
									<li><a class="color13" href="#"></a></li>
									<li><a class="color14" href="#"></a></li>
									<li><a class="color15" href="#"></a></li>
									<li><a class="color5" href="#"></a></li>
									<li><a class="color6" href="#"></a></li>
									<li><a class="color7" href="#"></a></li>
									<li><a class="color8" href="#"></a></li>
									<li><a class="color9" href="#"></a></li>
									<li><a class="color10" href="#"></a></li>
								</ul>
						</section>
						<section class="sky-form">
							<h4>discount</h4>
							<div class="row1 row2 scroll-pane">
								<div class="col col-4">
									<label class="radio"><input type="radio" name="radio" checked=""><i></i>60 % and above</label>
									<label class="radio"><input type="radio" name="radio"><i></i>50 % and above</label>
									<label class="radio"><input type="radio" name="radio"><i></i>40 % and above</label>
								</div>
								<div class="col col-4">
									<label class="radio"><input type="radio" name="radio"><i></i>30 % and above</label>
									<label class="radio"><input type="radio" name="radio"><i></i>20 % and above</label>
									<label class="radio"><input type="radio" name="radio"><i></i>10 % and above</label>
								</div>
							</div>						
						</section>
					</div> -->
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--end-single-->
	<!--footer-starts-->
	<?php include "includes/footer.php"; ?>