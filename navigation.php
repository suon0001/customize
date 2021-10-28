<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
          class="offer-img">
</head>
<body>

<div class="navbar">
    <div class="logo">
        <img src="" alt="">
    </div>
    <nav>
        <ul id="MenuItems">
            <li><a href="home.php">HOME</a></li>
            <li><a href="news.php">NEWS</a></li>
            <li><a href="products.php">PRODUCTS</a></li>
            <li><a href="customize.php">CUSTOMIZE</a></li>
            <li><a href=contact.php>CONTACT</a></li>
            <li><a href="login.php">LOGIN</a></li>
        </ul>
    </nav>
    <a href=""><i class="fa fa-shopping-basket"></i></a>
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

