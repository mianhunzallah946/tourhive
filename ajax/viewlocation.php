<?php
include("../connection.php");
$sql = "SELECT * FROM `locations`";
$run = mysqli_query($connec, $sql);
while ($fet = mysqli_fetch_assoc($run)) {




    ?>
    <!-- <div class="card-columns" id="location-data"> -->
    <div class="card">
        <img class="card-img-top" src=" <?php echo "./locimg/" . $fet['loc_img'] ?>" width="50px" height="300px"
            alt="Card image cap">
        <div class="card-body">
            <h4 class="card-title"><?php echo $fet['name'] ?></h4>
            <p class="card-text"><?php echo $fet['description'] ?></p>
        </div>
        <div style="text-align:right;">
            <button class="btn btn-info p-1"><a
                    href="./ajaxupdatelocation.php?loc_id=<?php echo $fet['loc_id'] ?>">Update</a></button>
            <button class="btn btn-danger p-1" id="del-btn" data-del="<?php echo $fet['loc_id'] ?>">
                DELETE</button>

        </div>


        <!-- </div> -->
        <?php
}
?>