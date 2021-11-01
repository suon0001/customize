<?php


?>

<!DOCTYPE html>
<html lang="en">

<section>
    <h2>Add a new product</h2>
    <form action="../includes/controller/addItems.php" method="POST" enctype="multipart/form-data">
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

<!--        <label for="image">Add image</label>-->
<!--        <input type="file" name="image" value=""/>-->

        <input type="submit" name="submit" value="Add">
        <a href="productView.php"><input type="button" name="return" value="Return"></a>
    </form>
</section>

</html>