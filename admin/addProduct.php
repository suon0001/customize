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
    <label for="title">Title</label>
    <input type="text" name="title"> <br> <br>

    <label for="description">Description</label>
    <input type="text" name="description"> <br> <br>

    <label for="type">Type</label>
    <input type="text" name="type"> <br> <br>

    <label for="color">Color</label>
    <input type="text" name="color"> <br> <br>

    <label for="title">Price</label>
    <input type="number" name="price"> <br> <br>

    <input type="submit" name="submit" value="Add">
    <a href="productView.php"><input type="button" name="cancel" value="Cancel"></a>
</form>


</body>
</html>

