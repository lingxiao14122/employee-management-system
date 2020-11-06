<?php
if (isset($_COOKIE["PHPSESSID"])) {
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

        .leaverequest-table-div {


            border-width: 4px;
            height: 41em;
        }

        .tg-0laa {
            width: 300px;

        }
    </style>
</head>

<body id="top">

    <?php include("navbar_top.php") ?>

    <!-- Main -->
    <section id="main" class="wrapper style1">
        <header class="major">
            <h2>Hi, <?php echo $_SESSION["name"]; ?> Admin</h2>
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

                            <h2>Leave Request</h2>

                            <div class="leaverequest-table-div">
                                <table class="tg">
                                    <thead>
                                        <tr>
                                            <th class="tg-0pky">No.</th>
                                            <th class="tg-0lax">Employee ID</th>
                                            <th class="tg-0lax">Employee Name</th>
                                            <th class="tg-0lax">Date Start</th>
                                            <th class="tg-0lax">Date End</th>
                                            <th class="tg-0lax">Reason</th>
                                            <th class="tg-0lax">Status</th>
                                            <th class="tg-0laa">Remarks</th>
                                            <th class="tg-0lax">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                        require_once("dbcon.php");

                                        $query = "SELECT `leaveapplication`.`ID`, `leaveapplication`.`employeeID`, `employeeinfo`.`name`, `leaveapplication`.`reason`, `leaveapplication`.`dateRequest_start`, `leaveapplication`.`dateRequest_end`, `leaveapplication`.`approval`, `leaveapplication`.`remark` FROM `leaveapplication`
                                                  INNER JOIN `employeeinfo` ON `leaveapplication`.`employeeID` = `employeeinfo`.`ID`";
                                        $result = $con->query($query);

                                        while($row = $result->fetch_assoc()){
                                            echo "<tr>
                                            <td class=\"tg-0lax\">".$row["ID"]."</td>
                                            <td class=\"tg-0lax\">".$row["employeeID"]."</td>
                                            <td class=\"tg-0lax\">".$row["name"]."</td>
                                            <td class=\"tg-0lax\">".$row["dateRequest_start"]."</td>
                                            <td class=\"tg-0lax\">".$row["dateRequest_end"]."</td>
                                            <td class=\"tg-0lax\">".$row["reason"]."</td>";

                                            if($row["approval"] == NULL || $row["approval"] == ""){
                                                echo "<td class=\"tg-0lax\">Pending</td>";
                                            } else {
                                                echo "<td class=\"tg-0lax\">".$row["approval"]."</td>";
                                            }

                                            echo "<td class=\"tg-0lax\">".$row["remark"]."</td>
                                            <td class=\"tg-0lax\">
                                                <ul class=\"alt navigation-admin\">

                                                    <li><a href=\"admin-leaveRequestProcess.php?id=".$row["ID"]."&approval=Accept\">Accept</a></li>

                                                </ul>
                                            </td>
                                            <td class=\"tg-0lax\">
                                                <ul class=\"alt navigation-admin\">

                                                    <li><a href=\"admin-leaveRequestProcess.php?id=".$row["ID"]."&approval=Reject\">Reject</a></li>

                                                </ul>
                                            </td>
                                            </tr>";
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