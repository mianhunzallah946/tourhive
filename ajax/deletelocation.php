<?php
include("../connection.php");
$loc_id = $_POST['delete'];
$dsql = "SELECT `loc_img` FROM `locations` WHERE `loc_id`='$loc_id'";
$drun = mysqli_query($connec, $dsql);
$dfet = mysqli_fetch_assoc($drun);

if (file_exists("../locimg" . $dfet['loc_img'])) {
    unlink("../locimg/" . $dfet['loc_img']);
}
$sql = "DELETE FROM `locations` WHERE `loc_id`='$loc_id'";
$run = mysqli_query($connec, $sql);
if ($run) {
    echo 1;
} else {
    echo 2;
}
?>