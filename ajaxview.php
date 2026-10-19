<?php
include("./connection.php");
include("./include/header.php");
include("./include/sidebar.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Tour</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

</body>
<!-- <div class="container-scroller"> -->
<!-- partial:../../partials/_navbar.html -->


<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Data table
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><button type="submit" id="load-btn">View Tour</button></li>
                    <li class="breadcrumb-item active" aria-current="page">Data table</li>
                </ol>

        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data table</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>Tour ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>CNIC</th>
                                        <th>Persons</th>
                                        <th>Gender</th>
                                        <th>locations</th>
                                        <th>price</th>
                                        <th>Duration Type</th>
                                        <th>Departue </th>
                                        <th>Delete </th>
                                        <th>Update </th>
                                    </tr>
                                </thead>
                                <tbody id="std-data">

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
            $("#load-btn").on("click", function () {
                $.ajax({
                    url: './ajax/view.php/',
                    method: 'GET',
                    success: function (res) {
                        $('#std-data').html(res);
                    }
                });
            });
        });
        $(document).on("click", "#delete-btn", function () {
            var del = $(this).data("del");
            var del_id = this;
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
                        url: './ajax/deletetour.php',
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


</html>
<?php
include("./include/footer.php");
?>