<?php
if (!isset($_SESSION)) {
    session_start();
}
include "navigation.php";
include "./includes/db/connection.php";

$productList = $_SERVER['QUERY_STRING'];

$query = "SELECT * FROM product WHERE product_id = $productList";
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
    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="col-4">
            <img src="includes/images/product.jpg">
            <h4> <?php echo $row['title']; ?></h4>
            <div class="rating">
                <i class="fa fa-star" aria - hidden="true"></i>
                <i class="fa fa-star" aria - hidden="true"></i>
                <i class="fa fa-star" aria - hidden="true"></i>
                <i class="fa fa-star-o" aria - hidden="true"></i>
                <i class="fa fa-star-o" aria - hidden="true"></i>
                <p> price</p>
            </div>
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

<?php include("footer.php"); ?>
</body>
</html>



