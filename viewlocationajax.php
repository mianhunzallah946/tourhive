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
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    VIEW Package
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><button type="submit" id="view-btn">View Package</button></li>
                        <li class="breadcrumb-item active" aria-current="page">VIEW</li>
                    </ol>
                </nav>
            </div>
            <div class="card-rows" id="package-data" style="align:center;">

            </div>


        </div>
    </div>

    <!-- partial -->
    </div>
    <!-- main-panel ends -->
    <script>
        $(document).ready(function () {
            $('#view-btn').on('click', function () {

                $.ajax({
                    url: './ajax/viewlocation.php/',
                    method: 'GET',
                    success: function (res) {
                        $('#package-data').html(res);
                    }
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
                            url: './ajax/deletelocation.php',
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
                                        'Location has been deleted.',
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
        });
    </script>



</body>

</html>

</div>

<?php
include("./include/footer.php");
?>