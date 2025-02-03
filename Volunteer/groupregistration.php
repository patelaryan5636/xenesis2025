<?php
    require '../includes/scripts/connection.php';  
    session_start();
    if(isset($_SESSION['xenesis_logedin_user_id']) && (trim ($_SESSION['xenesis_logedin_user_id']) !== '')){
        $user_id = $_SESSION['xenesis_logedin_user_id'];
        $query = "SELECT * FROM user_master WHERE user_id = $user_id";
        $result = mysqli_query($conn, $query);
        $userdata = mysqli_fetch_assoc($result);
        $user_role = $userdata["user_role"];
        if($user_role != 2){
            header("Location: ../404.php");
        }
    }else{
        header("Location: ../sign-in.php");
    }

    function decryptId($encryptedId) {
        $key = "aryan5636"; // Use the same key as encryption
        $iv = "1234567891011121"; // Same IV as encryption
    
        return openssl_decrypt(base64_decode($encryptedId), "AES-128-CTR", $key, 0, $iv);
    }

    $encryptedId = $_GET['id'];
    $id = decryptId($encryptedId);

    $sql = "SELECT * FROM `group_master` WHERE group_id = $id";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    $username = $row['leader_id'];
    $sql2 = "SELECT * FROM `user_master` WHERE `user_id` = $username";
                                    $result2 = mysqli_query($conn,$sql2);
                                    $row2 = mysqli_fetch_assoc($result2);
                                    $user_name = $row2['user_name'];

                                    $eventname = $row['event_id'];
                                    $sql3 = "SELECT * FROM `event_master` WHERE `event_id` = $eventname";
                                    $result3 = mysqli_query($conn,$sql3);
                                    $row3 = mysqli_fetch_assoc($result3);
                                    $event_name = $row3['event_name'];
                                    $price = $row3['participation_price_team'];
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
    <title>Add Volunteer</title>

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
        </div>


        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                        <li class="submenu">
                            <a href="#"><i data-feather="user"></i><span>
                                    Participants</span><span class="menu-arrow"> </a>
                                    <ul>
                                <li><a href="soloevent.php">Solo Events</a></li>
                                <li><a href="groupevent.php" class="active">Group Events</a></li>

                            </ul>
                        </li>
                    </ul>
                    <ul>
                        <li class="submenu">
                            <a href="#"><img src="../assets/img/icons/enable.svg"
                                    alt=""><span>
                                    Approved</span><span class="menu-arrow"> </a>
                                    <ul>
                                <li><a href="approvedsoloevent.php">Solo Events</a></li>
                                <li><a href="approvedgroupevent.php">Group Events</a></li>

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
                        <!-- <h4>Add Serial Number</h4> -->
                    </div>
                </div>
                <form action="acceptgroupevent.php" method="post" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $id;?>" name="p_id">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>leader name</label>
                                        <input type="text" name="s_num" value="<?php echo "$user_name";?>" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Event Name</label>
                                        <input type="text" name="s_event_name" value="<?php echo "$event_name";?>" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Serial Number <b style="color:red">*</b></label>
                                        <input type="text" name="s_serial" require>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <input type="submit" name="submit" value="Submit" class="btn btn-submit me-2">
                                    <a href="groupevent.php" class="btn btn-cancel">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const password = document.getElementById("password");
                const confirmPassword = document.getElementById("confirmPassword");
                const passwordError = document.getElementById("passwordError");
                const submitButton = document.getElementById("submitButton");

                function validatePasswords() {
                    if (password.value === confirmPassword.value && password.value !== "") {
                        passwordError.style.display = "none";
                        submitButton.disabled = false;
                    } else {
                        passwordError.style.display = "block";
                        submitButton.disabled = true;
                    }
                }

                password.addEventListener("input", validatePasswords);
                confirmPassword.addEventListener("input", validatePasswords);
            });
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