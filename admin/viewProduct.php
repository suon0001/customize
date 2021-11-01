<?php
include('../includes/db/connection.php');

$query = "SELECT * FROM product";
$result = mysqli_query($con, $query)
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View product</title>
</head>
<body>
<h1>Product View</h1>
<form action="addProduct.php" method="post">
    <input class="button" type="submit" value="Add">
</form>
<table>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Type</th>
        <th scope="col">Color</th>
        <th scope="col">Price</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
    </tr>

    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        $product_id = $row['product_id'];
        $title = $row['title'];
        $description = $row['description'];
        $type = $row['type'];
        $color = $row['color'];
        $price = $row['price'];
        ?>

        <tr>
            <td><?php echo $product_id ?></td>
            <td><?php echo $title ?></td>
            <td><?php echo $description ?></td>
            <td><?php echo $type ?></td>
            <td><?php echo $color ?></td>
            <td><?php echo '$' . $price ?></td>
            <td><a href="editProduct.php?GetID=<?php echo $product_id ?>">Edit</a></td>
            <td><a href="delete.php?Del=<?php echo $product_id ?>">Delete</a></td>

        </tr>

        <?php
    }
    ?>

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


    .edit input[type='submit'] {
        margin-top: 10px;
        text-align: center;
        background-color: white;
        font-size: 15px;
    }

    .edit input[type='submit']:hover {
        margin-top: 10px;
        text-align: center;
        background-color: lightgray;
    }

    .button {
        font: inherit;
        line-height: normal;
        cursor: pointer;
        background: #789bbe;
        color: white;
        font-weight: bold;
        width: auto;
        margin-left: auto;
        font-weight: bold;
        padding-left: 15px;
        padding-right: 15px;
    }
</style>
</body>
</html>