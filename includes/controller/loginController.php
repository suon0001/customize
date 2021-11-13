<?php


require_once("../db/connection.php");

include("../function.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    if (!empty($username) && !empty($password)) {
        $query = "SELECT * FROM `login` WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($con, $query);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                if (password_verify($password, $user_data['password'])) {
                    $_SESSION['login_id'] = $user_data['login_id'];
                    header("Location: http://localhost/php/customize/admin/viewProduct.php?" . $user_data['login_id']);
                    //echo $_POST["username"];
                    die;
                } else {
                    echo '<script>alert("Wrong e-mail or password")</script>';
                }
            }
        }
        echo '<script>alert("Wrong e-mail or password")</script>';
        header("Location: ../../login.php");

    } else {
        echo '<script>alert("Please fill out everything")</script>';
        header("Location: ../../login.php");

    }
}
