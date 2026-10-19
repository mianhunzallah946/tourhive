<?php
include("../connection.php");
$room_id = mysqli_real_escape_string($connec, $_POST['room_id']);
$hsql = "SELECT * FROM `hotel` WHERE `room_id`='$room_id'";
$hrun = mysqli_query($connec, $hsql);
$ufet = mysqli_fetch_assoc($hrun);
$hotel_name = mysqli_real_escape_string($connec, $_POST['hotel_name']);
$room_type = mysqli_real_escape_string($connec, $_POST['room_type']);
$room_description = mysqli_real_escape_string($connec, $_POST['room_description']);
$max_guest = mysqli_real_escape_string($connec, $_POST['max_guest']);
$amenities_str = $_POST['amenities'];
$amenities = mysqli_real_escape_string($connec, implode(",", $amenities_str));
$status = mysqli_real_escape_string($connec, $_POST['status']);
$room_img = $_FILES['room_img']['name'];
if (!empty($room_img[0])) {
    foreach ($room_img as $pic) {
        $exe = strtolower(pathinfo($pic, PATHINFO_EXTENSION));
        $arr = array('jpg', 'jpeg', 'png');
        $pic = rand(1, 100000) . "." . $exe;
        if (in_array($exe, $arr)) {
            $pic_array[] = $pic;
            $msg = "right";
        } else {
            $msg = "Not Right";
            break;
        }
    }
    if ($msg == "right") {
        $old_pic = @unserialize($ufet['room_img']);
        foreach ($old_pic as $mypic) {
            unlink("../roomimg/" . $mypic);
        }
    }
    if (@$msg == "right") {
        $new_pic = serialize($pic_array);

        $sql = "UPDATE `hotel` SET `hotel_name`='$hotel_name',`room_type`='$room_type',`room_description`='$room_description',`max_guest`='$max_guest',`amenities`='$amenities',`status`='$status',`room_img`='$new_pic' WHERE `room_id`='$room_id'";
        $run = mysqli_query($connec, $sql);
        if ($run) {
            foreach ($pic_array as $v => $c) {
                move_uploaded_file($_FILES['room_img']['tmp_name'][$v], "../roomimg/" . $c);
            }
            echo 1;
        } else {
            echo 2;
        }
    }
} else {
    $old_pic = $ufet['room_img'];
    $sql = "UPDATE `hotel` SET `hotel_name`='$hotel_name',`room_type`='$room_type',`room_description`='$room_description',`max_guest`='$max_guest',`amenities`='$amenities',`status`='$status',`room_img`='$old_pic' WHERE `room_id`='$room_id'";
    $run = mysqli_query($connec, $sql);
    if ($run) {
        echo 2;
    }
}
?>