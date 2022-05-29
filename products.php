<?php
if (!isset($_SESSION)) {
    session_start();
}
include "view/navigation.php";
include "db/connection.php";

$product = $_SERVER['QUERY_STRING'];

$limit = 6;

if (isset($_GET["page"])) {
    $page  = $_GET["page"];
}
else{
    $page=1;
};
$start_from = ($page-1) * $limit;
$query = "SELECT * FROM product ORDER BY product_id ASC LIMIT $start_from, $limit";
$result = mysqli_query($con, $query);








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
    <link rel="stylesheet" href="css/main.css">
    <title>Products</title>
</head>
<body>

<div class="container">
    <div class="row text-center py-5">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="col-md-4 col-sm-6 my-3">
                <form action="products.php" method="post">
                    <div class="card">
                        <div>
                            <?php
                            echo "<img src=" . 'includes/images/' . $row['image'] . " style='width: 100%;' />";
                            ?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['title']; ?></h5>
                            <p class="card-text">
                                Some quick example text to build on the card.
                            </p>
                            <small><s class="text-secondary">$<?php echo $row['price'] + 10 / 100 * $row['price']; ?></s></small>
                            <h5 class="price">$<?php echo $row['price']; ?></h5>
                            <a href="products-details.php?<?php echo $row['product_id']; ?>">More Details</a>
                        </div>
                        <a class="button" href="controller/addCart.php?<?php echo $row['product_id']; ?>">Add
                            to Cart</a>
                    </div>
                </form>
            </div>
        <?php } ?>
    </div>
</div>

<?php
$result_db = mysqli_query($con,"SELECT COUNT(product_id) FROM product");
$row_db = mysqli_fetch_row($result_db);
$total_records = $row_db[0];
$total_pages = ceil($total_records / $limit);
$pagLink = "<ul class='pagination'>";
for ($i=1; $i<=$total_pages; $i++) {
    $pagLink .= "<li class='page-item'><a class='page-link' href='products.php?page=".$i."'>".$i."</a></li>";
}
echo $pagLink . "</ul>";


?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>


<?php include("view/footer.php"); ?>

<style>
    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        margin: auto;
        text-align: center;
        font-family: arial;
    }

    .price {
        color: grey;
        font-size: 22px;
    }

    .card button {
        border: none;
        outline: 0;
        padding: 12px;
        color: white;
        background-color: #000;
        text-align: center;
        cursor: pointer;
        width: 100%;
        font-size: 18px;
    }

    .card button:hover {
        opacity: 0.7;
    }

    .pagination {
        display: flex;
        justify-content: center;
    }
</style>
</body>
</html>



