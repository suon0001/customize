<?php
if (!isset($_SESSION)) {
    session_start();
}
include "navigation.php";
include "./includes/db/connection.php";

$product = $_SERVER['QUERY_STRING'];

$query = "SELECT * FROM product ORDER BY product_id ASC";
$result = mysqli_query($con, $query);


if (isset($_POST['add_to_cart'])) {
    if (isset($_SESSION['shopping_cart'])) {
        $item_array_id = array_column($_SESSION['shopping_cart'], "product_id");
        print_r($item_array_id);

        if (in_array($_GET['id'], $item_array_id)) {
            $count = count($_SESSION['shopping_cart']);
            $item_array = array(
                'product_id' => $_GET['id'],
                'title' => $_POST['hidden_title'],
                'price' => $_POST['hidden_price'],
                'quantity' => $_POST['quantity'],
            );
            $_SESSION['shopping_cart'] [$count] = $item_array;


        } else {
            echo '<script>alert("item already added")</script>';
            echo '<script>window.location="products.php"</script>';
        }

    } else {
        $item_array = array(
            'product_id' => $_GET['id'],
            'title' => $_POST['hidden_title'],
            'price' => $_POST['hidden_price'],
            'quantity' => $_POST['quantity'],
        );
        $_SESSION['shopping_cart'] [0] = $item_array;
    }
}

if (isset($_GET['action'])) {
    if ($_GET['action'] == "deleted") {
        foreach ($_SESSION['shopping_cart'] as $key => $value) {
            if ($value['product_id'] == $_GET['id']) {
                unset($_SESSION['shopping_cart'][$keys]);
                echo '<script>alert("Item removed successfully")</script>';
                echo '<script>window.location="products.php"</script>';
            }
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
    <link rel="stylesheet" href="includes/css/main.css">
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
                            echo "<img src=" . './includes/db/images/' . $row['image'] . " style='width: 100%;' />";
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
                        <a class="button" href="includes/controller/addCart.php?<?php echo $row['product_id']; ?>">Add
                            to Cart</a>
                    </div>
                </form>
            </div>
        <?php } ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>


<?php include("footer.php"); ?>

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
</style>
</body>
</html>



