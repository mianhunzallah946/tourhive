<?php
include("../connection.php");
$sql = "SELECT * FROM `hotel`";
$run = mysqli_query($connec, $sql);
while ($fet = mysqli_fetch_assoc($run)) {
    ?>
    <tr>
        <!-- #region -->
        <td><?php echo $fet['hotel_name'] ?></td>
        <td><?php echo $fet['room_type'] ?></td>
        <td><?php echo $fet['room_description'] ?></td>
        <td><?php echo $fet['max_guest'] ?></td>
        <td><?php echo $fet['amenities'] ?></td>
        <td><?php echo $fet['status'] ?></td>

        <td>
            <?php
            $room_img = unserialize($fet['room_img']);
            foreach ($room_img as $p) {
                ?>
                <a href="<?php echo "./roomimg/" . $p ?>">
                    <img src="<?php echo "./roomimg/" . $p ?>" alt="" style="margin:5px;">
                </a>
                <?php
            }
            ?>
        </td>
        <td><button class="btn btn-outline-primary"><a class="btn-del"
                    data-del="<?php echo $fet['room_id'] ?>">DELETE</button></a></td>
        <td> <button class="btn btn-outline-primary"><a
                    href="./ajaxupdateroom.php?room_id=<?php echo $fet['room_id'] ?>">Update</a></button></td>
    </tr>

    <?php
}
?>