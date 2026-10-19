<?php
include("./include/header.php");
include("./include/sidebar.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    View Vehicles
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><button type="submit" id="view-btn">View Vehicles</button></li>
                        <li class="breadcrumb-item"><input type="search" name="search-input" id="search-input"
                                placeholder="Search">
                        </li>
                    </ol>

            </div>
            <div class="card">
                <div class="card-body">
                    <!-- <h4 class="card-title">View Hotel</h4> -->
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table">
                                    <thead>
                                        <tr>
                                            <!-- <th>Vehicle ID</th>/ -->
                                            <th>Vehicle Type</th>
                                            <th>Vehicle Name</th>
                                            <th>Vehicle Number</th>
                                            <th>Seating Capacity</th>
                                            <th>Model Year</th>
                                            <th>Fuel Type</th>
                                            <th>Driver Name</th>
                                            <th>Rate Per Km's</th>
                                            <th>Status</th>

                                            <th>Delete </th>
                                            <th>Update </th>
                                        </tr>
                                    </thead>
                                    <tbody id="vehicle-data">

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->

        <script>
            $(document).ready(function () {
                $('#view-btn').on('click', function () {
                    $.ajax({
                        url: './ajax/viewvehicle.php',
                        method: 'GET',
                        success: function (res) {
                            // alert(res)

                            $('#vehicle-data').html(res);

                        }
                    });
                });
            });
            $(document).on('click', '#del-btn', function () {
                var del = $(this).data('del');
                var del_id = this;
                // alert(del_id);
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: './ajax/deletevehicle.php',
                            method: 'POST',
                            data: {
                                delete: del
                            },
                            success: function (res) {
                                // alert(res)
                                if (res == 1) {
                                    // alert(res);
                                    $(del_id).closest("tr").fadeOut("slow");
                                    Swal.fire(
                                        'Deleted!',
                                        'Data has been deleted.',
                                        'success'
                                    )
                                } else if (res == 2) {
                                    // alert(res);
                                    // 'Data Has Not BEen Deleted'
                                    $(del_id).closest("tr").fadeOut("slow");
                                    Swal.fire(
                                        'Deleted!',
                                        'Data has not been deleted.',
                                        'warning'
                                    )
                                }
                            }
                        });

                    }
                });
            });
            // $('#search-input').on('keyup', function () {
            //     var search_term = $(this).val();
            //     $.ajax({
            //         url: './ajax/viewvehicle.php',
            //         method: 'POST',
            //         data: { search: search_term }
            //         success: function (data) {
            //             $('#vehicle-data').html(data);
            //         }
            //     });
            // });
        </script>

</body>

</html>
<?php
include("./include/footer.php");
?>