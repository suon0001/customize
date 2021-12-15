<?php
require_once("../db/connection.php");

if (isset($_POST['submit'])) {
    if (empty($_POST['title'])) {
        echo 'Please fill in the blanks';
    } else {

    }

} else {
    header("Location: ../admin/viewProduct.php");

}


