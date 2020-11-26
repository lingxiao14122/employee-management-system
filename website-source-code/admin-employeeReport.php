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

        .btn-action {
            background-color: #76a9d7;
            border: none;
            color: white;
            padding: 7px 30px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 9px;
            margin: 0 4px;
        }

        .btn-action:hover {
            background-color: #94badb;
            color: white;
            transform: scale(0.98);
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
                            <h2>Employee report</h2>

                            


                            <table>
                                <colgroup>
                                    <col style="width: 11%">
                                    <col style="width: 11%">
                                    <col style="width: 11%">
                                    <col style="width: 11%">
                                    <col style="width: 11%">
                                    <col style="width: 11%">
                                    <col style="width: 11%">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Email</th>
                                        <th>Payroll</th>
                                        <th>Day Start</th>
                                        <th>Day End</th>
                                        <th>Calendar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once("dbcon.php");

                                    $query = "SELECT * FROM `employeeinfo`";
                                    $result = $con->query($query);

                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>
                                                <td>" . $row["name"] . "</td>
                                                <td>" . $row["position"] . "</td>
                                                <td>" . $row["email"] . "</td>
                                                <td>" . $row["payroll"] . "</td>
                                                <td>" . $row["work_start_time"] . "</td>
                                                <td>" . $row["work_end_time"] . "</td>
                                                <td>
                                                    <a href='admin-attendanceTable.php?id=".$row["ID"]."' class='btn-action'>Open</a>
                                                    
                                                </td>
                                            </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
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