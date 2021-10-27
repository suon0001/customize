<?php
require_once("../includes/db/connection.php");
require_once("../includes/function.php");

if (isset($_POST['submit'])) {
    $username = trim(mysqli_real_escape_string($con, $_POST['username']));
    $password = trim(mysqli_real_escape_string($con, $_POST['password']));
    $iterations = ['cost' => 15];

    $query = "INSERT INTO `login` (username, password) VALUES ('{$username}', '{$password}')";
    $result = mysqli_query($con, $query);
    if ($result) {
        $message = "User Created.";
    } else {
        $message = "Try again.";
        $message .= "<br />" . mysqli_error($con);
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

    <div style="font-size: 20px; margin: 10px;">Signup</div>
    <form method="post">
        <input id="text" type="text" name="username"> <br><br>
        <input id="text" type="password" name="password"><br><br>

        <input id="submit" type="submit" value="signup"><br><br>

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

<?php
if (isset($con)) {
    mysqli_close($con);
}
?>
