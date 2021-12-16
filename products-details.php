<?php
if (!isset($_SESSION)) {
    session_start();
}
$product = $_SERVER['QUERY_STRING'];

include "view/navigation.php";
include "db/connection.php";

$query = "SELECT * FROM product WHERE product_ID = $product";
$result = mysqli_query($con, $query);

$query2 = "SELECT * FROM product ORDER BY RAND() LiMIT 4";

$result2 = mysqli_query($con, $query2);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
          class="offer-img">
</head>
<body>
<?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <main class="container">
        <div class="left-column">
            <?php
            echo "<img src=" . './includes/images/' . $row['image'] . " style='width: 80%;' />";
            ?>
        </div>
        <div class="right-column">
            <div class="product-description">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <span><?php echo $row['type']; ?></span></li>
                        <li class="breadcrumb-item active" aria-current="page"><span><?php echo $row['category']; ?></span>
                        </li>
                    </ol>
                </nav>
                <h1><?php echo $row['title']; ?></h1>
                <p><?php echo $row['description']; ?></p>
            </div>
            <span class="dot" style="background-color: <?php echo $row['color']; ?>"><span style="visibility: hidden">xxx</span></span>
            <div class="product-price">
                <h4>$<?php echo $row['price']; ?></h4>
                <a class="button" href="controller/addCart.php?<?php echo $row['product_id']; ?>">Add
                    to Cart</a>
                <a class="button" href="controller/buyNow.php?<?php echo $row['product_id']; ?>">
                    Buy Now</a>
            </div>
        </div>
    </main>

<?php } ?>

<h5 class="title">Recommend Products</h5>
<div class="container">

    <div class="row product-item">
        <?php while ($row = mysqli_fetch_assoc($result2)) { ?>
            <div class="col-4">
                <div class="imageSize"> <?php
                    echo "<img src=" . 'includes/images/' . $row['image'] . " style='object-fit:cover;' />";
                    ?>
                </div>

                <h4><a href="products-details.php?<?php echo $row['product_id']; ?>"><?php echo $row['title']; ?></a>
                </h4>
                <div class="rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i> <br>
                    <a href="products-details.php?<?php echo $row['product_id']; ?>">Click Here</a>
                    <p>$<?php echo $row['price']; ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>


<?php include("view/footer.php"); ?>
<style>
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 15px;
        display: flex;
    }

    .left-column {
        width: 65%;
        position: relative;
    }

    .right-column {
        width: 35%;
        margin-top: 60px;
    }

    .left-column img {
        width: 100%;
        left: 0;
        top: 0;
    }

    .imageSize {
        width: 50%;
        height: 50%;
    }


</style>

</body>
</html>
