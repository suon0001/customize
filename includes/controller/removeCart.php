<?php
if(!isset($_SESSION))
{
    session_start();
}

$cartProduct = $_SERVER['QUERY_STRING'];
$cart = $_SESSION['cart'];

if (in_array($cartProduct, $cart)) {
    unset($cartProduct);
}


header("Location: cart.php");