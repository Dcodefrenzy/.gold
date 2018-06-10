<?php

ob_start();
session_start();
authenticate();
$_SESSION['active'] = true;
if(!isset($_GET['id'])){
  header("Location:products_sub_category");
}
$page_title = "Edit Sub Category";
$link= "#";
include 'include/header2.php';
$view = getSubCategoryByID($conn, $_GET);
if($view == false){
  header("Location:product_sub_category");
}
$error = [];

if(array_key_exists('edit', $_POST)){


  if(empty($_POST['sub_category'])){
    $error['sub_category'] = "Please enter Sub Category";
  }
  if(empty($error)){
    editSubCategory($conn, $_POST, $_GET);
  }
}
?>
<div class="wrapper">
  <div id="stream">
    <form id ="register" method="POST">
      <p>Edit Category</p>
      <?php  $display = displayErrors($error, 'category');
       echo $display; ?>
      <input type="text" name="sub_category" placeholder ="<?php echo $view;?>"">
      <input type="submit" name="edit" value="edit">
    </form>
    <table id= "tab">
      <td><a href="product_category" id="register ">Back</a></td>
    </table>



  </div>

  <?php include 'include/footer.php'; ?>
