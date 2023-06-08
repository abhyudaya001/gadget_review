<!DOCTYPE html>
<html lang="en">

<?php
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./admin.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css" integrity="YOUR_INTEGRITY_VALUE" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <nav class="navbar">
            <div class="logo">
                <img src="img/logo.png" alt="Logo">
            </div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="" class="nav-link">Welcome, guest</a>
                </li>
            </ul>
        </nav>
        <div class="header">
            <h3 class="text-center">Manage Details</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="button-group">
                    <button><a href="insert_products.php" class="nav-link">Insert Products</a></button>
                    <button><a href="admin_index.php?categories" class="nav-link">Insert Categories</a></button>
                    <button><a href="admin_index.php?brands" class="nav-link">Insert Brands</a></button>
                    <button><a href="http://localhost/gadget_review/index.php" class="nav-link">Go to Homepage</a></button>
                    <button><a href="http://localhost/gadget_review/logout.php" class="nav-link">Log Out</a></button>
                </div>
            </div>
        </div>
        <div class="container my-3">
            <?php
            if (isset($_GET['categories'])) {
                include('categories.php');
            }
            if (isset($_GET['brands'])) {
                include('brands.php');
            }
            ?>
        </div>
        <!-- <div class="footer">
            <p>All rights reserved by Chetna Joshi</p>
        </div> -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>