<?php

if (!isset($_SESSION)) {
    session_start();
}

include "../db/connection.php";


if (!empty($_SESSION['cart'])) {
    $ids = "";
    foreach ($_SESSION['cart'] as $id) {
        $ids = $ids . $id . ",";
    }
    $ids = rtrim($ids, ',');

    $cartQuery = "SELECT * FROM `product` WHERE product_id IN (" . implode(',', $_SESSION['cart']) . ") ";
    $cartresult = $con->query($cartQuery);
}
if (isset($_GET['action'])) {
    if ($_GET['action'] == "deleted") {
        foreach ($_SESSION['shopping_cart'] as $key => $value) {
            if ($value['product_id'] == $_GET['id']) {
                unset($_SESSION['shopping_cart'][$keys]);
                echo '<script>alert("Item removed successfully")</script>';
                echo '<script>window.location="products.php"</script>';
            }
        }
    }
}


include "navigation.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="ajax/ajax.js"></script>
</head>
<body class="bg-light">


<div class="container-fluid">
  <?php echo  "<h1>You have " . count($_SESSION['cart']) . " items in your cart</h1>" ?>
    <?php if (!empty($_SESSION['cart'])) {
    while ($row = mysqli_fetch_assoc($cartresult)) { ?>
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <hr>
                <div class="row main align-items-center">
                    <?php echo "<img src=" . './includes/db/images/' . $row['image'] . " style='width: 20%;' />"; ?>
                    <div class="col">
                        <div class="row text-muted"><?php echo $row['category']; ?></div>
                        <h3><?php echo $row['title']; ?></h3>
                    </div>
                    <div class="col"><a href="#">-</a><a href="#" class="border">1</a><a href="#">+</a></div>
                    <div class="col">&dollar;<?php echo $row['price']; ?><span class="close">
                                <a href="../controller/removeCart.php?<?php echo $row['product_id']; ?>"
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

    <form action="payment.php">
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
                <a class="button" href="payment.php">Payment</a>
            </div>
        </div>
    </form>

</div>




</body>

</html>