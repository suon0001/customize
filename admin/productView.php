<?php

include('../includes/db/connection.php');

$sql = "SELECT * FROM `product`";
$result = $con->query($sql);

?>

<html>

<head>
    <title>Product View</title>
</head>

<?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td style="font-weight: bold;">#<?php echo $row['productID'] ?></td>
        <td><?php echo $row['title'] ?></td>
        <td><?php echo $row['description'] ?></td>
        <td><?php echo $row['type'] ?></td>
        <td><?php echo $row['color'] ?></td>
        <td><?php echo $row['price'] ?></td>
        <td>
            <?php
            echo "<img src=" . '../includes/images' . $row['productImage'] . " style='width: 30%;' />";
            ?>
        </td>
        <td>
            <span style="font-size: 1.3em;">Product ID: <?php echo $row['product_id'] . " "; ?></span>
            <form action="deleteProduct.php" method="POST">
                <div class="edit">
                    <input type="hidden" name="id_to_delete" value="<?php echo $row['product_id']; ?>">
                    <input type="hidden" name="id_to_update" value="<?php echo $row['product_id']; ?>">
                    <input type="submit" name="update" value="Update" ;">
                    <input type="submit" name="delete" value="Delete" ;">
                </div>
            </form>
            <br>
        </td>
    </tr>
<?php } ?>


<body>
<h1>All Products</h1>
<a href="addProduct.php">CREATE A NEW PRODUCT</i></a>

<table>
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Type</th>
        <th scope="col">Color</th>
        <th scope="col">Image</th>
        <th scope="col">Price</th>
    </tr>
    </thead>
</table>
<style>

    * {
        padding: 0;
        margin: 0 auto;
    }

    table,
    td,
    th {
        border: 1px solid #789bbe;
        padding: 10px;
        text-align: center;
    }

    th {
        color: white;
        background-color: #789bbe;
        border: 1px solid lightgray;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    h1 {
        text-align: center;
        margin-top: 1em;
        text-transform: uppercase;
        font-size: 3vw;
        margin-bottom: .5em;
    }


    .edit {
        padding: 10px;
    }

    .edit input[type='submit'] {
        margin-top: 10px;
        text-align: center;
        background-color: white;
        font-size: 15px;
    }

    .edit input[type='submit']:hover {
        margin-top: 1em;
        text-align: center;
        background-color: lightgray;
    }
</style>
</body>
