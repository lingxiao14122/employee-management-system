<?php
    if (isset($_COOKIE["PHPSESSID"])){
        session_start();
    }

    require_once("dbcon.php");
    $employeeID = $_GET["employeeID"];
    $query = "SELECT * FROM `employeeinfo` WHERE `ID` = '$employeeID'";
    $result = $con->query($query);
    $row = $result->fetch_assoc();

    $name = $row["name"];
    $gender = $row["gender"];
    $position = $row["position"];
    $height = $row["height"];
    $phone = $row["phone"];
    $email = $row["email"];
    $address = $row["address"];
    $payroll = $row["payroll"];
    $workstarttime = $row["work_start_time"];
    $workendtime = $row["work_end_time"];
    $restduration = $row["rest_time"];
    $weekendWork = $row["weekend_work"];

    $query = "SELECT * FROM `logininfo` WHERE `employeeID` = '$employeeID'";
    $result = $con->query($query);
    $row = $result->fetch_assoc();

    $username = $row["username"];
    $password1 = $row["password"];
    $usertype = $row["usertype"];
?>

<!DOCTYPE html>
<!--
	Ion by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>

<head>
    <title>Left Sidebar - Ion by TEMPLATED</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
    <script src="js/jquery.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
    <noscript>
        <link rel="stylesheet" href="css/skel.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-xlarge.css" />
    </noscript>

    <!--CSS CSS CSS CSS CSS CSS CSS CSS CSS CSS CSS -->
    <style>
        .navigation-admin a:link {
            text-decoration: none;
            background-color: rgb(255, 255, 255);
            padding: 8px;
        }

        .navigation-admin a:hover,
        a:active {
            background-color: rgb(219, 219, 219);
            border-radius: 5px;
            color: black;
        }

        .edit-form {
            margin: 20px 0;
            width: 1000px;
        }

        .typetime {
            appearance: none;
            background: rgba(144, 144, 144, 0.075);
            border-radius: 6px;
            border: none;
            border: solid 1px rgba(144, 144, 144, 0.25);
            color: inherit;
            display: block;
            outline: 0;
            padding: 0 1em;
            text-decoration: none;
            width: 100%;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 10px;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
    </style>
</head>

<body id="top">

    <?php include("navbar_top.php") ?>

    <!-- Main -->
    <section id="main" class="wrapper style1">
        <header class="major">
            <h2>Hi, <?php echo $_SESSION["name"]; ?> admin</h2>
            <p>Welcome to dashboard, you may browse at navigation</p>
        </header>
        <div class="container">
            <div class="container-admin-dashboard">
                <div class="row-admin-dashboard">
                    <div class="navigation-admin-dashboard">

                        <?php include("admin-navigation.php") ?>

                    </div>

                    <div class="8u skel-cell-important">
                        <section>
                            <h2>Fill Information</h2>

                            <form action="admin-editUserProcess.php?employeeID=<?php echo $employeeID?>" method="POST">
                                <label>Employee Info: </label>
                                <div class="form-control edit-form grid">
                                    <label for="">Name</label>
                                    <input type="text" name="name" placeholder="Name" value="<?php echo $name?>"required />
                                </div>
                                <div class="form-control edit-form grid">
                                    <label for="">Gender</label>
                                    <select name="gender">
                                        <?php
                                            if($gender == "male"){
                                                echo "<option value=\"male\" selected>Male</option>
                                                    <option value=\"female\">Female</option>";
                                            } else {
                                                echo "<option value=\"male\">Male</option>
                                                    <option value=\"female\" selected>Female</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-control edit-form grid">
                                    <label for="">Position</label>
                                    <input type="text" name="position" placeholder="Position"  value="<?php echo $position?>" required />
                                </div>
                                <div class="form-control edit-form grid">
                                    <label for="">Height(cm)</label>
                                    <input type="text" name="height" placeholder="Height" value="<?php echo $height?>" required />
                                </div>
                                <div class="form-control edit-form grid">
                                    <label for="">Phone Number</label>
                                    <input type="text" name="phone" placeholder="Phone Number" value="<?php echo $phone?>" required />
                                </div>
                                <div class="form-control edit-form grid">
                                    <label for="">E-mail</label>
                                    <input type="text" name="email" placeholder="E-mail" value="<?php echo $email?>" required />
                                </div>
                                <div class="form-control edit-form grid">
                                    <label for="">Address</label>
                                    <input type="text" name="address" placeholder="Address" value="<?php echo $address?>" required />
                                </div>
                                <div class="form-control edit-form grid">
                                    <label for="">Payroll</label>
                                    <input type="text" name="payroll" placeholder="Payroll" value="<?php echo $payroll?>" required />
                                </div>
                                <div class="form-control edit-form grid">
                                    <label for="">Work Start Time</label>
                                    <input class="typetime" type="time" name="starttime" placeholder="Start Time" value="<?php echo $workstarttime?>" required />
                                </div>
                                <div class="form-control edit-form grid">
                                    <label for="">Work End Time</label>
                                    <input class="typetime" type="time" name="endtime" placeholder="End Time" value="<?php echo $workendtime?>" required />
                                </div>
                                <div class="form-control edit-form grid">
                                    <label for="">Rest Duration</label>
                                    <select name="restduration">
                                        <?php
                                            if($restduration == "+1 Hour"){
                                                echo "<option value=\"+1 Hour\" selected>1 Hour</option>
                                                    <option value=\"+1 Hour 30 Minutes\">1 Hour 30 Minutes</option>
                                                    <option value=\"+2 Hours\">2 Hours</option>
                                                    <option value=\"+2 Hours 30 Minutes\">2 Hour 30 Minutes</option>
                                                    <option value=\"+3 Hours\">3 Hours</option>";
                                            } else if($restduration == "+1 Hour 30 Minutes"){
                                                echo "<option value=\"+1 Hour\">1 Hour</option>
                                                <option value=\"+1 Hour 30 Minutes\" selected>1 Hour 30 Minutes</option>
                                                <option value=\"+2 Hours\">2 Hours</option>
                                                <option value=\"+2 Hours 30 Minutes\">2 Hour 30 Minutes</option>
                                                <option value=\"+3 Hours\">3 Hours</option>";
                                            } else if($restduration == "+2 Hours"){
                                                echo "<option value=\"+1 Hour\">1 Hour</option>
                                                <option value=\"+1 Hour 30 Minutes\">1 Hour 30 Minutes</option>
                                                <option value=\"+2 Hours\" selected>2 Hours</option>
                                                <option value=\"+2 Hours 30 Minutes\">2 Hour 30 Minutes</option>
                                                <option value=\"+3 Hours\">3 Hours</option>";
                                            } else if($restduration == "+2 Hours 30 Minutes"){
                                                echo "<option value=\"+1 Hour\">1 Hour</option>
                                                <option value=\"+1 Hour 30 Minutes\">1 Hour 30 Minutes</option>
                                                <option value=\"+2 Hours\">2 Hours</option>
                                                <option value=\"+2 Hours 30 Minutes\" selected>2 Hour 30 Minutes</option>
                                                <option value=\"+3 Hours\">3 Hours</option>";
                                            } else if($restduration == "+3 Hours"){
                                                echo "<option value=\"+1 Hour\">1 Hour</option>
                                                <option value=\"+1 Hour 30 Minutes\">1 Hour 30 Minutes</option>
                                                <option value=\"+2 Hours\">2 Hours</option>
                                                <option value=\"+2 Hours 30 Minutes\">2 Hour 30 Minutes</option>
                                                <option value=\"+3 Hours\" selected>3 Hours</option>";
                                            } else {
                                                echo "<option value=\"+1 Hour\">1 Hour</option>
                                                <option value=\"+1 Hour 30 Minutes\">1 Hour 30 Minutes</option>
                                                <option value=\"+2 Hours\">2 Hours</option>
                                                <option value=\"+2 Hours 30 Minutes\">2 Hour 30 Minutes</option>
                                                <option value=\"+3 Hours\"3 Hours</option>";
                                            }
                                        ?>
                                        <option value="+1 Hour">1 Hour</option>
                                        <option value="+1 Hour 30 Minutes">1 Hour 30 Minutes</option>
                                        <option value="+2 Hours">2 Hours</option>
                                        <option value="+2 Hours 30 Minutes">2 Hour 30 Minutes</option>
                                        <option value="+3 Hours">3 Hours</option>
                                    </select>
                                </div>

                                <div class="form-control edit-form grid">
                                    <?php
                                        if($weekendWork == true){
                                            echo "<input type=\"checkbox\" id=\"weekend\" name=\"weekend\" value=\"weekend\" checked />";
                                        } else {
                                            echo "<input type=\"checkbox\" id=\"weekend\" name=\"weekend\" value=\"weekend\" />";
                                        }
                                    ?>
                                    <label for="weekend"> Week End</label>
                                </div>

                                <label>Employee Account: </label>
                                <div class="form-control edit-form grid">
                                    <label for="">Username</label>
                                    <input class="typetime" type="text" name="username" placeholder="Username" value="<?php echo $username?>" required />
                                </div>
                                <div class="form-control edit-form grid">
                                    <label for="">Password</label>
                                    <input type="password" name="password" placeholder="Password" value="<?php echo $password1?>" required />
                                </div>
                                <div class="form-control edit-form grid">
                                    <label for="">User Type</label>
                                    <select name="usertype">
                                        <?php
                                            if($usertype == "admin"){
                                                echo "<option value=\"user\">User</option>
                                                    <option value=\"admin\" selected>Admin</option>";
                                            } else {
                                                echo "<option value=\"user\" selected>User</option>
                                                <option value=\"admin\">Admin</option>";
                                            }
                                        ?>
                                        
                                    </select>
                                </div>
                                <input type="submit" value="Confirm" class="btn btn-primary" />
                            </form>
                        </section>
                    </div>
                </div>

                <hr class="major" />
            </div>
        </div>
    </section>
    <?php include("footer.php") ?>
</body>

</html>