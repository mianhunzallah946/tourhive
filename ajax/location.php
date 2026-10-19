<?php
include("../connection.php");
$name = mysqli_real_escape_string($connec, $_POST['name']);
$description = mysqli_real_escape_string($connec, $_POST['description']);
$loc_img = $_FILES['loc_img']['name'];
if (empty($name) || empty($description) || empty($loc_img)) {
   echo 3;
} else {
   $exe = strtolower(pathinfo($loc_img, PATHINFO_EXTENSION));
   $arr = array('png', 'jpeg', 'jpg');
   if (in_array($exe, $arr)) {
      $loc_image = rand(1, 10000) . "." . $exe;
      $sql = "INSERT INTO `locations`(`name`,`description`,`loc_img`)VALUES('$name','$description','$loc_image')";
      $run = mysqli_query($connec, $sql);
      if ($run) {
         move_uploaded_file($_FILES['loc_img']['tmp_name'], "../locimg/" . $loc_image);
         echo 1;

      } else {
         echo 2;
      }
   }
}
?>