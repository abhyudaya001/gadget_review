<?php
 include('connect.php');
 if(isset($_POST['insert_cat'])){
    $category_title=$_POST['cat_title'];
    $select_query="select * from categories where category_title='$category_title'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    $insert_query="insert into categories (category_title) value('$category_title')";
    if($number>0){
        echo "<script>alert('This category is already present in the database')</script>";
    }
    else{
      $insert_query="insert into categories (category_title) value('$category_title')";
      $result=mysqli_query($con,$insert_query);
      if($result){
          echo "<script>alert('Category has been inserted successfully')</script>";
    }
    }
 }
?>

<div class="cat-cont">
    <h2 class="text-center">Insert Category</h2>
    <form action="" method="post" class="mb-2">
        <div class="input-group">
            <span class="input-group-text">
                <i class="fa-solid fa-receipt"></i>
            </span>
            <input type="text" class="form-control" name="cat_title" placeholder="Insert categories" aria-label="Categories" aria-describedby="basic-addon1">
        </div>
        <div class="form-group">
            <input type="submit" class="btn" name="insert_cat" value="Insert Categories">
        </div>
    </form>
</div>
