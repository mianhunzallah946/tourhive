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
                    View Hotel
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><button type="submit" id="view-btn">View Hotel</button></li>
                        <li class="breadcrumb-item active" aria-current="page">Hotel</li>
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
                                            <!-- <th>Room ID</th> -->
                                            <th>Hotel Name</th>
                                            <th>Room Type</th>
                                            <th>Room Description</th>
                                            <th>Max Guests</th>
                                            <th>Amenities</th>
                                            <th>Status</th>
                                            <th>Room Image</th>

                                            <th>Delete </th>
                                            <th>Update </th>
                                        </tr>
                                    </thead>
                                    <tbody id="room-data">

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
                        url: './ajax/viewroom.php',
                        method: 'GET',
                        success: function (res) {
                            // alert(res)

                            $('#room-data').html(res);

                        }
                    });
                });
            });
            $(document).on('click', '.btn-del', function () {
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
                            url: './ajax/deleteroom.php',
                            method: 'POST',
                            data: {
                                delete: del
                            },
                            success: function (res) {
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

        </script>

</body>

</html>
<?php
include("./include/footer.php");
?>