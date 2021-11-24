<?php
require_once("../db/connection.php");

if (isset($_POST['submit'])) {
    if (empty($_POST['cardholder']) || empty($_POST['cardnumber']) || empty($_POST['month']) ||
        empty($_POST['year']) || empty($_POST['valid'])) {
        echo 'Please fill in the blanks';
    } else {

        $cardholder = mysqli_prepare(['cardholder']);
        $cardnumber = mysqli_prepare($_POST['cardnumber']);
        $month = mysqli_prepare($_POST['month']);
        $year = mysqli_prepare($_POST['year']);
        $valid = mysqli_prepare($_POST['valid']);
    }

    $query = "INSERT INTO creditcard(cardholder, cardnumber, month, year, valid)  VALUES ('$cardholder', '$cardnumber', '$month', '$year','$valid')";
    $result = mysqli_query($con, $query);

    if ($result) {
        header("Location: ../home.php");
    } else {
        echo 'Please check your query';
    }

} else {
    header("Location: ../home.php");
}
