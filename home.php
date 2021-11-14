<?php
if (!isset($_SESSION)) {
    session_start();
}
include "navigation.php";
include "./includes/db/connection.php";

$product = $_SERVER['QUERY_STRING'];

$featured_query = "SELECT * FROM product WHERE type = 'featured'LIMIT 3";
$latest_query = "SELECT * FROM product WHERE type = 'latest' LIMIT 3";
$result = mysqli_query($con, $featured_query);
$result2 = mysqli_query($con, $latest_query);


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customize</title>
</head>
<body>
<section class="header">
    <h1>CUSTOMIZE</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor <br> incididunt ut labore et dolore magna aliqua.</p>
    <a class="btn-bgstroke">More info</a>
</section>

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

<!Featured XBOX>

<div class="small-container">
    <h2 class="title">Featured Products</h2>
    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="col-4">
                <?php
                echo "<img src=" . './includes/db/images/' . $row['image'] . " style='width: 85%;' />";
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
</div>
</div>
<div class="small-container">
    <h2 class="title">Latest Products</h2>
    <div class="row product-item">
        <?php while ($row = mysqli_fetch_assoc($result2)) { ?>
            <div class="col-4">
                <div class="">
                    <?php
                    echo "<img src=" . './includes/db/images/' . $row['image'] . " style='width: 85%;' />";
                    ?>
                </div>

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
                <a href="" class="btn-bgstroke">Buy Now</a>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php" ?>


<style>
    .header {
        width: 100%;
        padding:60px 0;
        text-align: center;
        background: #789bbe;
        color: white;
    }


    .btn-bgstroke {
        font-size: 20px;
        display: inline-block;
        border: 1px solid white;
        padding: 10px 20px;
        border-radius: 10px;
        cursor: pointer;
        font-weight: 300;
        margin-top: 30px;
    }

    .btn-bgstroke:hover {
        background-color: white;
        color: #33cccc;
    }
</style>
</body>
</html>

