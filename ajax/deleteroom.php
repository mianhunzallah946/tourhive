<?php
include("../connection.php");
$room_id = $_POST['delete'];
$dsql = "SELECT `room_img` FROM `hotel` WHERE `room_id`='$room_id'";
$drun = mysqli_query($connec, $dsql);
$dfet = mysqli_fetch_assoc($drun);
$room_img = unserialize($dfet['room_img']);
foreach ($room_img as $room_imgs) {
    if (file_exists("../roomimg/" . $room_imgs))
        unlink("../roomimg/" . $room_imgs);
}
$sql = "DELETE FROM `hotel` WHERE `room_id`='$room_id'";
$run = mysqli_query($connec, $sql);
if ($run) {
    echo 1;
} else {
    echo 2;
}
?>