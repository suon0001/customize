<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="ajax/ajax.js"></script>
    <title>User</title>
</head>
<body>



<div class="container">
    <div class="row justify-content-md-center">
        <div class="p-2">
            <a href="viewProduct.php"><h1>Product View</h1></a>
        </div>


    </div>
    <div class="text-center">
        <a href="orderList.php"><h1> Order list</h1></a>
    </div>
    <div class="text-center">
        <a href="../controller/logout.php?logout='1'" style="color: red;">
            <h1>Click here to Logout</h1>
        </a>
    </div>
</div>
</body>
</html>
