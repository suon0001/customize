<?php
require_once("../db/connection.php");
if (isset($_POST['update'])) {
    $product_id = $_GET['ID'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $type = $_POST['type'];
    $color = $_POST['color'];
    $price = $_POST['price'];

    $query ="UPDATE product SET title ='".$title."', description ='".$description."', 
    type ='".$type."', color ='".$color."', price ='".$price."' WHERE product_id'".$product_id."'";
    $result = mysqli_query($con, $query);

    if ($result) {
        header("Location: ./admin/viewProduct.php");
    }else {
        echo 'please check query';
    }
}
else {
    header("Location: ./admin/viewProduct.php");
}


