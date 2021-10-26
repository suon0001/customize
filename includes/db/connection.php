<?php
require("constants.php");

$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);

if(!$con) {
    die ("Database error");
}

$db_select = mysqli_select_db($con, DB_NAME);

if(!$db_select) {
    die("Database error:" . mysqli_error($con));
}
