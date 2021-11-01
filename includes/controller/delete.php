<?php
include('../db/connection.php');

if (isset($_GET['Del'])) {

    $product_id = $_GET['Del'];
    $query = "DELETE FROM product WHERE product_id = '".$product_id."'";
    $result = mysqli_query($con, $query);

    if ($result) {
        header("Location: ./admin/viewProduct.php");
    } else {
        echo 'Please check your query';
    }
}
