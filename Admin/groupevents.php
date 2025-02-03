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

    function encryptId($id) {
        $key = "aryan5636"; // Use a secure key
        $iv = "1234567891011121"; // IV must be 16 bytes for AES-128-CTR
    
        return base64_encode(openssl_encrypt($id, "AES-128-CTR", $key, 0, $iv));
    }
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
    <title>Solo-Event List</title>

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
                <a href="index.php" class="logo"
                    style="font-size:35px; color: rgb(150, 0, 150); font-weight:bold; margin-left:23px;">
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
                                <li><a href="eventlist.php">Events</a></li>
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
                                <li><a href="groupevents.php" class="active">Group Events</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content">
                <!-- alert-box -->
                <!-- <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Je lakhvu hoy</strong> te lakho.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> -->
                <!-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Je lakhvu hoy</strong> te lakho.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> -->
                <!-- alert-box End -->
                <p>
                    <?php
                       
                        if(isset( $_SESSION['xenesis_error_message'])){
                         echo  $_SESSION['xenesis_error_message'];
                       }
                        if(isset( $_SESSION['xenesis_success_message'])){
                         echo  $_SESSION['xenesis_success_message'];
                       }
               
                       unset($_SESSION['xenesis_error_message']);
                       unset($_SESSION['xenesis_success_message']);
                       
               
                       ?>
                </p>
                <div class="page-header">
                    <div class="page-title">
                        <h4>Solo-Event List</h4>
                        <h6>Manage your Events</h6>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-top">
                            <div class="search-set">
                                <div class="search-input">
                                    <a class="btn btn-searchset"><img src="../assets/img/icons/search-white.svg"
                                            alt="img"></a>
                                </div>
                            </div>
                            <div class="wordset">
                                <ul>
                                    <li>
                                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                                src="../assets/img/icons/pdf.svg" alt="img"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table  datanew">
                                <thead>
                                    <tr>
                                    <th>Event Name</th>
                                        <th>Organizer Name</th>
                                        <th>Department</th>
                                        <th>Date</th>
                                        <th>Leader Mo. No.</th>
                                        <th>Confirmed</th>
                                        <th>Unconfirmed</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 


                                        $sql2 = "SELECT * FROM `event_master` WHERE team_member_count > 1";
                                        $result2 = mysqli_query($conn,$sql2);
                                        while($row = mysqli_fetch_assoc($result2)){
                                        $eventid = $row['event_id'];
                                        $department_id = $row['department_id'];

                                        $sql6 = "SELECT `department_name` FROM `department_master` WHERE `department_id` = $department_id";
                                        $result = mysqli_query($conn,$sql6);
                                        $row8 = mysqli_fetch_assoc($result);
                                        $department_name = $row8['department_name'];

                                        $sql7 = "SELECT `Leader_Name` FROM `organizer_master` WHERE `event_id` = $eventid";
                                        $result = mysqli_query($conn,$sql7);
                                        $row9 = mysqli_fetch_assoc($result);
                                        $leadername = $row9['Leader_Name'];
                                        $sql1 = "SELECT COUNT(*) AS confirm FROM `group_master` WHERE `event_id` = $eventid and `is_confirmed` = 1";
                                        $result1 = mysqli_query($conn,$sql1);
                                        $row4= mysqli_fetch_assoc($result1);
                                        $isconfirmed = $row4['confirm'];
                                        $sql5 = "SELECT COUNT(*) AS unconfirm FROM `group_master` WHERE `event_id` = $eventid and `is_confirmed` = 0";
                                        $result5 = mysqli_query($conn,$sql5);
                                        $row5= mysqli_fetch_assoc($result5);
                                        $isunconfirmed = $row5['unconfirm'];
                                        // $sql = "SELECT * FROM `group_master` WHERE `is_confirmed` = 1";
                                        // $result = mysqli_query($conn,$sql);
                                        // if($result->num_rows>1){
                                        // while($row = mysqli_fetch_assoc($result)){
                                        // $event_id = $row['event_id'];

                                        // $sql2 = "SELECT * FROM `event_master` WHERE`event_id` = $event_id";
                                        // $result2 = mysqli_query($conn,$sql2);
                                        // if($result2->num_rows>1){
                                        // $row2 = mysqli_fetch_assoc($result2);

                                        // $sql3 = "SELECT `Leader_Name`,`Leader_email`,`Leader_mobile` FROM `organizer_master` WHERE `event_id` = $event_id";
                                        // $result3 = mysqli_query($conn,$sql3);
                                        // if($result3->num_rows>1){
                                        // $row3 = mysqli_fetch_assoc($result3);
                                        // $event1_id = encryptId($row['event_id']);
                                      
                                    
                                    ?>
                                    <tr>
                                    <td><?php echo $row['event_name'];?></td>
                                        <td><?php echo $leadername;?></td>
                                        <td><?php echo $department_name; ?></td>
                                        <td><?php echo $row['date'];?></td>
                                        <td><?php echo $row['event_leader_no'];?></td>
                                        <td><?php echo $isconfirmed;?></td>
                                        <td><?php echo $isunconfirmed;?></td>
                                        <td>
                                            <a class='me-3' target="_BLANK" href='groupeventspdf.php'>
                                                <img src='../assets/img/icons/pdf.svg' alt='img'>
                                            </a>
                                        </td>
                                        </tr>
                                    <?php
                                        }
                                  
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

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