<?php

session_start();
include("./webshop/includes/db/connection.php");
include("webshop/includes/function.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $user_name = $_POST['Username'];
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

        //save to database
        $user_id = random_num(20);
        $query = "INSERT INTO login (LoginID, Username, Password) VALUES ('$LoginID', '$Username', '$Password')";
        mysqli_query($con, $query);

        header("Location: login.php");
        die;
    }else
    {
        echo "Please into some valid information!";
    }
}

?>

<!
<html>
<head>
    <title>Signup</title>
</head>
<body>



<div id="box">

    <div style="font-size: 20px; margin: 10px;">Login</div>
    <form method="post">
        <input id="text" type="text" name="Username"> <br><br>
        <input id="text" type="password" name="password"><br><br>

        <input id="button" type="submit" value="signup"><br><br>

        <a href="login.php">LOGIN</a><br><br>
    </form>
</div>

<style type="text/css">
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
