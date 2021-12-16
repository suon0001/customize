<?php

require_once("../db/connection.php");
require("../includes/function.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = trim(mysqli_real_escape_string($con, $_POST['username']));
    $email = trim(mysqli_real_escape_string($con, $_POST['email']));
    $password_1 = trim(mysqli_real_escape_string($con, $_POST['password_1']));
    $password_2 =trim(mysqli_real_escape_string($con, $_POST['password_2']));

    $iterations = ['cost' => 15];

    $hashed_password = password_hash($password_1, PASSWORD_BCRYPT, $iterations);

    $query = "INSERT INTO users (username, email, password, user_type) VALUES('$username', '$email', '$hashed_password', 'user')";

    $result = mysqli_query($con, $query);
    if ($result) {
        header('location: ../login.php');
        $message = "User Created.";
    }

}
