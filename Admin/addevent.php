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
    <title>Add product</title>

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
                                    src="../assets/img/icons/log-out.svg" class="me-2" alt="img">Logout</a>
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
                                <li><a href="eventlist.php" class="active">Events</a></li>
                                <li><a href="grouplist.php">Groups</a></li>
                                <li><a href="studentlist.php">Students</a></li>
                                <li><a href="volunteerlist.php">Volunteer</a></li>
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
                        <h4>Add Event</h4>
                        <h6>Create new Event</h6>
                    </div>
                </div>
                <form action="./add_event_manually.php" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Event Name <b style="color:red">*</b></label>
                                        <input type="text" name="e_name" require>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Tagline <b style="color:red">*</b></label>
                                        <input type="text" name="e_tagline" require>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Department Name <b style="color:red">*</b></label>
                                        <input type="text" name="e_dept" require>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Team Name <b style="color:red">*</b></label>
                                        <input type="text" name="e_team" require>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Participation Price <b style="color:red">*</b></label>
                                        <input type="number" name="e_participation_price" class="form-control" require>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Team Participation Price <b style="color:red">*</b></label>
                                        <input type="number" name="e_team_par_price" class="form-control" require>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Total members</label>
                                        <select class="select" name="e_total_member">
                                            <option value="1">
                                                1
                                            </option>
                                            <option value="2">
                                                2
                                            </option>
                                            <option value="3">
                                                3
                                            </option>
                                            <option value="4">
                                                4
                                            </option>
                                            <option value="5">
                                                5
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>1st Winner Price<b style="color:red">*</b></label>
                                        <input type="number" name="e_win1" class="form-control" require>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>2nd Winner Price<b style="color:red">*</b></label>
                                        <input type="number" name="e_win2" class="form-control" require>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>3rd Winner Price<b style="color:red">*</b></label>
                                        <input type="number" name="e_win3" class="form-control" require>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Event Location<b style="color:red">*</b></label>
                                        <input type="text" name="e_location" require>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Event Date<b style="color:red">*</b></label>
                                        <input type="date" name="e_date" class="form-control" require>
                                    </div>
                                </div>
                                <div class="col-lg4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Event Discription<b style="color:red">*</b></label>
                                        <textarea name="e_desc" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <div class="col-lg4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Event Rules<b style="color:red">*</b></label>
                                        <textarea name="e_rules" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Round 1 Title<b style="color:red">*</b></label>
                                        <input type="text" name="e_round1_title" class="form-control" require>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Round 1 Description<b style="color:red">*</b></label>
                                        <textarea name="e_round1_desc" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Round 2 Title</label>
                                        <input type="text" name="e_round2_title" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-8 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Round 2 Description<b style="color:red">*</b></label>
                                        <textarea name="e_round2_desc" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Round 3 Title</label>
                                        <input type="text" name="e_round3_title" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-8 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Round 3 Description</label>
                                        <textarea name="e_round3_desc" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Round 4 Title</label>
                                        <input type="text" name="e_round4_title" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-8 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Round 4 Description</label>
                                        <textarea name="e_round4_desc" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Round 5 Title</label>
                                        <input type="text" name="e_round5_title" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-8 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Round 5 Description</label>
                                        <textarea name="e_round5_desc" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Max Tickets</label>
                                        <input type="number" name="e_max_ticket" class="form-control" value=0 require>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Event Image</label>
                                        <div>
                                            <input type="file" accept="image/jpeg, image/jpg" class="form-control"
                                                name="productImage" id="fileUpload" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <input type="submit" value="Submit" name="submit" class="btn btn-submit me-2">
                                    <a href="eventlist.php" class="btn btn-cancel">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <script src="../assets/js/jquery-3.6.0.min.js"></script>

        <script src="../assets/js/feather.min.js"></script>
    
        <script src="../assets/js/jquery.slimscroll.min.js"></script>
    
        <script src="../assets/js/jquery.dataTables.min.js"></script>
        <script src="../assets/js/dataTables.bootstrap4.min.js"></script>
    
        <script src="../assets/js/bootstrap.bundle.min.js"></script>
    
        <script src="../assets/plugins/select2/js/select2.min.js"></script>
    
        <script src="../assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
        <script src="../assets/plugins/sweetalert/sweetalerts.min.js"></script>
    
        <script src="../assets/js/script.js"></script>
</body>

</html>