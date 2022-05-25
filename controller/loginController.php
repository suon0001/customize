<?php
session_start();
include('../db/connection.php');
include('../includes/function.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    if (!empty($username) && !empty($password)) {
        $query = "SELECT * FROM `users` WHERE `username` = '$username' LIMIT 1";
        $result = mysqli_query($con, $query);

        var_dump($result);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            if (password_verify($password, $user_data['password'])) {
                $_SESSION['userID'] = $user_data['username'];
                header('Location: ../account.php');
            } else {
                $error = "Invalid username or password";
            }
        } else {
            $error = "Invalid username or password";
        }

       
    } else {
        echo "<div class='error'>Please fill out everything</div>";
    }
}
