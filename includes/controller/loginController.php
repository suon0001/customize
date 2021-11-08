<?php


require_once("../db/connection.php");

include("../function.php");

$user_data = check_login($con);

// check med database


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    if (!empty($username) && !empty($password)) {
        $query = "SELECT * FROM `login` WHERE username = '$username' LIMIT 1";
        echo $query;
        $result = mysqli_query($con, $query);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                if (password_verify($password, $user_data['password'])) {
                    $_SESSION['login_id'] = $user_data['login_id'];
                    header("Location: http://localhost/php/customize/home.php?" . $user_data['login_id']);
                    echo $_POST["username"];
                    die;
                } else {
                    echo "<div style='background-color: red; color: white; text-align: center; margin: 0 auto; padding: 0.5em; font-size: .9vw; top: 750px; position: fixed' >Wrong e-mail or password</div>";
                }
            }
        }
        echo "<div style='background-color: red; color: white; text-align: center; margin: 0 auto; padding: 0.5em; font-size: .9vw; top: 750px; position: fixed' >Wrong e-mail or password</div>";
    } else {
        echo "<div style='background-color: red; color: white; text-align: center; margin: 0 auto; padding: 0.5em; font-size: .9vw; top: 750px; position: fixed' >Please fill out everything</div>";
    }
}
