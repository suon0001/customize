<?php
require_once("./includes/db/connection.php");

include("./includes/function.php");

$user_data = check_login($con);

// check med database


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    if (!empty($uaername) && !empty($password)) {
        $query = "SELECT * FROM login WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                if (password_verify($password, $user_data['password'])) {
                    $_SESSION['login_id'] = $user_data['login_id'];

                    die;
                } else {
                    header("Location: ?" . user_data['login_id']);
                    echo "<div style='background-color: red; color: white; text-align: center; margin: 0 auto; padding: 0.5em; font-size: .9vw; top: 750px; position: fixed' >Wrong e-mail or password</div>";
                }
            }
        }
    }
}

?>
<div id="box">

    <div style="font-size: 20px; margin: 10px;">Login</div>
    <form method="post">
        <input id="text" type="text" name="username"> <br><br>
        <input id="text" type="password" name="password"><br><br>

        <input id="button" type="submit" value="Login"><br><br>

        <a href="signup.php">SIGNUP</a><br><br>
    </form>
</div>

<style>
    #text{
        height: 25px;
        border-radius: 5px;
        padding: 4px;
        border: solid thin #aaa;
        width: 100%;
    }

    #button{
        padding: 10px;
        width: 100px;
        color: white;
        background-color: lightblue;
        border: none;
    }

    #box{
        background-color: grey;
        margin: auto;
        width: 300px;
        padding: 20px;
    }

</style>



</body>
</html>
