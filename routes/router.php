<?php
$uri = explode("/", $_SERVER['REQUEST_URI']);
//var_dump($uri);

if(count($uri)> 2){
  header("Location:/admin_home");
}

//Creating A Null variable to be populated for the query String Route;
$category_id = NULL;
$category_name= NULL;

//Creating a $_GET condition to populate the Null Variables;
if(isset($_GET['id'])){
  $category_id = $_GET['id'];
}

$msg = NULL;
if(isset($_GET['msg'])){
  $msg = $_GET['msg'];
}
if(isset($_GET['name'])){
  $category_name = $_GET['name'];
}
$success = NULL;
if(isset($_GET['success'])){
  $success = $_GET['success'];
}

$product_id = NULL;
if(isset($_GET['product_id'])){
  $product_id = $_GET['product_id'];
}

$cart_id = NULL;
if(isset($_GET['cart_id'])){
  $cart_id = $_GET['cart_id'];
}
$sub_cat_id =  NULL;
if (isset($_GET['sub_cat_id'])) {
  $sub_cat_id = $_GET['sub_cat_id'];
}



  $hid = NULL;
  if(isset($_GET['hid'])){
    $hid = $_GET['hid'];
  }
  $user_id = NULL;
  if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
  }
   $cat_id = NULL;
  if(isset($_GET['cat_id'])){
    $cat_id = $_GET['cat_id'];
  }
  $i = "";
  if(isset($_GET['page'])){
    $i = $_GET['page'];
  }
      $inventory = "";
  if (isset($_GET['stock'])) {
    $inventory = $_GET['stock'];
  }
  $hash_id = NULL;
  if (isset($_GET['hash_id'])) {
    $hash_id = $_GET['hash_id'];
  }


switch ($uri[1]) {
  case "admin":
  include APP_PATH."/views/admin/adminlogin.php";
  break;

  case "skriil":
  include APP_PATH."/views/users/skriil.php";
  break;


  case "":
  include APP_PATH."/views/users/user_home.php";
  break;

  case "/":
  include APP_PATH."/views/users/user_home.php";
  break;

  case "admin?msg=$msg":
  include APP_PATH."/views/admin/adminlogin.php";
  break;

  case "admin_register":
  include APP_PATH."/views/admin/register.php";
  break;

  case "admin_home":
  include APP_PATH."/views/admin/adminhome.php";
  break;

  case "add_products":
  include APP_PATH."/views/admin/addProducts.php";
  break;

  case "del":
  include APP_PATH."/views/admin/deleteCategory.php";
  break;

  case "product_category":
  include APP_PATH."/views/admin/category.php";
  break;

  case "product_sub_category":
  include APP_PATH."/views/admin/subcategory.php";
  break;

  case "product_final_category":
  include APP_PATH."/views/admin/final_category.php";
  break;

  

  case "final_category":
  include APP_PATH."/views/admin/final_category.php";
  break;

  case "edit_Final_Category?id=$category_id":
  include APP_PATH."/views/admin/editFinalCategory.php";
  break;

  case "getSubCategory":
  include APP_PATH."/views/admin/ajax/subcategory.php";
  break;

  case "finalCategory":
  include APP_PATH."/views/admin/ajax/finalCategory.php";
  break;

  case "edit_products":
  include APP_PATH."/views/admin/editProducts.php";
  break;

  case "delete_products":
  include APP_PATH."/views/admin/deleteProducts.php";
  break;

  case "edit_sub_category":
  include APP_PATH."/views/admin/editSubCategory.php";
  break;

  case "edit_category":
  include APP_PATH."/views/admin/editCategory.php";
  break;

  case "products":
  include APP_PATH."/views/admin/products.php";
  break;

  #Routes With Query Strings are Below;
  case "editCategory?id=$category_id":
  include APP_PATH."/views/admin/editCategory.php";
  break;

  case "editSubCategory?id=$category_id":
  include APP_PATH."/views/admin/editSubCategory.php";
  break;

  case "edit_products?product_id=$product_id":
  include APP_PATH."/views/admin/editProducts.php";
  break;

  case "editProductImage?product_id=$product_id":
  include APP_PATH."/views/admin/editProductImage.php";
  break;

  case "deleteProducts?product_id=$product_id": //$product_id has been created
  include APP_PATH."/views/admin/deleteProducts.php";
  break;

  case "product_category?success=$success":
  include APP_PATH."/views/admin/category.php";
  break;

  case "logout":
  include APP_PATH."/views/admin/logout.php";
  break;

  case "product_sub_category?success=$success":
  include APP_PATH."/views/admin/subcategory.php";
  break;

  case "deleteCategory?id=$category_id":
  include APP_PATH."/views/admin/deleteCategory.php";
  break;

  case "deleteSubCategory?id=$category_id":
  include APP_PATH."/views/admin/deleteSubCategory.php";
  break;

  case "add_products?success=$success":
  include APP_PATH."/views/admin/addProducts.php";
  break;

  case "products?success=$success":
  include APP_PATH."/views/admin/products.php";
  break;











  ///////Public Routes//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 case " ":
  include APP_PATH."/views/users/user_home.php";
  break;

  case "home":
  include APP_PATH."/views/users/user_home.php";
  break;

  case "product":
  include APP_PATH."/views/users/users_products.php";
  break;


  case "product?sub_cat_id=$sub_cat_id":
  include APP_PATH."/views/users/users_products.php";
  break;

   case "product?sub_cat_id=$sub_cat_id&&page=$i":
  include APP_PATH."/views/users/users_products.php";
  break;

   case "product?cat_id=$cat_id":
  include APP_PATH."/views/users/users_products.php";
  break;

  case "product?hid=$hid":
  include APP_PATH."/views/users/users_products.php";
  break;

  case "product?hid=$hid&&page=$i":
  include APP_PATH."/views/users/users_products.php";
  break;

  case "product?page=$i":
  include APP_PATH."/views/users/users_products.php";
  break;

  case "contact":
  include APP_PATH."/views/users/users_contact.php";
  break;

  case "login":
  include APP_PATH."/views/users/users_login.php";
  break;

  

   case "login?user_id=$user_id":
  include APP_PATH."/views/users/users_login.php";
  break;


  case "user_login?msg=$msg":
  include APP_PATH."/views/users/users_login.php";
  break;      

  case "register":
  include APP_PATH."/views/users/users_register.php";
  break;

  
   case "register?user_id=$user_id":
  include APP_PATH."/views/users/users_register.php";
  break;

  case "login?success=$success":
  include APP_PATH."/views/users/users_login.php";
  break;

  case "cart":
  include APP_PATH."/views/users/users_cart.php";
  break;

  
  case "cart?msg=$msg":
  include APP_PATH."/views/users/users_cart.php";
  break;


  case "preview":
  include APP_PATH."/views/users/users_preview.php";
  break;

  case "preview?hid=$hid":
  include APP_PATH."/views/users/users_preview.php";
  break;

  case "getSub":
  include APP_PATH."/views/users/get_sub_category.php";
  break;



  case "checkout":
  include APP_PATH."/views/users/checkout.php";
  break;


 case "delete?cart_id=$cart_id":
  include APP_PATH."/views/users/del_cart.php";
  break;


  
  case "confirmation?hash_id=$hash_id":
  include APP_PATH."/views/users/confirmation.php";
  break;


  case "updateCart?cart_id=$cart_id&&stock=$inventory":
  include APP_PATH."/views/users/update_cart.php";
  break;



}





?>
