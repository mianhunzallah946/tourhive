<?php
include("./connection.php");
?>
<!DOCTYPE html>
<html lang="en">



<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="./travel4.png" />

</head>

<body>
    <div class="container-scroller" id="formlog">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row w-100">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo">
                                <img src="./travel.jpeg" alt="logo">
                            </div>
                            <h4>Hello! let's get started</h4>
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            <form class="pt-3" id="login1">
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="exampleInputUsername"
                                        name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" name="password"
                                        id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                        id="login-btun">SIGN IN</button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input">
                                            Keep me signed in
                                        </label>
                                    </div>
                                    <a href="#" class="auth-link text-black">Forgot password?</a>
                                </div>
                                <div class="mb-2">
                                    <button type="button" class="btn btn-block btn-facebook auth-form-btn"
                                        id="btn_login">
                                        <i class="fab fa-facebook-f mr-2"></i>Connect using facebook
                                    </button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Don't have an account? <a href="./signup.php" class="text-primary">Create</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->

    <script>
        $(document).ready(function () {
            $('#login-btun').on('click', function (e) {
                e.preventDefault();
                var formData = new FormData(login1);

                $.ajax({
                    url: './ajax/login.php',
                    method: 'POST',
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (res) {
                        // alert(res)
                        if (res == 1) {
                            window.location.href = "./index.php";
                        } else if (res == 2) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: "top",
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.onmouseenter = Swal.stopTimer;
                                    toast.onmouseleave = Swal.resumeTimer;
                                }
                            });
                            Toast.fire({
                                icon: "warning",
                                title: "Your email or password is incorrect"
                            });
                        } else if (res == 3) {
                            Swal.fire({
                                icon: "warning",
                                title: "Oops...",
                                // text: "Something went wrong!",
                                text: 'Plz Fill All Fields?'
                            });
                        }
                    }
                });
            });
        });
    </script>
</body>



</html>