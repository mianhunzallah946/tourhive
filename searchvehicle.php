<?php
include("../connection.php");


$run = mysqli_query($connec, $sql);
while ($fet = mysqli_fetch_assoc($run)) {
    ?>
    <tr>
        <td><?php echo $fet['vehicle_id'] ?></td>
        <td><?php echo $fet['vehicle_type'] ?></td>
        <td><?php echo $fet['vehicle_name'] ?></td>
        <td><?php echo $fet['vehicle_number'] ?></td>
        <td><?php echo $fet['seating_capacity'] ?></td>
        <td><?php echo $fet['model_year'] ?></td>
        <td><?php echo $fet['fuel_type'] ?></td>
        <td><?php echo $fet['driver_name'] ?></td>
        <td><?php echo $fet['rate_per_km'] ?></td>
        <td><?php echo $fet['status'] ?></td>

        <td>
            <button class="btn btn-outline-primary" id="del-btn" data-del="<?php echo $fet['vehicle_id'] ?>">Delete</button>
        </td>
        <td>
            <button class="btn btn-outline-primary"> <a
                    href="./ajaxupdatevehicle.php?vehicle_id=<?php echo $fet['vehicle_id'] ?>">Update</a> </button>
        </td>
    </tr>
    <?php
}
?>