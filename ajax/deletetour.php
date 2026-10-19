<?php
include("../connection.php");
$tour_id = $_POST['delete'];
$sql = "DELETE FROM `tour` WHERE `tour_id`='$tour_id'";
$run = mysqli_query($connec, $sql);
if ($run) {
    echo 1;
} else {
    echo 2;
}
?>