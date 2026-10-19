<?php
include("./connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SignUp</title>

  <link rel="stylesheet" href="./css/style.css">
  <link rel="shortcut icon" href="./travel4.png" />
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="./travel.jpeg" alt="logo">
              </div>
              <h4>New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
              <form class="pt-3" id="signup1">
                <div class="form-group">
                  <label for="">Name</label>
                  <input type="text" class="form-control form-control-lg" name="name" id="exampleInputEmail1">
                </div>

                <div class="form-group">
                  <label for="">Username</label>
                  <input type="text" class="form-control form-control-lg" name="username">
                </div>
                <div class="form-group">
                  <label for="">CNIC</label>
                  <input type="number" class="form-control form-control-lg" name="cnic" id="exampleInputEmail1">
                </div>
                <div class="form-group">
                  <label for="">Email</label>
                  <input type="email" class="form-control form-control-lg" name="email" id="exampleInputUsername1"
                    placeholder="Email" required>
                </div>


                <!-- <div class="form-group">
                    <select class="form-control form-control-lg" id="exampleFormControlSelect2">
                      <option>Country</option>
                      <option>United States of America</option>
                      <option>United Kingdom</option>
                      <option>India</option>
                      <option>Germany</option>
                      <option>Argentina</option>
                    </select>
                  </div> -->
                <div class="form-group">
                  <label for="">Password</label>
                  <input type="password" class="form-control form-control-lg" name="password" id="exampleInputPassword1"
                    placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="">Image</label>
                  <input type="file" class="form-control form-control-lg" name="login_img" placeholder="Image" required>
                </div>

                <div class="mt-3">
                  <button type="submit" class="btn btn-primary mr-2" id="btn-signup">SignUp</button>

                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="./loginajax.php" class="text-primary">Login</a>
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

  <script>

    $(document).ready(function () {
      $('#btn-signup').on('click', function (e) {
        e.preventDefault();
        var formData = new FormData(signup1);

        $.ajax({
          url: './ajax/signup.php',
          method: 'POST',
          processData: false,
          contentType: false,
          data: formData,

          success: function (res) {
            // alert(res);
            if (res == 1) {

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
                icon: "success",
                title: "Your Account Has Created successfully"
              });
              window.location.href = "./loginajax.php";
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
                title: "Now the time,Account Cannot BE Created"
              });
            } else if (res == 3) {

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
                title: "Something Went Wrong"
              });

            } else if (res == 4) {
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
                title: "Record Already Exist"
              });
            }
          }

        });
      });
    });
  </script>

</body>


</html>