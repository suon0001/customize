<?php
$myMail = "suon000@easv.dk";
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$msg = $_POST['message'];
$regexp = "/^[^0-9][A-z0-9_-]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_-]+)*[.][A-z]{2,4}$/";

if (!preg_match($regexp, $_POST['email'])) {
    echo "email wrong";
}elseif (empty($email) || empty($msg)  || empty($name)) {
    echo "Empty field";
}elseif ($_POST['submit']) {
    $body = "$msg\n\nE-mail: $email";
    mail($myMail, $phone, $body, "From: $email\n");
    echo "Thanks for your E-mail";
}


