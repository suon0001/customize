<?php
if (!isset($_SESSION)) {
    session_start();
}
include "navigation.php";
include "./includes/db/connection.php";

$product = $_SERVER['QUERY_STRING'];

$query = "SELECT * FROM product";
$result = mysqli_query($con, $query);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <h1>Customize your <br> own gaming equipment!</h1>
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et
                    dolore magna aliqua. <br>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip
                    ex
                    ea commodo consequat."</p> <br>
                <input type="button" class="button" value="Explore more">
            </div>
            <div class="col-2">
                <img src="images/cotroller.png" alt="">
            </div>
        </div>
    </div>
</div>

<h2 class="title">Featured Categories</h2>

<div class="categories">
    <div class="small-container">
        <div class="row">
            <div class="col-3">
                <img src="https://ichef.bbci.co.uk/news/976/cpsprodpb/15951/production/_117310488_16.jpg">
            </div>
            <div class="col-3">
                <img src="https://ichef.bbci.co.uk/news/976/cpsprodpb/15951/production/_117310488_16.jpg">
            </div>
            <div class="col-3">
                <img src="https://ichef.bbci.co.uk/news/976/cpsprodpb/15951/production/_117310488_16.jpg">
            </div>
        </div>
    </div>
</div>

<!Featured products>

<div class="small-container">
    <h2 class="title">Featured Products</h2>
    <div class="row">
        <div class="col-4">
            <img src="https://ichef.bbci.co.uk/news/976/cpsprodpb/15951/production/_117310488_16.jpg" alt="">
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
            <img src="https://ichef.bbci.co.uk/news/976/cpsprodpb/15951/production/_117310488_16.jpg" alt="">
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
            <img src="https://ichef.bbci.co.uk/news/976/cpsprodpb/15951/production/_117310488_16.jpg" alt="">
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
            <img src="https://ichef.bbci.co.uk/news/976/cpsprodpb/15951/production/_117310488_16.jpg" alt="">
            <h4>Product name 4</h4>
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
<div class="small-container">
    <h2 class="title">Latest Products</h2>
    <div class="row product-item">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
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
</div>

<div class="offer">
    <div class="small-container">
        <div class="row">

            <img class="controller"
                 src="https://assets2.razerzone.com/images/pnx.assets/89b592e45a60be05a671c021f3363ac0/razer-mamba-elite_500x500.png">

            <div class="col-2">
                <p>Exclusively Available</p>
                <h1>GAMING MOUSE</h1>
                <small>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore
                    et
                    dolore magna aliqua.</small><br>
                <a href="" class="button">Buy Now</a>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php" ?>

</body>
</html>

