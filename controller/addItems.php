<?php
require_once("../db/connection.php");

if (isset($_POST['submit'])) {
    if (empty($_POST['title']) || empty($_POST['type']) || empty($_POST['description']) ||
        empty($_POST['category']) || empty($_POST['color']) ||
        empty($_POST['price'])|| empty($_POST['stock'])) {
        echo 'Please fill in the blanks';
    } else {

        $title = $_POST['title'];
        $type = $_POST['type'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $color = $_POST['color'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];

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
    }

    $query = "INSERT INTO product(title, `type`, description, category, color , price, stock, image) 
                        VALUES ('$title', '$type', '$description', '$category','$color',  '$price', '$stock', '$filename')";
    $result = mysqli_query($con, $query);

    if ($result) {
        header("Location: ../../admin/viewProduct.php");
    } else {
        echo 'Please check your query';
    }


} else {
    header("Location: ../../admin/viewProduct.php");

}


