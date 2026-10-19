<?php
include("./include/header.php");
include("./include/sidebar.php");
include("./connection.php");
$sql = "SELECT * FROM `vehicle`";
$run = mysqli_query($connec, $sql);
$fet = mysqli_fetch_assoc($run);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="col-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <br>
                <h5 class="card-description">
                    Update <?php echo $fet['vehicle_name'] ?>
                </h5>
                <form id="form1" enctype="multipart/form-data">
                    <div class="form-group col-12">
                        <!-- <label for="exampleInputName1">Vehicle Name</label> -->
                        <input type="hidden" class="form-control" name="vehicle_id"
                            value="<?php echo $fet['vehicle_id'] ?>">
                    </div>
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Vehicle Type</h4>
                                <div class="form-group">
                                    <!-- <label>room Type</label> -->
                                    <select class="js-example-basic-single w-100" name="vehicle_type"
                                        style="text-align:center;">
                                        <option value="">Choose</option>
                                        <optgroup label="Car">
                                            <option value="sedan">Sedan</option>
                                            <option value="suv">SUV</option>
                                            <option value="hatchback">Hatchback</option>
                                        </optgroup>
                                        <optgroup label="Bus">
                                            <option value="minibus">Mini Bus</option>
                                            <option value="coach">Coach</option>
                                        </optgroup>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-12">
                        <label for="exampleInputName1">Vehicle Name</label>
                        <input type="text" class="form-control" name="vehicle_name">
                    </div>
                    <div class="form-group col-12">
                        <label for="exampleInputName1">Vehicle Number</label>
                        <input type="text" class="form-control" name="vehicle_number">
                    </div>
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Seating Capacity</h4>
                                <div class="form-group">
                                    <!-- <label>Max Guests</label> -->
                                    <select class="js-example-basic-single w-100" name="seating_capacity"
                                        style="text-align:center;">
                                        <option value="">Choose</option>
                                        <option value="5 Seater">5 Seater</option>
                                        <option value="7 Seater ">7 Seater</option>
                                        <option value="9 Seater">9 Seater</option>
                                        <option value="18 Seater">18 Seater</option>
                                        <option value="24 Seater">24 Seater</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="form-group col-12">
                        <label for="exampleInputName1">Model Year</label>
                        <input type="month" class="form-control" name="model_year">
                    </div>
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Fuel Type</h4>
                                <div class="form-group">
                                    <!-- <label>Max Guests</label> -->
                                    <select class="js-example-basic-single w-100" name="fuel_type"
                                        style="text-align:center;">
                                        <option value="">Choose</option>
                                        <option value="Petrol">Petrol</option>
                                        <option value="Diesel ">Diesel</option>
                                        <option value="Hybrid">Hybrid</option>
                                        <option value="Ev's">Ev's</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="form-group col-12">
                        <label for="exampleInputName1">Driver Name</label>
                        <input type="text" class="form-control" name="driver_name">
                    </div>
                    <div class="form-group col-12">
                        <label for="exampleInputName1">Rate Per Km's</label>
                        <input type="text" class="form-control" name="rate_per_km">
                    </div>
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Vehicle Status</h4>
                                <div class="form-group">
                                    <!-- <label>Max Guests</label> -->
                                    <!-- <input type="radio" name="status" id=""> -->

                                    <label><input type="radio" name="status" value="Available">
                                        Available</label><br>
                                    <label><input type="radio" name="status" value="Booked">
                                        Booked</label><br>
                                    <label><input type="radio" name="status" value="Under-Maintenance">
                                        Under-Maintenance</label><br>

                                </div>

                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" id="btn-update">Update</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#btn-update').on('click', function (e) {
                e.preventDefault();
                var formData = new FormData(form1);
                $.ajax({
                    url: './ajax/updatevehicle.php',
                    method: 'POST',
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (res) {
                        if (res == 1) {
                            Swal.fire({
                                title: "Successfully",
                                text: "Vehicle Can Be Updated!",
                                icon: "success"
                            });
                        } else if (res == 2) {
                            Swal.fire({
                                title: "",
                                text: "Vehicle Cannot Be Updated!",
                                icon: "waarning"
                            });
                        } else if (res == 3) {
                            Swal.fire({
                                title: "",
                                text: "Plz Fill All Fields!",
                                icon: "question"
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
include("./include/footer.php")
    ?>