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
                    VIEW Gallery
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><button type="submit" id="view-btn">View Gallery</button></li>
                        <li class="breadcrumb-item"><button type="submit"><a href="./ajaxcreategallery.php">New Upload
                                </a></button></li>
                        <!-- <li class="breadcrumb-item active" aria-current="page">VIEW</li> -->
                    </ol>
                </nav>
            </div>
            <div class="card-rows" id="gallery-data" style="align:center;">

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
                    url: './ajax/viewgallery.php/',
                    method: 'GET',
                    success: function (res) {
                        $('#gallery-data').html(res);
                    }
                });
            });

        });
        $(document)
    </script>



</body>

</html>

</div>

<?php
include("./include/footer.php");
?>