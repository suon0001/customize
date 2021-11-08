<?php
if (!isset($_SESSION)) {
    session_start();
}
$product = $_SERVER['QUERY_STRING'];

include "navigation.php";
include "./includes/db/connection.php";

$query = "SELECT * FROM product WHERE product_ID = $product";
$result = mysqli_query($con, $query);

$query2 = "SELECT * FROM product WHERE type = 'recommend' ORDER BY RAND() LiMIT 3";

$result2 = mysqli_query($con, $query2);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
          class="offer-img">
</head>
<body>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>

    <div class="small-container single-product">
        <div class="row">
            <div class="col-2">
                <img src="includes/db/images/product.jpg" width="100%">
            </div>

            <div class="col-2">
                <h1><?php echo $row['title']; ?></h1>
                <h4>$<?php echo $row['price']; ?></h4>
                <select name="" id="color">
                    <option value="">--- Choose a color ---</option>
                    <option value="red">Blue</option>
                    <option value="green">Red</option>
                    <option value="blue">Green</option>
                </select>
                <input type="number" value="1">
                <input type="button" class="button" value="Add to Cart">

                <h3>Product Details</h3>
                <p><?php echo $row['description']; ?></p>
            </div>
        </div>
    </div>

<?php } ?>


<div class="small-container">
    <h2 class="title">Recommend Products</h2>
    <div class="row product-item">
        <?php while ($row = mysqli_fetch_assoc($result2)) { ?>
            <div class="col-4">
                <img src="https://ichef.bbci.co.uk/news/976/cpsprodpb/15951/production/_117310488_16.jpg" alt="">
                <h4><?php echo $row['title']; ?></h4>
                <div class="rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <p>$<?php echo $row['price']; ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</div></div>

<?php include("footer.php"); ?>


</body>
</html>
