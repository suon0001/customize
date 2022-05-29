<?php
session_start();

if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location: ../home.php');
    exit;
}

include "db/connection.php";
include("includes/function.php");

$query = "SELECT * FROM `product`";
$result = mysqli_query($con, $query);

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

include 'view/navigation.php';


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="ajax/ajax.js"></script>
    <title>Account</title>
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
                <th>NO</th>
                <th>Title</th>
                <th>Type</th>
                <th>Category</th>
                <th>Color</th>
                <th>Price</th>
                <th>ACTION</th>
            </tr>
            </thead>
            <tbody>

            <?php echo "<h1 class='text-center'>You have " . count($_SESSION['cart']) . " items in your cart</h1>" ?>
            <?php if (!empty($_SESSION['cart'])) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $i = 1; ?>
                    <tr id="<?php echo $row["product_id"]; ?>">

                        <td><?php echo $i; ?></td>
                        <td><?php echo $row["title"]; ?></td>
                        <td><?php echo $row["type"]; ?></td>
                        <td><?php echo $row["category"]; ?></td>
                        <td><?php echo $row["color"]; ?></td>
                        <td><?php echo $row["price"]; ?></td>
                        <td><a href="controller/removeCart.php?<?php echo $row['product_id']; ?>"
                               class="remove-btn">X</a></span</td>
                    </tr>
                    <?php
                    $i++;
                }
            }
            ?>
            </tbody>
        </table>

    </div>
    <button class="pull-right">Go to cart</button>
</div>

</body>
<style>

</style>
</html>
