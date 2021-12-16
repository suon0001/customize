<?php

require_once("../db/connection.php");
require("../includes/function.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {


    $username = trim(mysqli_real_escape_string($con, $_POST['username']));
    $password = trim(mysqli_real_escape_string($con, $_POST['password']));


    $password = md5($password);

    $query = "SELECT * FROM users WHERE username=
                '$username' AND password='$password'";
    $results = mysqli_query($con, $query);

    if (mysqli_num_rows($results) == 1) {
        $logged_in_user = mysqli_fetch_assoc($results);
        if ($logged_in_user['user_type'] != 'admin') {

            $_SESSION['user'] = $logged_in_user;
            $_SESSION['username'] = $username;


            header('location: ../account.php');
        } else {

            $_SESSION['user'] = $logged_in_user;
            $_SESSION['username'] = $username;
            header('location: ../admin/adminView.php');
        }
    } else {


        header('location: ../login.php');
    }
}
