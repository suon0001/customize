<?php
include('../includes/db/connection.php');
include("../includes/function.php");

$user_data = check_login($con);
$currentUserID = $user_data['login_id'];

$query = "SELECT * FROM `product`";
$result = mysqli_query($con, $query);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>View product</title>
</head>
<body>
<h1>Product View</h1>
<form action="addProduct.php" method="post">
    <input class="button" type="submit" value="Add">
</form>
<form action="../index.php"
">
<input class="button" type="submit" value="Return">
</form>

<table>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Type</th>
        <th scope="col">Description</th>
        <th scope="col">Category</th>
        <th scope="col">Color</th>
        <th scope="col">Price</th>
        <th scope="col">Stock</th>
        <th scope="col">Image</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
    </tr>

    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        $product_id = $row['product_id'];
        $title = $row['title'];
        $type = $row['type'];
        $description = $row['description'];
        $category = $row['category'];
        $color = $row['color'];
        $price = $row['price'];
        $stock = $row['stock'];
        $product_image = $row['image'];
        ?>

        <tr>
            <td><?php echo $product_id ?></td>
            <td><?php echo $title ?></td>
            <td><?php echo $type ?></td>
            <td><?php echo $description ?></td>
            <td><?php echo $category ?></td>
            <td><?php echo $color ?></td>
            <td><?php echo '$' . $price ?></td>
            <td><?php echo $stock ?></td>
            <td>
                <?php
                echo "<img src=" . '../includes/db/images/' . $row['image'] . " style='width: 20%;' />";
                ?>
            </td>
            <td><a href="editProduct.php?GetID=<?php echo $product_id ?>"><i style="color:green" class="fa">&#10000;</i></a>
            </td>
            <td><a href="../includes/controller/delete.php?<?php echo $product_id ?>"><i style="color:red" class="fa">&#9747;</i></a>
            </td>

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