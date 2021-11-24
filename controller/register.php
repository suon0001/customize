<?php
require_once("../db/connection.php");
require("../includes/function.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    if (!empty($username) && !empty($password) && !is_numeric($username)) {

        //save to database
        $user_id = random_num(20);
        $query = "INSERT INTO login (username, password, user_type) VALUES ('$username', '$hashed_password', 0)";
        mysqli_query($con, $query);

        header("Location: ../view/login.php");
        die;
    } else {
        echo "Please into some valid information!";
    }
}