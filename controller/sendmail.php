<?php
$myMail = "cutomize2021@gmail.com";
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$phone = htmlspecialchars($_POST['phone']);
$msg = htmlspecialchars($_POST['message']);
$regexp = "/^[^0-9][A-z0-9_-]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_-]+)*[.][A-z]{2,4}$/";

if (!preg_match($regexp, $_POST['email'])) {
    echo "email wrong";
}elseif (empty($email) || empty($msg)  || empty($name)) {
    echo "Empty field";
}elseif ($_POST['submit']) {
    $body = "$msg\n\nE-mail: $email";
    mail($myMail, $phone, $body, "From: $email\n");
    echo "Thanks for your E-mail";
} else {
    echo '<script>alert("Please fill out everything")</script>';
    header("Location: home.php");

}


