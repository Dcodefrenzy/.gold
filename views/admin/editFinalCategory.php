<?php

ob_start();
session_start();
authenticate();
$_SESSION['active'] = true;
if(!isset($_GET['id'])){
  header("Location:final_category");
}
$page_title = "Edit Sub Category";
$link= "#";
include 'include/header2.php';
$view = getfinalCategoryByID($conn, $_GET);
if($view == false){
  header("Location:product_sub_category");
}
$error = [];

if(array_key_exists('edit', $_POST)){


  if(empty($_POST['final_category'])){
    $error['final_category'] = "Please enter Sub Category";
  }
  if(empty($error)){
    editfinalCategory($conn, $_POST, $_GET);
  }
}
?>
<div class="wrapper">
  <div id="stream">
    <form id ="register" method="POST">
      <p>Edit Category</p>
      <?php  $display = displayErrors($error, 'category');
       echo $display; ?>
      <input type="text" name="final_category" placeholder ="<?php echo $view;?>">
      <input type="submit" name="edit" value="edit">
    </form>
    <table id= "tab">
      <td><a href="final_category" id="register ">Back</a></td>
    </table>



  </div>

  <?php include 'include/footer.php'; ?>
