<?php
include('../includes/db/connection.php');
$product_id = $_GET['GetID'];
$query = "SELECT * FROM product WHERE product_id='".$product_id."'";
$result = mysqli_query($con, $query);

while($row=mysqli_fetch_assoc($result)) {
    $product_id = $row['product_id'];
    $title = $row['title'];
    $description = $row['description'];
    $type = $row['type'];
    $color = $row['color'];
    $price = $row['price'];
}


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
<form action="../includes/controller/addItems.php" method="post">
    <label for="title">Title</label><br>
    <input type="text" name="title" value="<?php echo $product_id?>"> <br> <br>

    <label for="description">Description</label> <br>
    <input type="text" name="type" value="<?php echo $description?>"> <br> <br> <br>

    <label for="type">Type</label><br>
    <input type="text" name="type" value="<?php echo $type?>"> <br> <br>

    <label for="color">Color</label><br>
    <input type="text" name="color" value="<?php echo $color?>"> <br> <br>

    <label for="title">Price</label><br>
    <input type="number" name="price" value="<?php echo $price?>"> <br> <br>

    <input type="submit" name="submit" value="Add">
    <a href="viewProduct.php"><input type="button" name="cancel" value="Cancel"></a>
</form>


</body>
</html>