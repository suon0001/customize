<?php
if (!isset($_SESSION)) {
    session_start();
}
include "navigation.php";
include "./includes/db/connection.php";

$product = $_SERVER['QUERY_STRING'];

$query = "SELECT * FROM product";
$result = mysqli_query($con, $query);


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
</head>
<body>
<div class="row row-2">
    <h2>All Products</h2>
    <select name="" id="categories">
        <option value="">--- Choose a category ---</option>
        <option value="red">Controllers</option>
        <option value="green">Headset</option>
        <option value="blue">Keyboards</option>
    </select>
</div>

<div class="small-container">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <div class="row">
        <div class="col-4">
            <a href="products-details.php?<?php echo $row['product_id']; ?>"> <img src="includes/images/temperary.jpg"></a>
            <h4> <?php echo $row['title']; ?></h4>
            <p> <?php echo $row['price']; ?></p>
        </div>
    </div>
    <?php } ?>
    <div class="page-btn">
        <span> 1</span>
        <span> 2</span>
        <span> 3</span>
        <span> 4</span>
        <span>&#8594;</span>
    </div>
</div>


</div>
<style>
    .small-container {
        display: flex;
    }
</style>

<?php include("footer.php"); ?>
</body>
</html>



