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
    <link rel="stylesheet" href="includes/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
          class="offer-img">
</head>
<body>
<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<main class="container">

    <!-- Left Column / Headphones Image -->
    <div class="left-column">
        <?php
        echo "<img src=" . './includes/db/images/' . $row['image'] . " style='width: 80%;' />";
        ?>
    </div>


    <!-- Right Column -->
    <div class="right-column">


        <!-- Product Description -->
        <div class="product-description">
            <span><?php echo $row['category']; ?></span>

            <h1><?php echo $row['title']; ?></h1>
            <p><?php echo $row['description']; ?></p>
        </div>

        <!-- Product Pricing -->
        <div class="product-price">
            <h4>$<?php echo $row['price']; ?></h4>
            <a href="#" class="cart-btn">Add to cart</a>
        </div>
    </div>
</main>

<?php } ?>


<div class="small-container">
    <h2 class="title">Recommend Products</h2>
    <div class="row product-item">
        <?php while ($row = mysqli_fetch_assoc($result2)) { ?>
            <div class="col-4">
                <?php
                echo "<img src=" . './includes/db/images/' . $row['image'] . " style='width: 50%;' />";
                ?>
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
<style>
    html, body {
        height: 100%;
        width: 100%;
        margin: 0;
        font-family: 'Roboto', sans-serif;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 15px;
        display: flex;
    }

    .left-column {
        width: 65%;
        position: relative;
    }

    .right-column {
        width: 35%;
        margin-top: 60px;
    }

    .left-column img {
        width: 100%;
        left: 0;
        top: 0;
    }




</style>

</body>
</html>
