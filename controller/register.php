<?php

require_once("../db/connection.php");
require("../includes/function.php");


if (isset($_POST['submit'])) {

    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password_1 = mysqli_real_escape_string($con, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($con, $_POST['password_2']);


    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }

    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");

    }

    if (count($errors) == 0) {


        $password = md5($password_1);


        $query = "INSERT INTO users (username, email, password, user_type) VALUES('$username', '$email', '$password', 'user')";

        mysqli_query($con, $query);


        $_SESSION['username'] = $username;


        $_SESSION['success'] = "You have logged in";

        header('location: ../login.php');
    }
}