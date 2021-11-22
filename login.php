<?php
session_start();
require("./includes/db/connection.php");
require("./includes/function.php");
include "navigation.php"

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
<div class="container">
    <form action="controller/loginController.php" method="post">
        <h4>ACCOUNT</h4> <br>
        <div class="row">
            <input type="name" name="username">
            <input type="password" name="password">
            <input id="button" type="submit" value="Login"><br>
            <a href="signup.php">Make a account</a><br><br>
            <a href="">Forgot password?</a><br><br>
        </div>
    </form>
</div>

<style>
    body {
        font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 15px;
        color: #b9b9b9;
    }

    h4 {
        color: #789bbe;
    }

    input {
        width: 100%;
        padding: 10px;
        margin: 5px;
        line-height: 1.4;
        background-color: #f9f9f9;
        border: 1px solid #e5e5e5;
        border-radius: 3px;
    }


    .container {
        max-width: 38em;
        padding: 1em 3em 2em 3em;
        margin: 10px auto;
        background-color: #fff;
        border-radius: 4px;
        box-shadow: 0px 3px 10px -2px rgba(0, 0, 0, 0.2);
    }

</style>
</body>
</html>