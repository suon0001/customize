<?php

require_once("../includes/db/connection.php");
error_reporting(0);
?>
<?php
$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./includes/db/images/".$filename;


    // Get all the submitted data from the form
    $query = "INSERT INTO images (filename) VALUES ('$filename')";

    // Execute query
    mysqli_query($con, $query);

    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder))  {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }
}
$result = mysqli_query($con, "SELECT * FROM image");
while($data = mysqli_fetch_array($result))
{

    ?>
    <img src="<?php echo $data['Filename']; ?>">

    <?php
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div id="content">

    <form method="POST" action="" enctype="multipart/form-data">
        <input type="file" name="uploadfile" value=""/>

        <div>
            <button type="submit" name="upload">UPLOAD</button>
        </div>
    </form>
</div>
</body>
</html>
<!DOCTYPE html>
<html>
