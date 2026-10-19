<?php
include("../connection.php");
$vehicle_id = $_POST['delete'];
$dsql = "DELETE FROM `vehicle` WHERE `vehicle_id`='$vehicle_id'";
$drun = mysqli_query($connec, $dsql);
if ($run) {
    echo 1;
} else {
    echo 2;
}
?>