<?php
if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location: ../home.php');
    exit;
}

include('../db/connection.php');
include("../includes/function.php");

$user_data = check_login($con);
$currentUserID = $user_data['login_id'];

$query = "SELECT * FROM `persons`";
$result = mysqli_query($con, $query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Data</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="ajax/ajax.js"></script>
</head>
<body>

<div class="d-flex justify-content-center">
    <form action="../controller/checkout.php" enctype="multipart/form-data" method="post">
        <div class="modal-header">
            <h4 class="modal-title">Info</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Firstname</label>
                <input type="text" id="firstName" name="firstName" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Lastname</label>
                <input type="text" id="lastName" name="lastName" class="form-control" required>

            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" id="address" name="address" class="form-control" required>
            </div>

            <div class="form-group">
                <label>City</label>
                <input type="text" id="city" name="city" class="form-control" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" name="submit" class="btn btn-success" id="btn-add">Add</button>
        </div>
    </form>
</div>

</body>
</html>