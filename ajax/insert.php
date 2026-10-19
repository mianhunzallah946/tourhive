<?php
include("../connection.php");
$name = mysqli_real_escape_string($connec, $_POST['name']);
$email = mysqli_real_escape_string($connec, $_POST['email']);
$contact = mysqli_real_escape_string($connec, $_POST['contact']);
$cnic = mysqli_real_escape_string($connec, $_POST['cnic']);
$persons = mysqli_real_escape_string($connec, $_POST['persons']);
$gender = mysqli_real_escape_string($connec, $_POST['gender']);
$locations = mysqli_real_escape_string($connec, $_POST['locations']);
$price = mysqli_real_escape_string($connec, $_POST['price']);
$duration_type = mysqli_real_escape_string($connec, $_POST['duration_type']);
$departure_date = mysqli_real_escape_string($connec, $_POST['departure_date']);
// $time = mysqli_real_escape_string($connec, $_POST['time']);
if (empty($name) || empty($email) || (empty($contact)) || (empty($cnic)) || (empty($persons)) || (empty($gender)) || empty($locations) || empty($price) || empty($duration_type) || empty($departure_date)) {
    echo 3;
} else {

    $sql = "INSERT INTO `tour`(`name`,`email`,`contact`,`cnic`,`persons`,`gender`,`locations`,`price`,`duration_type`,`departure_date`)VALUES('$name','$email','$contact','$cnic','$persons','$gender','$locations','$price','$duration_type','$departure_date')";
    $run = mysqli_query($connec, $sql);
    if ($run) {
        echo 1;
    } else {
        echo 2;
    }
}
?>