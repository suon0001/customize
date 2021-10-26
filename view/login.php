<?php

?>
<div id="box">

    <div style="font-size: 20px; margin: 10px;">Login</div>
    <form method="post" action="../includes/controller/LoginController.php">
        <input id="text" type="text" name="Username"> <br><br>
        <input id="text" type="password" name="password"><br><br>

        <input id="button" type="submit" value="Login"><br><br>

        <a href="signup.php">SIGNUP</a><br><br>
    </form>
</div>

<style type="text/css">
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
