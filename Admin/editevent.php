<?php
    require '../includes/scripts/connection.php';  
    session_start();
    if(isset($_SESSION['xenesis_logedin_user_id']) && (trim ($_SESSION['xenesis_logedin_user_id']) !== '')){
        $user_id = $_SESSION['xenesis_logedin_user_id'];
        $query = "SELECT * FROM user_master WHERE user_id = $user_id";
        $result = mysqli_query($conn, $query);
        $userdata = mysqli_fetch_assoc($result);
        $user_role = $userdata["user_role"];
        if($user_role != 1){
            header("Location: ../404.php");
        }
    }else{
        header("Location: ../sign-in.php");
    }
?>
<?php
    $id = $_GET['id'];
    
    $event_id = $id;
    $query = "SELECT * FROM `event_master` WHERE event_id = '$id'";
    $result = mysqli_query($conn, $query);

    $eventdata = mysqli_fetch_assoc($result);
    
    $event_name = $eventdata['event_name'];
    $tagline = $eventdata['tagline'];
    $dept_id = $eventdata['department_id'];
    $team_name = $eventdata['team_name'];
    $team_leader_mobile = $event_data['event_leader_no'];
    // $dept_fetch_query = "SELECT * FROM `department_master` WHERE department_id = '$dept_id'";
    // $dept_result = mysqli_query($conn, $dept_fetch_query);
    
    // $deptdata = mysqli_fetch_assoc($dept_result);
    // $dept_name = $deptdata['department_name'];
    
    $participant_price = $eventdata['participation_price'];
    $team_price = $eventdata['participation_price_team'];
    $total_members = $eventdata['team_member_count'];
    $win_price1 = $eventdata['winner_price1'];
    $win_price2 = $eventdata['winner_price2'];
    $win_price3 = $eventdata['winner_price3'];
    $location = $eventdata['location'];
    $date = $eventdata['date'];
    $event_desc = $eventdata['event_description'];
    $rules = $eventdata['rules'];
    $round1_title = $eventdata['round1_title'];
    $round1_desc = $eventdata['round1_description'];
    $round2_title = $eventdata['round2_title'];
    $round2_desc = $eventdata['round2_description'];
    $round3_title = $eventdata['round3_title'];
    $round3_desc = $eventdata['round3_description'];
    $round4_title = $eventdata['round4_title'];
    $round4_desc = $eventdata['round4_description'];
    $round5_title = $eventdata['round5_title'];
    $round5_desc = $eventdata['round5_description'];
    $image_path = $eventdata['image_path'];
    $max_tickets = $eventdata['max_tickets'];
    
    $array = explode("/", $image_path);

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
    <title>Edit Event</title>

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
                            <a class="dropdown-item logout pb-0" href="#"><img src="../assets/img/icons/log-out.svg"
                                    class="me-2" alt="img">Logout</a>
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
                                <li><a href="grouplist.php">Organizer Groups</a></li>
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
                        <h4>Edit Event</h4>
                        <h6>Update your Event</h6>
                    </div>
                </div>

                <form action='update_event.php' method='post' enctype='multipart/form-data'>
                    <input type="hidden" name="id" value="PYS">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                            <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <?php echo"<input type='hidden' name='e_id' value='$event_id'>"; ?>
                                        <label>Event Name <b style="color:red">*</b></label>
                                        <?php echo"<input type='text' name='e_name' value='$event_name' require>"; ?>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Tagline <b style="color:red">*</b></label>
                                        <?php echo"<input type='text' name='e_tagline' value='$tagline' require>"; ?>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Department Name</label>
                                        <select class="select" name="e_dept_id">
                                            <option value=1 <?php if($dept_id == 1){ echo "selected";} ?>>
                                                Computer Engineering
                                            </option>
                                            <option value=2 <?php if($dept_id == 2){ echo "selected";} ?>>
                                                Information Technology
                                            </option>
                                            <option value=3 <?php if($dept_id == 3){ echo "selected";} ?>>
                                                Mechnical Engineering
                                            </option>
                                            <option value=4 <?php if($dept_id == 4){ echo "selected";} ?>>
                                                Electrical Engineering
                                            </option>
                                            <option value=5 <?php if($dept_id == 5){ echo "selected";} ?>>
                                                EC Engineering
                                            </option>
                                            <option value=6 <?php if($dept_id == 6){ echo "selected";} ?>>
                                                Civil Engineering
                                            </option>
                                            <option value=7 <?php if($dept_id == 7){ echo "selected";} ?>>
                                                Automobile Engineering
                                            </option>
                                            <option value=8 <?php if($dept_id == 8){ echo "selected";} ?>>
                                                MBA Department
                                            </option>
                                            <option value=9 <?php if($dept_id == 9){ echo "selected";} ?>>
                                                MCA Department
                                            </option>
                                            <option value=10 <?php if($dept_id == 10){ echo "selected";} ?>>
                                                Science and Humanities
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Team Leader Mobile No.<b style="color:red">*</b></label>
                                        <?php echo"<input type='number' name='team_leader_number' value='$team_leader_mobile' class='form-control' require>"; ?>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Team Name <b style="color:red">*</b></label>
                                        <?php echo "<input type='text' name='e_team' value='$team_name' require>"; ?>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Participation Price <b style="color:red">*</b></label>
                                        <?php echo "<input type='number' name='e_participation_price' class='form-control' value='$participant_price' require>"; ?>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Team Participation Price <b style="color:red">*</b></label>
                                        <?php echo "<input type='number' name='e_team_par_price' class='form-control' value=$team_price require>"; ?>
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
                                        <label>1st Winner Price</label>
                                        <?php echo"<input type='number' name='e_win1' class='form-control' value='$win_price1'>"; ?>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>2nd Winner Price</label>
                                        <?php echo"<input type='number' name='e_win2' class='form-control' value='$win_price2'>"; ?>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>3rd Winner Price</label>
                                        <?php echo"<input type='number' name='e_win3' class='form-control' value='$win_price3'>"; ?>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Event Location</label>
                                        <?php echo "<input type='text' name='e_location' value='$location'>"; ?>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Event Date</label>
                                        <?php echo "<input type='date' name='e_date' class='form-control' value='$date'>"; ?>
                                    </div>
                                </div>
                                <div class="col-lg4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Event Discription</label>
                                        <textarea name="e_desc" class="form-control"><?php echo "$event_desc";?></textarea>
                                    </div>
                                </div>
                                <div class="col-lg4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Event Rules</label>
                                        <textarea name="e_rules" class="form-control"><?php echo "$rules"; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Round 1 Title</label>
                                        <?php echo "<input type='text' name='e_round1_title' class='form-control' value='$round1_title'>"; ?>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Round 1 Description</label>
                                        <textarea name="e_round1_desc" class="form-control"><?php echo "$round1_desc"; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Round 2 Title</label>
                                        <?php echo "<input type='text' name='e_round2_title' class='form-control' value='$round2_title'>"; ?>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Round 2 Description</label>
                                        <textarea name="e_round2_desc" class="form-control"><?php echo "$round2_desc"; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Round 3 Title</label>
                                        <?php echo "<input type='text' name='e_round3_title' class='form-control' value='$round3_title'>"; ?>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Round 3 Description</label>
                                        <textarea name="e_round3_desc" class="form-control"><?php echo "$round3_desc"; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Round 4 Title</label>
                                        <?php echo "<input type='text' name='e_round4_title' class='form-control' value='$round4_title'>"; ?>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Round 4 Description</label>
                                        <textarea name="e_round4_desc" class="form-control"><?php echo "$round4_desc"; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Round 5 Title</label>
                                        <?php echo "<input type='text' name='e_round5_title' class='form-control' value='$round5_title'>"; ?>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Round 5 Description</label>
                                        <textarea name="e_round5_desc" class="form-control"><?php echo "$round5_desc"; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Max Tickets</label>
                                        <?php echo "<input type='number' name='e_max_ticket' class='form-control' value='$max_tickets'>"?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Event Image</label>
                                        <div>
                                            <input type="file" accept="image/jpeg, image/jpg, image/png" class="form-control" name="productImage" id="fileUpload">
                                            <p style="color: red;">Current file: <strong><?php echo "$array[1]"; ?></strong></p>
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