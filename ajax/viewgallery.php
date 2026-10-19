<?php
include("../connection.php");
$sql = "SELECT * FROM `gallery`";
$run = mysqli_query($connec, $sql);
?>

<!-- Gallery Section -->
<div class="container mt-4">
    <h2 class="text-center mb-4">Gallery</h2>
    <div class="row">
        <?php while ($fet = mysqli_fetch_assoc($run)) { ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <img src="<?php echo "./galleryimg/" . $fet['gallery']; ?>" class="card-img-top img-fluid"
                        style="height: 300px; object-fit: cover;" alt="Gallery Image">
                </div>
            </div>
        <?php } ?>
    </div>
</div>