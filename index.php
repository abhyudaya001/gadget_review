<!-- connect file -->
<?php
include('./connect.php');
// include('./img');

?>
<!DOCTYPE html>

<head>

<link rel="stylesheet" href="./index.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
   <!-- font awesome link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" 
   integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    
  

    <style type="text/css">
    p {
        color: red;
    }
</style>

</head>
<html>
<body>
    <nav class="navbar navbar-expand-lg custom-navbar">
        <div class="container-fluid">
            <a class="navbarbrand" href="#"><p class='nav-home'>Home</p></a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 custom-navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/gadget_review/login.php">Admin Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/gadget_review/sign-up.php">Admin Sign up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="area">
        <?php
        $select_categories = "SELECT * FROM categories";
        $result_categories = mysqli_query($con, $select_categories);

        while ($row_data = mysqli_fetch_assoc($result_categories)) {
            $cat_title = $row_data['category_title'];
            $cat_id = $row_data['category_id'];
            echo "<div class='tit-cont' ><h2 class='category-title'>$cat_title</h2></div>";
            echo "<div class='row px-3'>";
            $select_query = "SELECT * FROM products WHERE category_id = '$cat_id'";
            $result_query = mysqli_query($con, $select_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_keyword = $row['product_keyword'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                $product_image1 = $row['image1'];
                $product_price = $row['price'];

                echo "<div class='col-md-4'>
                        <div class='card'>
                            <img src='img/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title' style='color: black;''>$product_title</h5>
                                <p class='card-text'>₹$product_price</p>
                                <a href='prod_review.php?product_id=$product_id'  class='btn btn-secondary'>View Review</a>
                            </div>
                        </div>
                    </div>";
            }
            echo "</div>";
        }
        ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

</body>

</html>