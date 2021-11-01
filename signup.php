<?php

session_start();
require("./includes/db/connection.php");
require("./includes/function.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password) && !is_numeric($username)) {

        //save to database
        $user_id = random_num(20);
        $query = "INSERT INTO login (username, password) VALUES ('$username', '$password')";
        mysqli_query($con, $query);

        //header("Location: login.php");
        die;
    } else {
        echo "Please into some valid information!";
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signup</title>
</head>
<body>
<?php include "navigation.php" ?><br>
<div id="box">
    <div style="font-size: 20px; margin: 10px;">Signup</div>
    <form method="post">
        <input id="text" type="text" name="username"> <br><br>
        <input id="text" type="password" name="password"><br><br>

        <input id="button" type="submit" value="signup"><br><br>

        <a href="login.php">LOGIN</a><br><br>
    </form>
</div>

<style>
    #text {
        height: 25px;
        border-radius: 5px;
        padding: 4px;
        border: solid thin #aaa;
        width: 100%;
    }

    #button {
        padding: 10px;
        width: 100px;
        color: white;
        background-color: lightblue;
        border: none;
    }

    #box {
        background-color: grey;
        margin: auto;
        width: 300px;
        padding: 20px;
    }

</style>

</body>
</html>





