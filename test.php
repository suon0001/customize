<?php

if (!isset($_SESSION)) {
    session_start();
}

include "navigation.php";
include "./includes/db/connection.php";


if (isset($_POST["add_to_cart"])) {
    if (isset($_SESSION["shopping_cart"])) {
        $item_array_id = array_column($_SESSION["shopping_cart"], "product_id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'product_id' => $_GET["product_id"],
                'title' => $_POST["title"],
                'price' => $_POST["price"],
                'type' => $_POST["type"],
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        } else {
            //echo '<script>alert("Item Already Added")</script>';
            echo '<script>window.location="test.php"</script>';
        }
    } else {
        $item_array = array(
            'product_id' => $_GET["product_id"],
            'title' => $_POST["title"],
            'price' => $_POST["price"],
            'type' => $_POST["type"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}
if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($values["product_id"] == $_GET["id"]) {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="test.php"</script>';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<br/>
<div class="container" style="width:700px;">
    <h3 align="center">Simple PHP Mysql Shopping Cart</h3><br/>
    <?php
    $query = "SELECT * FROM product ORDER BY product_id ASC";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <div class="col-md-4">
                <form method="post" action="test.php?action=add&id=<?php echo $row["product_id"]; ?>">
                    <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;"
                         align="center">
                        <?php
                        echo "<img src=" . './includes/db/images/' . $row['image'] . " style='width: 100%;' />";
                        ?>
                        <h4 class="text-info"><?php echo $row["title"]; ?></h4>
                        <h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>
                        <input type="text" name="quantity" class="form-control" value="1"/>
                        <input type="hidden" name="hidden_name" value="<?php echo $row["title"]; ?>"/>
                        <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>"/>
                        <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success"
                               value="Add to Cart"/>
                    </div>
                </form>
            </div>
            <?php
        }
    }
    ?>
    <div style="clear:both"></div>
    <br/>
    <h3>Order Details</h3>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th width="40%">Item Name</th>
                <th width="10%">Quantity</th>
                <th width="20%">Price</th>
                <th width="15%">Total</th>
                <th width="5%">Action</th>
            </tr>
            <?php
            if (!empty($_SESSION["shopping_cart"])) {
                $total = 0;
                foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                    ?>
                    <tr>
                        <td><?php echo $values["title"]; ?></td>
                        <td><?php echo $values["type"]; ?></td>
                        <td>$ <?php echo $values["price"]; ?></td>
                        <td>$ <?php echo number_format($values["type"] * $values["price"], 2); ?></td>
                        <td><a href="test.php?action=delete&id=<?php echo $values["product_id"]; ?>"><span
                                        class="text-danger">Remove</span></a></td>
                    </tr>
                    <?php
                    $total = $total + ($values["type"] * $values["price"]);
                }
                ?>
                <tr>
                    <td colspan="3" align="right">Total</td>
                    <td align="right">$ <?php echo number_format($total, 2); ?></td>
                    <td></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>
<br/>
</body>
</html>