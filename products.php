<?php
if (!isset($_SESSION)) {
    session_start();
}
include "navigation.php";
include "./includes/db/connection.php";

$product = $_SERVER['QUERY_STRING'];

$query = "SELECT * FROM product";
$result = mysqli_query($con, $query);



if (isset($_POST['add'])) {
    if (isset($_SESSION['cart'])) {
        $item_array_id = array_column($_SESSION['cart'], "product_id");
        print_r($item_array_id);

        if (in_array($_POST['product_id'], $item_array_id)) {
            echo "<script>alert('Product is already added in the cart')</script>";

        }

    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css"
          integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="includes/css/style.css">
    <title>Products</title>
</head>
<body>

<div class="container">
    <div class="row text-center py-5">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="col-md-4 col-sm-6 my-3">
                <form action="products.php" method="post">
                    <div class="card shadow">
                        <div>
                            <img src="includes/db/images/temperary2.jpg" alt="" class="img-fluid card-img-top">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['title']; ?></h5>
                            <h6>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half"></i>
                            </h6>
                            <p class="card-text">
                                Some quick example text to build on the card.
                            </p>
                            <small><s class="text-secondary">$519</s></small>
                            <h5 class="price">$<?php echo $row['price']; ?></h5>
                            <button class="btn btn-warning my-1"><a href="products-details.php?<?php echo $row['product_id']; ?>">More Details</a></button>
                            <?php echo "<button type=\"submit\" class=\"btn btn-warning my-1\" name=\"add\">Add to Cart <i class=\"fa fa-shopping-cart\"></i></button>
                             <input type='hidden' name='product_id' value='$product'>" ?>
                        </div>
                    </div>
                </form>
            </div>
        <?php } ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<style>
    img {
        max-width: 100%;
        height: auto;
        background: lightblue;
        background: radial-gradient(white 30%, lightblue 70%);
    }

    .fa-star,
    .fa-star-half {
        color: yellowgreen;
        padding: 3% 0;
    }

</style>


<?php include("footer.php"); ?>
</body>
</html>



