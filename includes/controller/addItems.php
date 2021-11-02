<?php
require_once("../db/connection.php");
if (isset($_POST['submit'])) {
    if (empty($_POST['title']) || empty($_POST['description']) ||
        empty($_POST['type']) || empty($_POST['color']) ||
        empty($_POST['price'])) {
        echo 'Please fill in the blanks';
    } else {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $type = $_POST['type'];
        $color = $_POST['color'];
        $price = $_POST['price'];

        $query = "INSERT INTO product(title, description, type, color, price) VALUES('$title', '$description', '$type', '$color', '$price')";
        $result = mysqli_query($con, $query);

        if ($result) {
            header("Location: ../../admin/viewProduct.php");
        } else {
            echo 'Please check your query';
        }
    }
} else {
    header("Location: ../../admin/viewProduct.php");
}