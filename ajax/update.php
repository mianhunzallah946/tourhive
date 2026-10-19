<?php
include("../connection.php");
// $tour_id = $_POST['tour_id'];
$tour_id = mysqli_real_escape_string($connec, $_POST['tour_id']);
$vsql = "SELECT * FROM `tour` WHERE `tour_id`='$tour_id'";
// $vrun = mysqli_query($connec, $vsql);

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


$sql = "UPDATE `tour` SET `name`='$name',`email`='$email',`contact`='$contact',`cnic`='$cnic',`persons`='$persons',`gender`='$gender',`locations`='$locations',`price`='$price',`duration_type`='$duration_type',`departure_date`='$departure_date' WHERE `tour_id`='$tour_id'";
$run = mysqli_query($connec, $sql);
if ($run) {
    // header("refresh:1,url=../ajaxview.php");
    echo 1;
} else {
    echo 2;
}

?>