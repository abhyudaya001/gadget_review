<!DOCTYPE html>
<html>
<head>
    <title>Product Review</title>
    <style>
        /* Reset default margin and padding */
        body, h2, p, img {
            margin: 0;
            padding: 0;
        }
        
        /* Main container */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        
        /* Product details */
        h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        
        p {
            margin-bottom: 10px;
        }
        
        img {
            display: block;
            max-width: 100%;
            margin: 0 auto 20px;
        }
        
        /* Error message */
        .error-message {
            color: #ff0000;
            font-weight: bold;
        }
        
        body {
            background-color: #b9090b;
        }
        
        .container {
            background-color: #000;
            color: #fff;
        }
        
        h2, p {
            color: #fff;
        }
        
        /* Go to HOME page link */
        .goto-home {
            display: block;
            text-align: center;
            background-color: #fff;
            padding: 10px;
            text-decoration: none;
            color: #000;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        include('./connect.php');

        // Get the product ID from the URL parameter
        if (isset($_GET['product_id'])) {
            $product_id = $_GET['product_id'];
            
            // Fetch the product details from the database
            $select_product = "SELECT * FROM products WHERE product_id = '$product_id'";
            $result_product = mysqli_query($con, $select_product);
            $product_data = mysqli_fetch_assoc($result_product);
            
            // Display the product details
            if ($product_data) {
                $product_title = $product_data['product_title'];
                $product_description = $product_data['product_description'];
                $product_image1 = $product_data['image1'];
                $product_price = $product_data['price'];
                $product_link = $product_data['buylink'];
                
                echo "<img src='img/$product_image1' alt='$product_title'>";
                echo "<h2>Product: $product_title</h2>";
                echo "<p><strong>Review</strong>: <br><br><br>$product_description</p>";
                echo "<p>Price: ₹$product_price</p>";
                echo "<a href='./index.php' class='goto-home'>Go to HOME page</a>";
                echo "<a href='$product_link' class='goto-home'>Buy Now</a>";
            } else {
                echo "<p class='error-message'>Product not found.</p>";
            }
            
            // Close the database connection
            mysqli_close($con);
        } else {
            echo "<p class='error-message'>Product ID not provided.</p>";
        }
        ?>
    </div>
</body>
</html>
