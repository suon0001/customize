<?php


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>add product</title>
</head>
<body>

<h2>Add a new product</h2>
<form action="../includes/controller/addItems.php" method="post">
    <label for="title">Title</label><br>
    <input type="text" name="title"> <br> <br>

    <label for="description">Description</label><br>
    <input type="text" name="description"> <br> <br>

    <label for="type">Type</label><br>
    <input type="text" name="type"> <br> <br>

    <label for="color">Color</label><br>
    <input type="text" name="color"> <br> <br>

    <label for="title">Price</label><br>
    <input type="number" name="price"> <br> <br>

    <input type="submit" name="submit" value="Add">
    <a href="viewProduct.php"><input type="button" name="cancel" value="Cancel"></a>
</form>

<style>
    form {
        justify-items: center;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;


</style>

</body>
</html>

