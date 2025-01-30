<?php
    $id = $_GET['id'];
    echo "$id";
    require "../includes/scripts/connection.php";
    $sql = "SELECT * FROM `organizer_master`";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $event_id = $row['event_id'];

    $sql_fetch_event = "SELECT * FROM `event_master` WHERE `event_id` = $event_id";
    $result_fetch_event = mysqli_query($conn, $sql_fetch_event);
    $event_data = mysqli_fetch_assoc($result_fetch_event);
                                    
    // $result = mysqli_query($conn, $sql);
    $event_name = $event_data['event_name'];

    $image_path = $event_data['image_path'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Group Details</title>

    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/Xenesis2025_logo.png">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="../assets/plugins/icons/ionic/ionicons.css">

    <link rel="stylesheet" href="../assets/plugins/icons/feather/feather.css">

    <link rel="stylesheet" href="../assets/css/animate.css">

    <link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="../assets/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <div class="main-wrapper">

        <div class="header bord">

        <div class="header-left active">
                <a href="index.php" class="logo" style="font-size:35px; color: rgb(150, 0, 150); font-weight:bold; margin-left:23px;">
                    <span style="color: rgb(0, 0, 102)">X</span>enesis
                </a>
                <a href="index.php" class="logo-small" style="font-size:32px; font-weight:bold;">
                    <img src="../assets/img/Xenesis2025_logo.png" alt="Xenesis_logo">
                </a>
                <a id="toggle_btn" href="javascript:void(0);">
                </a>
            </div>

            <a id="mobile_btn" class="mobile_btn" href="#sidebar">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>

            <ul class="nav user-menu">


                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                        <span class="user-img"><img src="../assets/img/Xenesis2025_logo.png" alt="img">
                            <span class="status online"></span></span>
                    </a>
                    <div class="dropdown-menu menu-drop-user">
                        <div class="profilename">
                            <div class="profileset">
                                <span class="user-img"><img src="../assets/img/Xenesis2025_logo.png" alt="img">
                                    <span class="status online"></span></span>
                                <div class="profilesets">
                                    <h6>
                                        Priyanshu
                                    </h6>
                                    <h5>
                                        Frontend
                                    </h5>
                                </div>
                            </div>
                            <hr class="m-0">
                            <a class="dropdown-item" href="profile.php"> <i class="me-2" data-feather="user"></i> My
                                Profile</a>
                            <a class="dropdown-item logout pb-0" href="#"><img
                                    src="../../assets/img/icons/log-out.svg" class="me-2" alt="img">Logout</a>
                        </div>
                    </div>
                </li>
            </ul>


            <div class="dropdown mobile-user-menu">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.php">My Profile</a>
                    <!-- <a class="dropdown-item" href="generalsettings.php">Settings</a> -->
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </div>
        </div>


        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li>
                            <a href="index.php"><img src="../assets/img/icons/dashboard.svg" alt="img"><span>
                                    Dashboard</span> </a>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="../assets/img/icons/product.svg" alt="img"><span>
                                    Events</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="eventlist.php">Events</a></li>
                                <li><a href="grouplist.php" class="active">Organizer Groups</a></li>
                                <li><a href="studentlist.php">Students</a></li>
                                <li><a href="volunteerlist.php">Volunteer</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="../assets/img/icons/product.svg" alt="img"><span>
                                Events Participers</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="soloevents.php">Solo Events</a></li>
                                <li><a href="groupevents.php">Group Events</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="page-wrapper">
            <div class="content">
                <!-- alert-box -->
                <!-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Je lakhvu hoy</strong> te lakho.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> -->
                <!-- alert-box End -->
                <div class="page-header">
                    <div class="page-title">
                        <h4>Group Details</h4>
                        <h6>Full details of a Group</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="productdetails">
                                    <ul class="product-bar">
                                        <!-- <li>
                                            <h4>Event ID</h4>
                                            <h6>
                                                1
                                            </h6>
                                        </li> -->
                                        <li>
                                            <h4>Event Name</h4>
                                            <h6>
                                                <?php echo $event_name; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Leader Name</h4>
                                            <h6>
                                                <?php echo $row['Leader_Name']; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Leader Email</h4>
                                            <h6>
                                                <?php echo $row['Leader_email']; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Leader Number</h4>
                                            <h6>
                                                <?php echo $row['Leader_mobile']; ?>
                                            </h6>
                                        </li>
                                        <li>
                                            <h4>Member's name</h4>
                                            <h6 style="padding-left: 27px;">
                                                <ol type="1" style="list-style: decimal;">
                                                    <li><?php echo $row['Member1_name']." -> ".$row['Member1_mobile']." -> ".$row['Member1_email']; ?></li>
                                                    <li><?php echo $row['Member2_name']." -> ".$row['Member2_mobile']." -> ".$row['Member2_email']; ?></li>
                                                    <li><?php echo $row['Member3_name']." -> ".$row['Member3_mobile']." -> ".$row['Member3_email']; ?></li>
                                                    <li><?php echo $row['Member4_name']." -> ".$row['Member4_mobile']." -> ".$row['Member4_email']; ?></li>
                                                    <li><?php echo $row['Member5_name']." -> ".$row['Member5_mobile']." -> ".$row['Member5_email']; ?></li>
                                                </ol>
                                            </h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="slider-product-details">
                                    <div class="owl-carousel owl-theme ">
                                        <div class="slider-product">
                                            <?php echo "<img src=".$image_path." alt='img'>";?>
                                            <h4>Event Image</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="../assets/js/jquery-3.6.0.min.js"></script>

    <script src="../assets/js/feather.min.js"></script>

    <script src="../assets/js/jquery.slimscroll.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/plugins/owlcarousel/owl.carousel.min.js"></script>

    <script src="../assets/plugins/select2/js/select2.min.js"></script>

    <script src="../assets/js/script.js"></script>
</body>

</html>