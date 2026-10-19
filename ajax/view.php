<?php
include("../connection.php");
$sql = "SELECT * FROM `tour`";
$run = mysqli_query($connec, $sql);
while ($fet = mysqli_fetch_assoc($run)) {
    ?>
    <tr>
        <td><?php echo $fet['tour_id'] ?></td>
        <td><?php echo $fet['name'] ?></td>
        <td><?php echo $fet['email'] ?></td>
        <td><?php echo $fet['contact'] ?></td>
        <td><?php echo $fet['cnic'] ?></td>
        <td><?php echo $fet['persons'] ?></td>
        <td><?php echo $fet['gender'] ?></td>
        <td><?php echo $fet['locations'] ?></td>
        <td><?php echo $fet['price'] ?></td>
        <td><?php echo $fet['duration_type'] ?></td>
        <td><?php echo $fet['departure_date'] ?></td>
        <td>
            <button class="btn btn-outline-primary" id="delete-btn" data-del="<?php echo $fet['tour_id'] ?>">Delete</button>
        </td>
        <td>
            <button class="btn btn-outline-primary"> <a
                    href="./ajaxupdate.php?tour_id=<?php echo $fet['tour_id'] ?>">Update</a> </button>
        </td>
    </tr>
    <?php
}
?>