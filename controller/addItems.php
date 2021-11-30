<?php
require_once("../db/connection.php");

if (isset($_POST['submit'])) {
    if (empty($_POST['title']) || empty($_POST['type']) || empty($_POST['description']) ||
        empty($_POST['category']) || empty($_POST['color']) ||
        empty($_POST['price']) || empty($_POST['stock'])) {
        echo 'Please fill in the blanks';
    } else {

        $title = mysqli_real_escape_string($con, $_POST['title']);
        $type = mysqli_real_escape_string($con, $_POST['type']);
        $description = mysqli_real_escape_string($con, $_POST['description']);
        $category = mysqli_real_escape_string($con, $_POST['category']);
        $color = mysqli_real_escape_string($con, $_POST['color']);
        $price = mysqli_real_escape_string($con, $_POST['price']);
        $stock = mysqli_real_escape_string($con, $_POST['stock']);


        $file = $_FILES["image"]["name"];

        $filename = strtolower($file);

        if (file_exists("../includes/images/" . $_FILES['image']['name'])) {
            echo "can't upload: " . $_FILES['image']['name'] . " Exists";
        } else {
            move_uploaded_file($_FILES['image']['tmp_name'],
                "../includes/images/" . $_FILES['image']['name']);
            header("Location: ../admin/viewProduct.php");
            $query = "INSERT INTO product(title, `type`, description, category, color , price, stock, image) 
                        VALUES ('$title', '$type', '$description', '$category','$color',  '$price', '$stock', '$filename')";
            $result = mysqli_query($con, $query);

        }
    }

} else {
    header("Location: ../admin/viewProduct.php");

}


