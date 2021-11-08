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
<form action="../includes/controller/addItems.php" enctype="multipart/form-data" method="post">
    <label for="title">Title</label><br>
    <input type="text" name="title"> <br> <br>

    <label for="type">Device</label><br>
    <select name="type">
        <option value="">--- Choose a Device ---</option>
        <option value="Playstation">Playstation</option>
        <option value="Xbox">Xbox</option>
        <option value="Nintendo">Nintendo</option>
        <option value="Accessories">Accessories</option>
    </select><br><br>

    <label for="description">Description</label><br>
    <input type="text" name="description"> <br> <br>

    <label for="category">Type</label><br>
    <select name="category">
        <option value="">--- Choose a type ---</option>
        <option value="Latest">Latest</option>
        <option value="Featured">Featured</option>
        <option value="Recommend">Recommend</option>
    </select><br><br>

    <label for="color">Color</label><br>
    <input type="text" name="color"> <br> <br>

    <label for="title">Price</label><br>
    <input type="number" name="price"> <br> <br>

    <label for="image">Add image</label>
    <input type="file" name="image" id="image" value="" />

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

