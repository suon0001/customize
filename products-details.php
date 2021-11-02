<?php
if (!isset($_SESSION)) {
    session_start();
}
$product = $_SERVER['QUERY_STRING'];

include "navigation.php";
include "./includes/db/connection.php";

$query = "SELECT * FROM product WHERE product_ID = $product";
$result = $con->query($query);
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
<?php while ($row = $result->fetch_assoc()) { ?>

    <div class="small-container single-product">
        <div class="row">
            <div class="col-2">
                <img src="includes/images/temperary.jpg" width="100%">
                <div class="small-img-row">
                    <div class="small-img-col">
                        <img src="includes/images/temperary.jpg" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="includes/images/temperary.jpg" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="includes/images/temperary.jpg" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="includes/images/temperary.jpg" alt="">
                    </div>
                </div>
            </div>

            <div class="col-2">
                <h1><?php echo $row['title']; ?></h1>
                <h4><?php echo $row['price']; ?></h4>
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
    <div class="row">
        <div class="col-4">
            <img src="includes/images/product.jpg" width="100%">
            <h4>Product name 1</h4>
            <div class="rating">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
                <p>price</p>
            </div>
        </div>
        <div class="col-4">
            <img src="includes/images/product.jpg" width="100%">
            <h4>Product name 2</h4>
            <div class="rating">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
                <p>price</p>
            </div>
        </div>
        <div class="col-4">
            <img src="includes/images/product.jpg" width="100%">
            <h4>Product name 3</h4>
            <div class="rating">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
                <p>price</p>
            </div>
        </div>
        <div class="col-4">
            <img src="includes/images/product.jpg" width="100%">
            <h4>Product name 3</h4>
            <div class="rating">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
                <p>price</p>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>


</body>
</html>
