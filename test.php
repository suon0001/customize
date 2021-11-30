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

        $file = rand(1000, 100000) . "-" . $_FILES['image']['name'];
        $file_loc = $_FILES['image']['tmp_name'];
        $file_size = $_FILES['image']['size'];
        $file_type = $_FILES['image']['type'];
        $folder = "../includes/images/";


        $new_size = $file_size / 1024;

        $new_file_name = strtolower($file);


        $final_file = str_replace(' ', '-', $new_file_name);


        if (move_uploaded_file($file_loc, $folder . $final_file)) {

            $query = "INSERT INTO product(title, `type`, description, category, color , price, stock, image) 
                        VALUES ('$title', '$type', '$description', '$category','$color',  '$price', '$stock', '$filename')";
            $result = mysqli_query($con, $query);

            if ($result) {
                header("Location: ../admin/viewProduct.php");
            } else {
                echo 'Please check your query';
            }

        }
    }
}

