<?php
include("../connection.php");
session_start();
$email = mysqli_real_escape_string($connec, $_POST['email']);
$password = mysqli_real_escape_string($connec, $_POST['password']);
if (empty($email) || empty($password)) {
    echo 3;
} else {
    $sql = "SELECT * FROM `login` WHERE `email`='$email' AND `password`='$password'";
    $run = mysqli_query($connec, $sql);
    if ($run && mysqli_num_rows($run) > 0) {
        $rfet = mysqli_fetch_assoc($run);
        $_SESSION['email'] = $rfet['email'];
        $_SESSION['username'] = $rfet['username'];
        echo 1;
    } else {
        echo 2;
    }
}
?>