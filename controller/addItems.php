<?php
require_once("../db/connection.php");

if (isset($_POST['submit'])) {
    if (empty($_POST['title']) || empty($_POST['type']) || empty($_POST['description']) ||
        empty($_POST['category']) || empty($_POST['color']) ||
        empty($_POST['price']) || empty($_POST['stock'])) {
        echo 'Please fill in the blanks';
    } else {

        $title = trim(mysqli_real_escape_string($con, $_POST['title']));
        $type = trim(mysqli_real_escape_string($con, $_POST['type']));
        $description = trim(mysqli_real_escape_string($con, $_POST['description']));
        $category = trim(mysqli_real_escape_string($con, $_POST['category']));
        $color = trim(mysqli_real_escape_string($con, $_POST['color']));
        $price = trim(mysqli_real_escape_string($con, $_POST['price']));
        $stock = trim(mysqli_real_escape_string($con, $_POST['stock']));


        $file = $_FILES["image"]["name"];

        $filename = strtolower($file);

        if ($_FILES['image']['name']){
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


