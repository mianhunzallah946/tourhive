<?php
// include("../connection.php");
$aemail = $_SESSION['email'];
if (empty($aemail)) {
    header('location:./loginajax.php');
}
$fsql = "SELECT * FROM `login` WHERE `email`='$aemail'";
$frun = mysqli_query($connec, $fsql);
$ffet = mysqli_fetch_assoc($frun);
?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="profile-image">
                    <img src="<?php echo "./loginimg/" . $ffet['login_img'] ?>" alt="image" />
                </div>
                <div class="profile-name">
                    <p class="name">WELCOME     
                    </p>
                    <p class="designation">
                        Mr <?php echo $ffet['name'] ?>
                    </p>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./index.php">
                <i class="fa fa-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" href="pages/widgets.html">
                <i class="fa fa-puzzle-piece menu-icon"></i>
                <span class="menu-title">Widgets</span>
            </a>
        </li> -->
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tour" aria-expanded="false" aria-controls="page-layouts">
                <i class="fab fa-trello menu-icon"></i>
                <span class="menu-title">Tour</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tour">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="./ajaxtour.php">Create Tour</a>
                    </li>

                    <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="./ajaxview.php">Manage Tour</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item d-none d-lg-block">
            <a class="nav-link" data-toggle="collapse" href="#packages" aria-expanded="false"
                aria-controls="sidebar-layouts">
                <i class="fas fa-columns menu-icon"></i>
                <span class="menu-title">Packages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="packages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="./createlocation.php">New Package</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="./viewlocationajax.php">Packages</a>
                    </li>


                </ul>
            </div>
        </li>
        <li class="nav-item d-none d-lg-block">
            <a class="nav-link" data-toggle="collapse" href="#hotels" aria-expanded="false"
                aria-controls="sidebar-layouts">
                <i class="fas fa-columns menu-icon"></i>
                <span class="menu-title">Hotels</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="hotels">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="./createroomajax.php">New Room</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="./ajaxviewroom.php">View Room</a>
                    </li>


                </ul>
            </div>
        </li>
        <li class="nav-item d-none d-lg-block">
            <a class="nav-link" data-toggle="collapse" href="#gallery" aria-expanded="false"
                aria-controls="sidebar-layouts">
                <i class="fas fa-columns menu-icon"></i>
                <span class="menu-title">Gallery</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="gallery">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="./ajaxcreategallery.php">Upload New Discover</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="./ajaxviewgallery.php">Gallery</a>
                    </li>


                </ul>
            </div>
        </li>
        <li class="nav-item d-none d-lg-block">
            <a class="nav-link" data-toggle="collapse" href="#vehicle" aria-expanded="false"
                aria-controls="sidebar-layouts">
                <i class="fas fa-columns menu-icon"></i>
                <span class="menu-title">Vehicle</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="vehicle">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="./ajaxcreatecars.php">New Vehicle</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="./ajaxviewvehicle.php">View Vehicles</a>
                    </li>


                </ul>
            </div>
        </li>


</nav>
<!-- partial -->