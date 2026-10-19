<?php
include("../connection.php");

$loc_id = mysqli_real_escape_string($connec, $_POST['loc_id']);
$sql = "SELECT * FROM `locations` WHERE `loc_id`='$loc_id'";
$run = mysqli_query($connec, $sql);
$fet = mysqli_fetch_assoc($run);
$name = mysqli_real_escape_string($connec, $_POST['name']);
$description = mysqli_real_escape_string($connec, $_POST['description']);
$loc_img = $_FILES['loc_img']['name'];

if (!empty($loc_img)) {
    $exe = strtolower(pathinfo($loc_img, PATHINFO_EXTENSION));
    $arr = array('png', 'jpeg', 'jpg');
    if (in_array($exe, $arr)) {
        $loc_image = rand(1, 10000) . "." . $exe;
        if (file_exists("../locimg/" . $fet['loc_img'])) {
            unlink("../locimg/" . $fet['loc_img']);
        }
        $rsql = "UPDATE `locations` SET `name`='$name',`description`='$description',`loc_img`='$loc_image' WHERE `loc_id`='$loc_id'";
        $rrun = mysqli_query($connec, $rsql);
        if ($rrun) {
            move_uploaded_file($_FILES['loc_img']['tmp_name'], "../locimg/" . $loc_image);
            header("refresh:1,url=../viewlocationajax.php");
            echo 1;
        } else {
            echo 3;
        }
    }
} else {
    $usql = "UPDATE `locations` SET `name`='$name',`description`='$description' WHERE `loc_id`='$loc_id'";
    $urun = mysqli_query($connec, $usql);
    if ($urun) {
        header("refresh:1,url=../viewlocationajax.php");
        echo 2;
    } else {
        echo 4;
    }
}

?>