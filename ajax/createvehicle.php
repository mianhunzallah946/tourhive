<?php
include("../connection.php");
$vehicle_type = mysqli_real_escape_string($connec, $_POST['vehicle_type']);
$vehicle_name = mysqli_real_escape_string($connec, $_POST['vehicle_name']);
$vehicle_number = mysqli_real_escape_string($connec, $_POST['vehicle_number']);
$seating_capacity = mysqli_real_escape_string($connec, $_POST['seating_capacity']);
$model_year = mysqli_real_escape_string($connec, $_POST['model_year']);
$fuel_type = mysqli_real_escape_string($connec, $_POST['fuel_type']);
$driver_name = mysqli_real_escape_string($connec, $_POST['driver_name']);
$rate_per_km = mysqli_real_escape_string($connec, $_POST['rate_per_km']);
$status = mysqli_real_escape_string($connec, $_POST['status']);
if (empty($vehicle_type) || empty($vehicle_name) || empty($vehicle_number) || empty($seating_capacity) || empty($model_year) || empty($fuel_type) || empty($driver_name) || empty($rate_per_km) || empty($status)) {
    echo 3;
} else {
    $sql = "INSERT INTO `vehicle`(`vehicle_type`,`vehicle_name`,`vehicle_number`,`seating_capacity`,`model_year`,`fuel_type`,`driver_name`,`rate_per_km`,`status`)VALUES('$vehicle_type','$vehicle_name','$vehicle_number','$seating_capacity','$model_year','$fuel_type','$driver_name','$rate_per_km','$status')";
    $run = mysqli_query($connec, $sql);
    if ($run) {
        echo 1;
    } else {
        echo 2;
    }
}
?>