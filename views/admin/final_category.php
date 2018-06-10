<?php
ob_start();
session_start();
authenticate();
$_SESSION['active'] = true;
$page_title = "Sub Category";
$link= "product_sub_category";

include 'include/header2.php';
$error = [];

if(array_key_exists('add', $_POST)){

  if(empty($_POST['sub_category'])){
    $error['sub_category'] = "*please enter a sub category name</br>";
  }
  if(empty($_POST['category'])){
    $error['category'] = "*please enter a category name</br>";
  }

   if(empty($_POST['final_category'])){
    $error['final_category'] = "*please enter final category</br>";
  }

  if(empty($error)){

    addFinalCategory($conn, $_POST);
  }
}
?>
<div class="wrapper">
  <div id="stream">
    <h1 id="register-label">Add Final Category</h1>
    <hr>
    <?php if(isset($_GET['success'])){
      $msg = str_replace('_', ' ', $_GET['success']);
      echo $msg;
    } ?>

    <form id="register" class="" action="" method="post">

        <div class="">
          <?php  $display = displayErrors($error, 'category');
          echo $display; ?>
          <label for="">CATEGORY</label>
          <select onchange="getSub(this.value)" class="" name="category">
          <option value="">-Select Category-</option>
          <?php viewCategory($conn) ?>
          </select>
        </div>

        <div class="">
         <?php  $display = displayErrors($error, 'sub_category');
          echo $display; ?>
          <label for="">SUB CATEGORY</label>
          <select id ="sub"  class="" name="sub_category">
          <option value="">-Select Sub Category-</option>
 
       </select>
     </div>

      <div class="">
        <?php  $display = displayErrors($error, 'final_category');
         echo $display; ?>
        <label for="">SUB CATEGORY</label>
        <input type="text" name="final_category" value="" placeholder="Final Category">
      </div>

      <input type="submit" name="add" value="Add">
    </form>
    <h1 id="register-label">Final Categories</h1>
    <hr>
    <table id="tab">
      <thead>
        <tr>
          <th>id</th>
          <th>Final Category name</th>
          <th>sub category</th>
          <th>category Id</th>
          <th>date created</th>
          <th>edit</th>
          <th>delete</th>
        </tr>
      </thead>
      <tbody>
        <?php

        viewFinalCategories($conn);


        ?>

      </tbody>
    </table>






  </div>
</div>
<script type="text/javascript">
    function getSub(id){

      var url = 'getSubCategory';
      var method = 'POST';
      var params = 'cat_id='+ id;

        subAjax(url, method, params);
    }
    function subAjax(url, method, params){
            
            xhr = new XMLHttpRequest();
            xhr.onreadystatechange=() =>{
              if (xhr.readyState == 4) {
                var res = xhr.responseText;
                console.log(res);
                document.getElementById('sub').innerHTML = res;

              }
            }
            xhr.open(method, url, true);
            xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
            xhr.send(params);
    }
</script>

<?php include 'include/footer.php'; ?>
