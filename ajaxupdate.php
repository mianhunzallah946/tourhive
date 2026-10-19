<?php
include("./include/header.php");
include("./include/sidebar.php");
include("./connection.php");
$dsql = "SELECT * FROM `tour`";
$drun = mysqli_query($connec, $dsql);
$dfet = mysqli_fetch_assoc($drun);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>


    <!-- <div class="container"> -->
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Tour</h2>
                <h5 class="card-description">
                    Update Tour
                </h5>
                <form id="form1">
                    <div class="form-group">
                        <!-- <label for="exampleInputName1">ID</label> -->
                        <input type="hidden" class="form-control" name="tour_id" placeholder="Name"
                            value="<?php echo $dfet['tour_id'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $dfet['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $dfet['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Contact No:</label>
                        <input type="tel" class="form-control" name="contact" value="<?php echo $dfet['contact'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">CNIC</label>
                        <input type="number" class="form-control" name="cnic" value="<?php echo $dfet['cnic'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Persons</label>
                        <select class="form-control" id="exampleSelectGender" name="persons"
                            value="<?php echo $dfet['persons'] ?>">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Gender</label>
                        <select class="form-control" id="exampleSelectGender" name="gender"
                            value="<?php echo $dfet['gender'] ?>">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Locations</h4>
                                <div class="form-group">
                                    <label>Locations</label>
                                    <select name="locations" id="" class="js-example-basic-single w-100">
                                        <option value="">Locations</option>
                                        <?php
                                        $lsql = "SELECT * FROM `locations`";
                                        $lrun = mysqli_query($connec, $lsql);
                                        while ($lfet = mysqli_fetch_assoc($lrun)) {
                                            ?>


                                            <option value="<?php echo $lfet['name'] ?>"><?php echo $lfet['name'] ?>
                                            </option>


                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-white">Rs</span>
                            </div>
                            <input type="number" class="form-control" name="price" value="<?php echo $dfet['price'] ?>">
                            <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Duration</h4>
                                <div class="form-group">
                                    <label>Duration</label>
                                    <select class="js-example-basic-single w-100" name="duration_type"
                                        value="<?php echo $dfet['duration_type'] ?>">
                                        <option value="----">----SELECT-----</option>
                                        <option value="2 Days">2 Days</option>
                                        <option value="3 Days">3 Days</option>
                                        <option value="5 Days">5 Days</option>
                                        <option value="7 Days">7 Days</option>
                                        <option value="8 Days">8 Days</option>
                                        <option value="10 Days">10 Days</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Departure Times</h4>
                                <div class="form-group">
                                    <label>Depature Times</label>
                                    <select class="js-example-basic-single w-100" name="departure_date"
                                        value="<?php echo $dfet['departure_date'] ?>">

                                        <option value="----">----SELECT-----</option>
                                        <option value="Thursday-10:00 pm">Thursday-10:00 pm</option>
                                        <option value="Tuesday-10:00 pm">Tuesday-10:00 pm</option>
                                        <option value="Friday-10:00 pm">Friday-10:00 pm</option>

                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary mr-2" id="btn-submit">Update</button>
                    <button class="btn btn-light"><a href="./ajaxview.php"> Cancel </a></button>
                </form>
            </div>
        </div>
    </div>
    <!-- </div> -->

    <script>
        $(document).ready(function () {
            $('#btn-submit').on("click", function (e) {
                e.preventDefault();
                var formData = new FormData(form1);

                $.ajax({

                    url: './ajax/update.php',
                    method: 'POST',
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (res) {
                        if (res == 1) {
                            Swal.fire({
                                title: "Successfully",
                                text: "Data Updated!",
                                icon: "success"
                            });

                        } else if (res == 2) {
                            alert("Data cannot be Updated");

                        } else if (res == 3) {
                            Swal.fire({
                                title: "Plz Fill All Fields?",
                                // text: "Plz Fill All Fields?",
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
include("./include/footer.php");
?>