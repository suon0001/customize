<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="ajax/ajax.js"></script>
    <title>User</title>
</head>
<body>
<div>
    <?php  if (isset($_SESSION['user'])) : ?>
        <strong><?php echo $_SESSION['user']['username']; ?></strong>

        <small>
            <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
            <br>
            <a href="../controller/logout.php?logout='1'" style="color: red;">logout</a>
        </small>

    <?php endif ?>
</div>

<?php  if (isset($_SESSION['username'])) : ?>
    <p>
        Welcome
        <strong>
            <?php echo $_SESSION['username']; ?>
        </strong>
    </p>

    <p>
        <a href="../controller/logout.php?logout='1'" style="color: red;">
            Click here to Logout
        </a>
    </p>

<?php endif ?>
<div class="container">
    <div class="row">
        <div class="col-sm">
            <a href="viewProduct.php">Product View</a>
        </div>
        <div class="col-sm">
            Order View
        </div>
        <div class="col-sm">
            One of three columns
        </div>
    </div>
</div>
</body>
</html>
