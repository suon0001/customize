<?php
session_start();

include "navigation.php";
include "./includes/db/connection.php";

if (!empty($_SESSION['cart'])) {
$ids = "";
foreach ($_SESSION['cart'] as $id) {
    $ids = $ids . $id . ",";
}
$ids = rtrim($ids, ',');


$cartQuery = "SELECT * FROM `product` WHERE product_id IN (" . implode(',', $_SESSION['cart']) . ") ";
$result = $con->query($cartQuery);


error_reporting(0);
ini_set('display_errors', 0);
$total += $row['price'];

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Check Out</title>
</head>
<body>


<div class="component">
    <div class="price">
        <h1>$<?php
            echo $total + $charge;
            ?></h1>
        <?php } ?>
    </div>
    <div class="card__container">

        <div class="row cardholder">
            <div class="info">
                <label for="cardholder">Name</label>
                <input placeholder="e.g. Richard Bovell" id="cardholder" type="text"/>
            </div>
        </div>
        <div class="row number">
            <div class="info">
                <label for="cardnumber">Card number</label>
                <input id="cardnumber" type="text" pattern="[0-9]{16,19}" maxlength="19"
                       placeholder="8888-8888-8888-8888"/>
            </div>
        </div>
        <div class="row details">
            <div class="left">
                <label for="month">Expiry</label>
                <select id="month">
                    <option>MM</option>
                    <option value="1">01</option>
                    <option value="2">02</option>
                    <option value="3">03</option>
                    <option value="4">04</option>
                    <option value="5">05</option>
                    <option value="6">06</option>
                    <option value="7">07</option>
                    <option value="8">08</option>
                    <option value="9">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
                <span>/</span>
                <select id="year">
                    <option>YYYY</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                    <option value="2030">2030</option>
                </select>
            </div>
            <div class="right">
                <label for="valid">CVC/CVV</label>
                <input type="text" maxlength="4" placeholder="123"/>
                <span data-balloon-length="medium" data-balloon="The 3 or 4-digit number on the back of your card."
                      data-balloon-pos="up">i</span>
            </div>
            <a type="submit" name="submit" class="button" href="includes/controller/checkout.php">Check out</a>
        </div>
    </div>
</div>

</div>

<style>
    .component {
        position: relative;
        width: 50%;
        margin: 50px auto;
        padding: 10px;

        box-shadow: 2px 2px 10px #454545;
        background-color: #FFFFFF;

        text-align: center;
    }

</style>

</body>
</html>