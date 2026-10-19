<?php
include("./connection.php");
include("./include/header.php");
include("./include/sidebar.php");
$sql = "SELECT * FROM `hotel`";
$run = mysqli_query($connec, $sql);
$fet = mysqli_fetch_assoc($run);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width='device-width', initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="col-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <br>
                <h5 class="card-description">
                    Update <?php echo $fet['hotel_name'] ?>
                </h5>
                <form id="form1" enctype="multipart/form-data">

                    <div class="form-group col-12">
                        <!-- <label for="exampleInputName1">Hotel Name</label> -->
                        <input type="hidden" class="form-control" name="room_id" value="<?php echo $fet['room_id'] ?>">
                    </div>
                    <div class="form-group col-12">
                        <label for="exampleInputName1">Hotel Name</label>
                        <input type="text" class="form-control" name="hotel_name"
                            value="<?php echo $fet['hotel_name'] ?>">
                    </div>

                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Room Type</h4>
                                <div class="form-group">
                                    <!-- <label>room Type</label> -->
                                    <select class="js-example-basic-single w-100" name="room_type"
                                        value="<?php echo $fet['room_type'] ?>">
                                        <option value="">----SELECT-----</option>
                                        <option value="3 Star">3 Star</option>
                                        <option value="4 Star">4 Star</option>
                                        <option value="5 Star">5 Star</option>
                                        <option value="7 Star">7 Star</option>

                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="form-group col-12">
                        <label for="exampleInputName1">Room Description</label>
                        <textarea name="room_description" cols="146" rows="4"
                            class="form-control"><?php echo $fet['room_description'] ?></textarea>
                    </div>

                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Max Guests</h4>
                                <div class="form-group">
                                    <!-- <label>Max Guests</label> -->
                                    <select class="js-example-basic-single w-100" name="max_guest">

                                        <option value="">----SELECT-----</option>
                                        <option value="2">2</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>



                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Amenities</h4>
                                <div class="form-group">
                                    <!-- <label>Max Guests</label> -->
                                    <label><input type="checkbox" name="amenities[]" value="WiFi"> WiFi</label><br>
                                    <label><input type="checkbox" name="amenities[]" value="Parking">
                                        Parking</label><br>
                                    <label><input type="checkbox" name="amenities[]" value="Swimming Pool"> Swimming
                                        Pool</label><br>
                                    <label><input type="checkbox" name="amenities[]" value="Breakfast">
                                        Breakfast</label><br>
                                    <label><input type="checkbox" name="amenities[]" value="Breakfast">
                                        Resturant</label><br>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Room Status</h4>
                                <div class="form-group">
                                    <!-- <label>Max Guests</label> -->
                                    <!-- <input type="radio" name="status" id=""> -->

                                    <label><input type="radio" name="status" value="Available">
                                        Available</label><br>
                                    <label><input type="radio" name="status" value="Booked">
                                        Booked</label><br>
                                    <label><input type="radio" name="status" value="In-Active">
                                        In-Active</label><br>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>File upload</label>
                        <!-- <input  class="file-upload-default"> -->
                        <div class="input-group col-12">
                            <input type="file" class="form-control file-upload-info" name="room_img[]"
                                placeholder="Upload Image" multiple>

                        </div>
                    </div>



                    <button type="submit" class="btn btn-primary mr-2" id="btn-update">Submit</button>
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
                var formData = new FormData(form1)
                $.ajax({
                    url: './ajax/updateroom.php',
                    method: 'POST',
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (res) {
                        alert(res);
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