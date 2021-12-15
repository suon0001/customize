<?php
require_once("../db/connection.php");

if (isset($_POST['submit'])) {
    if (empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['country']) ||
        empty($_POST['street']) || empty($_POST['city']) || empty($_POST['postcode']) ||
        empty($_POST['phone']) || empty($_POST['email'])) {
        echo 'Please fill in the blanks';
    } else {

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $company = $_POST['company'];
        $country = $_POST['country'];
        $street = $_POST['street'];
        $city = $_POST['city'];
        $postcode = $_POST['postcode'];
        $state = $_POST['state'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];


    }

    $query = "INSERT INTO address(firstName, lastName, company, country, street, city, postcode, state, phone, email) VALUES ('$firstName', '$lastName','€company', '$country', '$street', '$city', '$postcode', '', '$phone', '$email')";
    $result = mysqli_query($con, $query);
    if ($result) {
        header("Location: ../end.php");
    } else {
        header("Location: ../payment.php");
        echo  'Please check your query';

    }


} else {
    header("Location: ../payment.php");

}


