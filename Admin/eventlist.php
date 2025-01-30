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
    <title>Event List</title>

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
                                <li><a href="grouplist.php">Organizer Groups</a></li>
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
                <!-- <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Je lakhvu hoy</strong> te lakho.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> -->
                <!-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Je lakhvu hoy</strong> te lakho.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> -->  
                <!-- alert-box End -->
                 <p><?php
                       
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
                        <h4>Event List</h4>
                        <h6>Manage your Events</h6>
                    </div>
                    <div class="page-btn">
                        <a href="uploadevent.php" class="btn btn-added"><img src="../assets/img/icons/upload.svg" alt="img" class="me-1" style="height: 25px;">Upload Event Data</a>
                    </div>
                    <div class="page-btn">
                        <a href="addevent.php" class="btn btn-added"><img src="../assets/img/icons/plus.svg" alt="img" class="me-1">Add New Event</a>
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
                                        <a href="#"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
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
                                        <th>Entry Fee</th>
                                        <th>Participents</th>
                                        <th>Event Size</th>
                                        <th>Leader No.</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php
                                            require "../includes/scripts/connection.php";
                                            $sql = "SELECT * FROM `event_master`";
                                            $result = $conn->query($sql);
                                            if($result->num_rows > 0)
                                                while($row = $result->fetch_assoc()){
                                                    echo "<tr>
                                                            <td>".
                                                                $row['event_name']
                                                            ."</td>
                                                            <td>".
                                                                $row['participation_price']
                                                            ."</td>
                                                            <td>".
                                                                $row['team_member_count']
                                                            ."</td>
                                                            <td>".
                                                                $row['max_tickets']  
                                                            ."</td>
                                                            <td>
                                                                0987654321
                                                            </td>
                                                            <td>".
                                                                $row['date']
                                                            ."</td>
                                                            <td>
                                                                <a class='me-3'
                                                                    href='eventdetails.php'>
                                                                    <img src='../assets/img/icons/eye.svg' alt='img'>
                                                                </a>
                                                                <a class='me-3' href='editevent.php'>
                                                                    <img src='../assets/img/icons/edit.svg' alt='img'>
                                                                </a>
                                                                <a href='enableevent.php' id='enableBtn' style='display: none;' onclick='toggleButtons()'>
                                                                    <img src='../assets/img/icons/enable.svg' alt='img' style='height: 24px;'>
                                                                </a>
                                                                <a href='disableevent.php' id='disableBtn' onclick='toggleButtons()'>
                                                                    <img src='../assets/img/icons/disable.svg' alt='img' style='height: 24px;'>
                                                                </a>
                                                            </td>
                                                        </tr>";
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
    
    <script>
        function toggleButtons() {
            let enableBtn = document.getElementById("enableBtn");
            let disableBtn = document.getElementById("disableBtn");
    
            if (enableBtn.style.display === "none") {
                enableBtn.style.display = "inline";
                disableBtn.style.display = "none";
            } else {
                enableBtn.style.display = "none";
                disableBtn.style.display = "inline";
            }
        }
    </script>


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