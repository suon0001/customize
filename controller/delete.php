<?php
include('../db/connection.php');

    $id_to_delete = $_SERVER['QUERY_STRING'];
    $query = "DELETE FROM `product` WHERE product_id = $id_to_delete";
    $result = mysqli_query($con, $query);

   if ($result) {
       header("Location: ?delete successfully");
   }else {
       'query error: '.mysqli_error($con);
   }
   header("Location: ../admin/viewProduct.php");



