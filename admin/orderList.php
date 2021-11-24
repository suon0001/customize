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
    <title>View Product</title>
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
<div class="container">
    <p id="success"></p>
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Manage <b>Orders</b></h2>

                </div>

            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>NO</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>City</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            <?php
            $i = 1;
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr id="<?php echo $row["id"]; ?>">

                    <td><?php echo $i; ?></td>
                    <td><?php echo $row["firstName"]; ?></td>
                    <td><?php echo $row["lastName"]; ?></td>
                    <td><?php echo $row["address"]; ?></td>
                    <td><?php echo $row["city"]; ?></td>
                   <td>

                        <a href="#">View</a>
                    </td>
                </tr>
                <?php
                $i++;
            }
            ?>
            </tbody>
        </table>

    </div>
</div>
<
</body>
</html>