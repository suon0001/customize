<?php

if (!isset($_SESSION)) {
    session_start();
}

include "db/connection.php";

$status="";

if (!empty($_SESSION['cart'])) {
    $ids = "";
    foreach ($_SESSION['cart'] as $id) {
        $ids = $ids . $id . ",";
    }
    $ids = rtrim($ids, ',');
    $query = "SELECT * FROM `product` WHERE product_id IN (" . implode(',', $_SESSION['cart']) . ") ";
    $result = $con->query($query);
}
include ("view/navigation.php")
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <title>Document</title>
</head>
<body>

<div class="container-fluid">
    <?php echo "<h1>You have " . count($_SESSION['cart']) . " items in your cart</h1>" ?>
    <?php if (!empty($_SESSION['cart'])) {
    while ($row = mysqli_fetch_assoc($result)) { ?>
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <hr>
                <div class="row main align-items-center">
                    <?php echo "<img src=" . './includes/images/' . $row['image'] . " style='width: 10%;' />"; ?>
                    <div class="col">
                        <div class="row text-muted"><?php echo $row['category']; ?></div>
                        <h3><?php echo $row['title']; ?></h3>
                    </div>
                    <div class="col"><a href="#">-</a><a href="#" class="border">1</a><a href="#">+</a></div>
                    <div class="col">&dollar;<?php echo $row['price']; ?><span class="close">
                                <a href="controller/removeCart.php?<?php echo $row['product_id']; ?>"
                                   class="remove-btn">X</a></span></div>
                    <?php
                    error_reporting(0);
                    ini_set('display_errors', 0);
                    $total += $row['price'];
                    ?>
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>

<?php
}
}
?>

</div>
</div>
<div class="col-md-4 offset-md-6 border rounded mt-5 bg-white h-25">

    <form action="view/payment.php">
        <div class="pt-4">
            <h6>PRICE DETAILS</h6>
            <hr>
            <div class="row price-details">
                <div class="col-md-6">
                    <?php
                    if (!empty($_SESSION['cart'])) {
                        $count = count($_SESSION['cart']);
                        echo "<h6>Price ($count items)</h6>";
                    } else {
                        echo "<h6>Price (0 items)</h6>";
                    }
                    ?>
                    <h6>Delivery Charges</h6>
                    <hr>
                    <h6>Amount Payable</h6>
                </div>
                <div class="col-md-6">
                    <?php if (!empty($_SESSION['cart'])) { ?>
                        <h6>$<?php echo $total; ?></h6>
                        <h6 class="text-success">$<?php echo $charge = 18; ?></h6>
                        <hr>
                        <h6>$<?php
                            echo $total + $charge;
                            ?></h6>
                    <?php } ?>
                </div>
                <a class="button" href="view/payment.php">Payment</a>
            </div>
        </div>
    </form>

</div>

</body>
</html>
