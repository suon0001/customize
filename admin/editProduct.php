<?php
include('../includes/db/connection.php');
$product_id = $_GET['GetID'];
$query = "SELECT * FROM product WHERE product_id='" . $product_id . "'";
$result = mysqli_query($con, $query);

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

<h2>Edit product</h2>
<?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <form action="../includes/controller/update.php?<?php echo $row['product_id']; ?>" enctype="multipart/form-data" method="post">
        <label for="title">Title</label><br>
        <input type="text" name="title" value="<?php echo $row['title']; ?>"> <br> <br>

        <label for="type">Type</label><br>
        <select name="type">
            <option name="type" ><?php echo $row['type']; ?></option>
            <option value="Latest">Latest</option>
            <option value="Featured">Featured</option>
            <option value="Recommend">Recommend</option>
        </select><br><br>

        <label for="description">Description</label> <br>
        <input type="text" name="description" value="<?php echo $row['description']; ?>"> <br> <br>

        <label for="category">Category</label><br>
        <select name="category">
            <option name="category"><?php echo $row['category']; ?> </option>
            <option value="DYI">DYI</option>
            <option value="Headset">Headset</option>
            <option value="Controller">Controller</option>
            <option value="Accessories">Accessories</option>
        </select><br><br>

        <label for="color">Color</label><br>
        <input type="text" name="color" value="<?php echo $row['color']; ?>"> <br> <br>

        <label for="title">Price</label><br>
        <input type="number" name="price" value="<?php echo $row['price'] ?>"> <br> <br>

        <label for="title">Stock</label><br>
        <input type="number" name="stock" value="<?php echo $row['stock'] ?>"> <br> <br>

        <label for="image">Add image</label>
        <input type="file" name="image" id="image" value="<?php echo $row['image'] ?>" />

        <input type="submit" name="update" value="Update">
        <a href="viewProduct.php"><input type="button" name="cancel" value="Cancel"></a>
    </form>
<?php } ?>
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