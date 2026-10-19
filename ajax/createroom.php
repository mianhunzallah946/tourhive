<?php

include("../connection.php");
$hotel_name = mysqli_real_escape_string($connec, $_POST['hotel_name']);
$room_type = mysqli_real_escape_string($connec, $_POST['room_type']);
$room_description = mysqli_real_escape_string($connec, $_POST['room_description']);

$max_guest = mysqli_real_escape_string($connec, $_POST['max_guest']);
$amenities_str = $_POST['amenities'];
$amenities = mysqli_real_escape_string($connec, implode(",", $amenities_str));
$status = mysqli_real_escape_string($connec, $_POST['status']);
$room_img = $_FILES['room_img']['name'];



$filename = array();
foreach ($room_img as $room_imgs) {
    $exe = strtolower(pathinfo($room_imgs, PATHINFO_EXTENSION));
    $arr = array('png', 'jpeg', 'jpg');
    if (in_array($exe, $arr)) {
        $filename[] = rand(1, 10000) . "." . $exe;
        $msg = "right";
    } else {
        $msg = "Not Right";
        $filename = array();
        break;
    }
}
if ($msg == "right") {
    $image_room = serialize($filename);
    $sql = "INSERT INTO `hotel`(`hotel_name`,`room_type`,`room_description`,`max_guest`,`amenities`,`status`,`room_img`)VALUES('$hotel_name','$room_type','$room_description','$max_guest','$amenities','$status','$image_room')";
    $run = mysqli_query($connec, $sql);
    if ($run) {

        foreach ($filename as $v => $i) {
            move_uploaded_file($_FILES['room_img']['tmp_name'][$v], "../roomimg/" . $i);

        }
        echo 1;
    }
} else {
    echo 2;
}


?>