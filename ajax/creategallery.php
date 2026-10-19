<?php
include("../connection.php");


$gallery = $_FILES['gallery']['name'];
if (empty($gallery)) {
    echo 3;
} else {
    $exe = strtolower(pathinfo($gallery, PATHINFO_EXTENSION));
    $arr = array('png', 'jpeg', 'jpg');
    if (in_array($exe, $arr)) {
        $gallery = rand(1, 10000) . "." . $exe;
        $sql = "INSERT INTO `gallery`(`gallery`)VALUES('$gallery')";
        $run = mysqli_query($connec, $sql);
        if ($run) {
            move_uploaded_file($_FILES['gallery']['tmp_name'], "../galleryimg/" . $gallery);
            echo 1;

        } else {
            echo 2;
        }
    }
}
?>