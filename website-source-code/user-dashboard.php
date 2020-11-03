<?php
    if (isset($_COOKIE["PHPSESSID"])){
        session_start();
    }
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

        .attendance {
            border: black;
            border-style: solid;
            border-radius: 40px;
            border-width: 4px;
            height: 25em;
        }

        .attendance-card {

            border-radius: 30px;
            display: inline-block;
            height: 300px;
            margin: 1rem;
            position: relative;
            width: 300px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            margin: 46px 0px;
            margin-left: 42px;
        }

        .attendance-card:hover {
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
        }

        /* LEFT SIDE CUSTOM CSS LEFT SIDE CUSTOM CSS */
        .float-left {
            float: left;
        }

        .attendance-left {
            width: 485px;
        }

        .card-info {
            margin: 122px 41px;
        }

        .card-left {
            font-size: 24px;
            margin: 7px 23px;
        }

        .card-left-num {
            font-size: 56px;
        }

        /* RIGHT SIDE CUSTOM CSS RIGHT SIDE CUSTOM CSS */
    
        .card-info-right {
            margin: 49px 0px;
        }

        .card-right {
            font-size: 24px;
            margin: 10px 47px;
        }

        .attendance-table-div {
            border-width: 4px;
            height: 25em;
        }

        button:active {
            outline: black;
        }

    </style>

    <script type="text/javascript">
    function checkTime(i){
            if(i < 10){
                i = "0" + i;
            }
            return i;
        }

        function updateTime(){
            var now = new Date();
            var year = now.getFullYear();
            var month = now.getMonth();
            var monthString = "";
            var date = now.getDate();
            var hour = now.getHours();
            var min = now.getMinutes();
            var sec = now.getSeconds();
            
            min = checkTime(min);
            sec = checkTime(sec);

            switch(month){
                case 0: monthString = "January"; break;
                case 1: monthString = "February"; break;
                case 2: monthString = "March"; break;
                case 3: monthString = "April"; break;
                case 4: monthString = "May"; break;
                case 5: monthString = "June"; break;
                case 6: monthString = "July"; break;
                case 7: monthString = "August"; break;
                case 8: monthString = "September"; break;
                case 9: monthString = "October"; break;
                case 10: monthString = "November"; break;
                case 11: monthString = "December"; break;
            }

            document.getElementById('time').innerHTML = date + " " + monthString + " " + year + "<br>" + hour + ":" + min + ":" + sec;
            var t = setTimeout(updateTime, 500);
        }
    </script>
</head>

<body id="top" onload="updateTime()">

    <?php 
        include("navbar_top.php");
        include("functions.php");
    ?>

    <!-- Main -->
    <section id="main" class="wrapper style1">
        <header class="major">
            <h2>Hi, <?php echo $_SESSION["name"];?> user</h2>
            <p>Welcome to dashboard, you may browse at navigation</p>
        </header>
        <div class="container">
            <div class="container-admin-dashboard">
                <div class="row-admin-dashboard">
                    <div class="navigation-admin-dashboard">

                        <?php include("user-navigation.php") ?>
                    </div>

                    <div class="8u skel-cell-important">
                        <section>
                            <h2>Attendance</h2>
                            <!--The two white and grey attendance card main div-->
                            <div class="attendance">
                                <!--White card-->
                                <div class="attendance-card attendance-left">
                                    <div class="card-info">
                                        <div class="card-left float-left">
                                            Days Absent
                                        </div>
                                        <div class="card-left-num float-left">
                                            1
                                        </div>
                                        <div class="card-left float-left">
                                            Days
                                        </div>
                                    </div>
                                </div>
                                <!--Grey card-->
                                <div class="attendance-card attendance-right">
                                    <div class="card-info-right">
                                        <div class="card-right float-left" id="time">
                                            
                                        </div>
                                        <!--<div class="card-right float-left" id="date">
                                            TUE 01,NOV 2020
                                        </div>
                                        <div class="card-right float-left" id="time">
                                            12:10AM
                                        </div>-->
                                        <div class="card-right float-left">
                                            <form action="clockInOut_process.php" method="POST">
                                                <button type="submit" name="submit" class="special btn-admin-search" value="<?php echo checkStatus($_SESSION["id"]);?>"><?php echo checkStatus($_SESSION["id"]);?></button>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <h2>Attendance Log</h2>

                            <div class="attendance-table-div">
                                <table class="tg">
                                    <thead>
                                        <tr>
                                            <th class="tg-0pky">Date</th>
                                            <th class="tg-0lax">Time</th>
                                            <th class="tg-0lax">Status</th>
                                            <th class="tg-0lax">Remark</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            require('dbcon.php');

                                            $query = 'SELECT * FROM `attendance` WHERE `employeeID` = "'.$_SESSION["id"].'" ORDER BY `attendance`.`time` DESC';
                                            $result = $con->query($query);

                                            if($result->num_rows == 0){
                                                echo "<th class=\"tg-0pky\" colspan=\"4\" align=\"center\">No Record</th>";
                                            } else {
                                                $size = 0;
                                                if($result->num_rows <= 15){
                                                    $size = $result->num_rows;
                                                } else {
                                                    $size = 15;
                                                }
                                                for($i = 0; $i < $size; $i++){
                                                    $row = $result->fetch_assoc();
                                                    echo "<tr>
                                                            <th class=\"tg-0pky\">".$row["date"]."</th>
                                                            <th class=\"tg-0pky\">".$row["time"]."</th>
                                                            <th class=\"tg-0pky\">".$row["status"]."</th>
                                                            <th class=\"tg-0pky\">".$row["remark"]."</th>
                                                    ";
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>


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