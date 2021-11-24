<?php
if(!isset($_SESSION))
{
    session_start();

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
      class="offer-img">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="../css/main.css">
<div class="navbar">
    <div class="logo">
        <img src="" alt="">
    </div>
    <nav>
        <ul id="MenuItems">
            <li><a href="home.php">HOME</a></li>
            <li><a href="products.php">PRODUCTS</a></li>
            <li><a href="">CUSTOMIZE</a></li>
            <li><a href=contact.php>CONTACT</a></li>
            <li><a href="login.php">LOGIN</a></li>
        </ul>
    </nav>
    <a href="../controller/addCart.php"><i class="fa fa-shopping-cart"></i>
        <?php

        if (isset($_SESSION['cart'])){
            $count = count($_SESSION['cart']);
            echo "<span id=\"cart_count\" >$count</span>";
        }else{
            echo "<span id=\"cart_count\">0</span>";
        }

        ?></a>
    <a href="" class="menu-icon" onclick="menutoggle()"><i class="fa fa-bars"></i></a>
</div>

<script>
    const MenuItems = document.getElementById("MenuItems");

    MenuItems.style.maxHeight = "0px";

    function menutoggle() {
        if (MenuItems.style.maxHeight == "0px") {
            MenuItems.style.maxHeight = "200px"
        } else {
            MenuItems.style.maxHeight = "0px"
        }
    }
</script>

</body>
</html>



