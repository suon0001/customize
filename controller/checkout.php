<?php
require_once("../db/connection.php");

if (isset($_POST['submit'])) {
    if (empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['address']) ||
        empty($_POST['city'])) {
        echo 'Please fill in the blanks';
    } else {

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $address = $_POST['address'];
        $city = $_POST['city'];


    }

    $query = "INSERT INTO persons(firstName, lastName, address, city) 
                        VALUES ('$firstName', '$lastName', '$address', '$city')";
    $result = mysqli_query($con, $query);

    if ($result) {
        header("Location: ../admin/orderList.php");
    } else {
        echo 'Please check your query';
    }


} else {
    header("Location: ../admin/orderList.php");

}


