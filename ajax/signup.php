<?php
include("../connection.php");
$name = mysqli_real_escape_string($connec, $_POST['name']);
$username = mysqli_real_escape_string($connec, $_POST['username']);
$cnic = mysqli_real_escape_string($connec, $_POST['cnic']);
$email = mysqli_real_escape_string($connec, $_POST['email']);
$password = mysqli_real_escape_string($connec, $_POST['password']);
$login_img = $_FILES['login_img']['name'];
// $confirmpassword = mysqli_real_escape_string($connec, $_POST['confirmpassword']);
if (empty($name) || empty($username) || empty($cnic) || empty($email) || empty($password) || empty($login_img)) {
    echo 3;
} else {
    $exe = strtolower(pathinfo($login_img, PATHINFO_EXTENSION));
    $arr = array('png', 'jpeg', 'jpg');
    if (in_array($exe, $arr)) {
        $login_img = rand(1, 100000) . $exe;
        $esql = "SELECT * FROM `login` WHERE `email`='$email' OR `cnic`='$cnic' OR `username`='$username'";
        $erun = mysqli_query($connec, $esql);
        if (mysqli_num_rows($erun) > 0) {
            echo 4;
        } else {
            $sql = "INSERT INTO `login`(`name`,`username`,`cnic`,`email`,`password`,`login_img`)VALUES('$name','$username','$cnic','$email','$password','$login_img')";
            $run = mysqli_query($connec, $sql);
            if ($run) {
                move_uploaded_file($_FILES['login_img']['tmp_name'], "../loginimg/" . $login_img);
                echo 1;
            } else {
                echo 2;
            }
        }
    }
}
?>