<?php

include('../includes/db/connection.php');

$title = $description = $type = $color = $price = '';
$errors = array('title' => '', 'description' => '', 'type' => '', 'color' => '', 'price' => '');

if (isset($_POST['submit'])) {

    if (empty($_POST['title'])) {
        $errors['title'] = "A title is required <br>";
    }

    if (empty($_POST['description'])) {
        $errors['description'] = "A description is required <br>";

    }
    if (empty($_POST['type'])) {
        $errors['type'] = "A type is required <br>";
    }

    if (empty($_POST['color'])) {
        $errors['color'] = "A color is required <br>";
    }

    if (empty($_POST['price'])) {
        $errors['price'] = "A price is required <br>";
    }


    if (array_filter($errors)) {
    } else {
        $title = mysqli_real_escape_string($con, $_POST['title']);
        $description = mysqli_real_escape_string($con, $_POST['description']);
        $type = mysqli_real_escape_string($con, $_POST['type']);
        $color = mysqli_real_escape_string($con, $_POST['color']);
        $price = mysqli_real_escape_string($con, $_POST['price']);


        $filename = $_FILES['image']['name'];
        $imageFileType = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $extensions_arr = array("jpg", "jpeg", "png", "gif");

        if (in_array($imageFileType, $extensions_arr)) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], './admin/images' . $filename)) {
                echo "image uploaded";
                header("Location: products.php");
            } else {
                echo "error";
            }
        }

        $sql = "INSERT INTO product(title, description, type, color, price) 
                        VALUES ('$title', '$description', '$type', '$color', '$price')";
        if (mysqli_query($con, $sql)) {
            header('Locaiton: productView.php');
        } else {
            echo 'query error: ' . mysqli_errno($con);
        }

        header("Location: products.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<section>
    <h2>Add a new product</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <label for="title">Title</label>
        <input type="text" name="title"> <br> <br>

        <label for="description">Description</label>
        <input type="text" name="description"> <br> <br>

        <label for="type">Type</label>
        <input type="text" name="type"> <br> <br>

        <label for="color">Color</label>
        <input type="text" name="color"> <br> <br>

        <label for="title">Price</label>
        <input type="number" name="price"> <br> <br>

        <label for="image">Add image</label>
        <input type="file" name="image" value=""/>

        <input type="submit" name="submit" value="Add">
    </form>
</section>

</html>