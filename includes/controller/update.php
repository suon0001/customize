<?php
require_once("../db/connection.php");
if (isset($_POST['update'])) {
    $product_id = $_SERVER['QUERY_STRING'];
    $title = $_POST['title'];
    $type = $_POST['type'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $color = $_POST['color'];
    $price = $_POST['price'];

    $filename = $_FILES["image"]["name"];

    //var_dump($_FILES);
    $imageFileType = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $extensions_arr = array("jpg", "jpeg", "png", "gif");

    if (in_array($imageFileType, $extensions_arr)) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], '../includes/db/images/' . $filename)) {
            echo "image uploaded";
            header("Location: ../../admin/viewProduct.php");
        } else {
            echo "error";
        }
    }


    $query = "UPDATE `product` SET `title` ='" . $title . "', `type` ='" . $type . "', `description` ='" . $description . "', 
    `category` ='" . $category . "', `color` ='" . $color . "', `price` ='" . $price . "', `image` ='" . $filename . "' WHERE `product_id` = '" . $product_id . "'";
    $result = mysqli_query($con, $query);

    if ($result) {
        header("Location: ../../admin/viewProduct.php");
    } else {
        echo 'please check query';
    }
} else {
    header("Location: ../admin/viewProduct.php");
}


