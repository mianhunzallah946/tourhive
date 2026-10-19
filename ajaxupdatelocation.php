<?php
include("./connection.php");
include("./include/header.php");
include("./include/sidebar.php");
$loc_id = $_GET['loc_id'];
$sql = "SELECT * FROM `locations` WHERE `loc_id`='$loc_id'";
$run = mysqli_query($connec, $sql);
$fet = mysqli_fetch_assoc($run);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="col-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <!-- <span class="d-block p-3 btn btn-success text-white "><a href="./createlocation.php">New
                        Location</a></span> -->
                <!-- <h2 class="card-title">Location</h2> -->
                <br>
                <h5 class="card-description">
                    Update <?php echo $fet['name'] ?>
                </h5>
                <form id="form1">
                    <div class="form-group col-12">
                        <!-- <label for="exampleInputName1">Name</label> -->
                        <input type="hidden" class="form-control" name="loc_id" value="<?php echo $fet['loc_id'] ?>">
                    </div>
                    <div class="form-group col-12">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $fet['name'] ?>">
                    </div>
                    <div class="form-group col-12">
                        <label for="exampleInputName1">Description</label>
                        <textarea name="description" cols="146" rows="4"
                            class="form-control"><?php echo $fet['description'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>File upload</label>
                        <!-- <input  class="file-upload-default"> -->
                        <div class="input-group col-12">
                            <input type="file" class="form-control file-upload-info" name="loc_img"
                                placeholder="Upload Image">

                        </div>
                    </div>



                    <button type="submit" class="btn btn-primary mr-2" id="btn-update">Update</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
    <!-- </div> -->
    <script>

        $(document).ready(function () {
            $('#btn-update').on('click', function (e) {
                e.preventDefault();
                var formData = new FormData(form1);
                $.ajax({
                    url: './ajax/updatelocation.php/',
                    method: 'POST',
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (res) {
                        // alert(res)
                        if (res == 1) {
                            Swal.fire({
                                title: "Successfully",
                                text: "Location Updated!",
                                icon: "success"
                            });
                        } else if (res == 2) {
                            Swal.fire({
                                title: "Successfully",
                                text: "Location Can Be Update Without Image!",
                                icon: "success"
                            });
                        } else if (res == 3) {
                            Swal.fire({
                                title: "",
                                text: "Location Cannot Be Updated With Image!",
                                icon: "warning"
                            });
                        } else if (res == 4) {
                            Swal.fire({
                                title: "",
                                text: "Location Cannot Be Updated Without Image!",
                                icon: "warning"
                            });
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>
<?php
include("./include/footer.php");
?>