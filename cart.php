<?php

if (!isset($_SESSION)) {
    session_start();
}

include "db/connection.php";

$status = "";
$num = 1;
if (!empty($_SESSION['cart'])) {
    $ids = "";
    foreach ($_SESSION['cart'] as $id) {
        $ids = $ids . $id . ",";
    }
    $ids = rtrim($ids, ',');
    $query = "SELECT * FROM `product` WHERE product_id IN (" . implode(',', $_SESSION['cart']) . ") ";
    $result = $con->query($query);
}


include("view/navigation.php")
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <title>Cart</title>
</head>
<body>

<div class="container">
    <p id="success"></p>
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2 class="text-center">Account <b>Product</b></h2>
                </div>

            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>Color</th>
                <th>Price</th>
                <th>X</th>
            </tr>
            </thead>
            <tbody>

            <?php echo "<h1 class='text-center'>You have " . count($_SESSION['cart']) . " items in your cart</h1>" ?>
            <?php if (!empty($_SESSION['cart'])) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $i = 1; ?>
                    <tr id="<?php echo $row["product_id"]; ?>">

                        <td class="w-25 p-3"> <?php echo "<img src=" . './includes/images/' . $row['image'] . " style='width: 25%;' />"; ?></td>
                        <td><a href="products-details.php?<?php echo $row['product_id']; ?>"><?php echo $row['title']; ?></a></td>
                        <td><?php echo $row["category"]; ?></td>
                        <td><?php echo $row["color"]; ?></td>
                        <td><?php echo $row["price"]; ?></td>
                        <td><a href="controller/removeCart.php?<?php echo $row['product_id']; ?>"
                               class="remove-btn">X</a></span</td>
                        <?php
                        error_reporting(0);
                        ini_set('display_errors', 0);
                        $total += $row['price'];
                        ?>

                    </tr>
                    <?php
                    $i++;
                }
            }
            ?>
            </tbody>
        </table>

    </div>
</div>
<div class="col-md-4 offset-md-6 border rounded mt-5 bg-grey h-25">

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
</div>

</body>
</html>
