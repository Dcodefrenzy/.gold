	<?php 
	ob_start();
	include "includes/header2.php"; 
	$record_per_page = 20;
	$page = "";
	if(isset($_GET['page'])){
	$page = $_GET['page'];
	}else{
	$page = 1;
	}
														
	$start_from = ($page-1)*$record_per_page;
	//Fetching products by Final category.
	if(isset($_GET['hid'])){
		$hash_id = $_GET['hid'];
		$show = showProducts($conn, $hash_id, $start_from, $record_per_page);
		$pargination = getPagination($conn, $hash_id, $record_per_page);
	 	$total_record = getTotalRecordForProductId($conn, $hid,  $record_per_page);
	 	//fetching products by main category
	}elseif(isset($_GET['sub_cat_id'])) {
		$sub_cat = $_GET['sub_cat_id'];
		$show = showProductsBySubCat($conn, $sub_cat, $start_from, $record_per_page);
		$pargination = getPaginationBySubCat($conn, $sub_cat, $record_per_page);
		$total_record = getTotalRecordForSubCat($conn, $sub_cat,  $record_per_page);
		//fetching All Products.
	}elseif(isset($_GET['cat_id'])){
		$cat_id = $_GET['cat_id'];
		$show = showProductsByCatId($conn, $cat_id, $start_from, $record_per_page);
		$pargination = getPaginationByCatId($conn, $cat_id, $record_per_page);
		$total_record = getTotalRecordForCatId($conn, $cat_id,  $record_per_page);
		//fetching products by sub category 
	}else{
 		$show = showAllProducts($conn, $start_from, $record_per_page);
 		$pargination = getPaginationForAllProduct($conn,  $record_per_page);
 		//to get total records
 		 $total_record = getTotalRecord($conn,  $record_per_page);
 	}

 			//Generating $preview and $next.
		if($page > 1){
 			$prev = $page - 1;
 		}else{
 			$prev = 1;
 		}
 		if($total_record > 1 &&  $page != $total_record){
 			$next = $page + 1;
 		}
 		else{
 			$next = $total_record;
 		}
	?>

	<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="index.html">Home</a></li>
					<li class="active">New Products</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--prdt-starts-->
	<div class="prdt"> 
		<div class="container">
			<div class="prdt-top">
				<div class="col-md-9 prdt-left">
					<div class="product-one">
						<?php echo $show; ?>
						<!-- <div class="col-md-4 product-left p-left">
							<div class="product-main simpleCart_shelfItem">
								<a href="preview" class="mask"><img class="img-responsive zoom-img" src="images/p-1.png" alt="" /></a>
								<div class="product-bottom">
									<h3>Smart Watches</h3>
									<p>Explore Now</p>
									<h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">$ 329</span></h4>
								</div>
								<div class="srch srch1">
									<span>-50%</span>
								</div>
							</div>
						</div>
						<div class="col-md-4 product-left p-left">
							<div class="product-main simpleCart_shelfItem">
								<a href="preview" class="mask"><img class="img-responsive zoom-img" src="images/p-2.png" alt="" /></a>
								<div class="product-bottom">
									<h3>Smart Watches</h3>
									<p>Explore Now</p>
									<h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">$ 329</span></h4>
								</div>
								<div class="srch srch1">
									<span>-50%</span>
								</div>
							</div>
						</div>
						<div class="col-md-4 product-left p-left">
							<div class="product-main simpleCart_shelfItem">
								<a href="preview" class="mask"><img class="img-responsive zoom-img" src="images/p-3.png" alt="" /></a>
								<div class="product-bottom">
									<h3>Smart Watches</h3>
									<p>Explore Now</p>
									<h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">$ 329</span></h4>
								</div>
								<div class="srch srch1">
									<span>-50%</span>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="product-one">
						<div class="col-md-4 product-left p-left">
							<div class="product-main simpleCart_shelfItem">
								<a href="preview" class="mask"><img class="img-responsive zoom-img" src="images/p-4.png" alt="" /></a>
								<div class="product-bottom">
									<h3>Smart Watches</h3>
									<p>Explore Now</p>
									<h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">$ 329</span></h4>
								</div>
								<div class="srch srch1">
									<span>-50%</span>
								</div>
							</div>
						</div>
						<div class="col-md-4 product-left p-left">
							<div class="product-main simpleCart_shelfItem">
								<a href="preview" class="mask"><img class="img-responsive zoom-img" src="images/p-5.png" alt="" /></a>
								<div class="product-bottom">
									<h3>Smart Watches</h3>
									<p>Explore Now</p>
									<h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">$ 329</span></h4>
								</div>
								<div class="srch srch1">
									<span>-50%</span>
								</div>
							</div>
						</div>
						<div class="col-md-4 product-left p-left">
							<div class="product-main simpleCart_shelfItem">
								<a href="preview" class="mask"><img class="img-responsive zoom-img" src="images/p-6.png" alt="" /></a>
								<div class="product-bottom">
									<h3>Smart Watches</h3>
									<p>Explore Now</p>
									<h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">$ 329</span></h4>
								</div>
								<div class="srch srch1">
									<span>-50%</span>
								</div>
							</div>
						</div> -->
						<div class="clearfix"></div>
					</div>	
				</div>	
				<div class="col-md-3 prdt-right">
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
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--product-end-->
	<div class="col-md-6">
		<nav>
			 <ul class="pagination pagination-lg">
	<?php 	  
		if(!isset($_GET['hid'])){
         echo   "<li><a href='product?page=".$prev."' aria-label='Previous'><span aria-hidden='true'>«</span></a></li>";
            	echo $pargination;
		  echo   "<li><a href='product?page=".$next."' aria-label='Next'><span aria-hidden='true'>»</span></a></li>";
		}else{
		
		 echo   "<li><a href='product?hid=".$hid."&&page=".$prev."' aria-label='Previous'><span aria-hidden='true'>«</span></a></li>";
           	echo $pargination;
		  echo   "<li><a href='product?hid=".$hid."&&page=".$next."' aria-label='Next'><span aria-hidden='true'>»</span></a></li>";	
		}
		?>
         </ul>
       </nav>
	<?php 

		include "includes/footer.php";
	 ?>