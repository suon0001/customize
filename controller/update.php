<?php
require_once("../db/connection.php");
if (isset($_POST['update'])) {
    $product_id = $_SERVER['QUERY_STRING'];
    $title = trim(mysqli_real_escape_string($con, $_POST['title']));
    $type = trim(mysqli_real_escape_string($con, $_POST['type']));
    $description = trim(mysqli_real_escape_string($con, $_POST['description']));
    $category = trim(mysqli_real_escape_string($con, $_POST['category']));
    $color = trim(mysqli_real_escape_string($con, $_POST['color']));
    $price = trim(mysqli_real_escape_string($con, $_POST['price']));
    $stock = trim(mysqli_real_escape_string($con, $_POST['stock']));

    $filename = $_FILES["image"]["name"];


    $file = $_FILES["image"]["name"];

    $filename = strtolower($file);

    if ($_FILES['image']['name']) {
        move_uploaded_file($_FILES['image']['tmp_name'],
            "../includes/images/" . $_FILES['image']['name']);
        header("Location: ../admin/viewProduct.php");
        $query = "UPDATE `product` SET `title` ='" . $title . "', `type` ='" . $type . "', `description` ='" . $description . "', 
    `category` ='" . $category . "', `color` ='" . $color . "', `price` ='" . $price . "', `stock` ='" . $stock . "', `image` ='" . $filename . "' WHERE `product_id` = '" . $product_id . "'";
        $result = mysqli_query($con, $query);

    }

} else {
    header("Location: ../admin/viewProduct.php");

}

