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
            margin: 47px 76px;
        }

        .attendance-card:hover {
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
        }

        .attendance-present {
            background: white;
        }

        .attendance-absent {
            background-color: rgba(0, 0, 0, 0.12);
        }

        .attendance-text {
            width: fit-content;

            position: relative;
            margin: 10px auto;

        }

        .attendance-p {
            width: fit-content;
            text-align: center;
            margin-top: 5px;
            margin-bottom: 5px;
            font-size: 25px;
        }

        .attendance-count {
            width: fit-content;
            text-align: center;
            margin: 109px;
            font-size: 96px;
        }

        .tg {
            border-collapse: collapse;
            border-spacing: 0;
        }

        .tg td {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }

        .tg th {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: normal;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }

        .tg .tg-0pky {
            border-color: inherit;
            text-align: left;
            vertical-align: top
        }

        .attendance-table-div {
            
            
            border-width: 4px;
            height: 25em;
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

                        <?php include("admin-navigationBar.php") ?>

                    </div>

                    <div class="8u skel-cell-important">
                        <section>
                            <h2>Attendance</h2>
                            <!--The two white and grey attendance card main div-->
                            <div class="attendance">
                                <!--White card-->
                                <div class="attendance-card attendance-present">
                                    <div class="attendance-text">
                                        <p class=" attendance-count">0</p>
                                    </div>
                                    <div class="attendance-text">
                                        <p class="attendance-p ">Present</p>
                                    </div>
                                </div>
                                <!--Grey card-->
                                <div class="attendance-card attendance-absent">
                                    <div class="attendance-text">
                                        <p class=" attendance-count">0</p>
                                    </div>
                                    <div class="attendance-text">
                                        <p class="attendance-p ">Absent</p>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <h2>Check In/ Check Out</h2>

                            <div class="attendance-table-div">
                                <table class="tg">
                                    <thead>
                                        <tr>
                                            <th class="tg-0pky">No.</th>
                                            <th class="tg-0lax">Name</th>
                                            <th class="tg-0lax">Status/Action</th>
                                            <th class="tg-0lax">Timestamp</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="tg-0lax"></td>
                                            <td class="tg-0lax"></td>
                                            <td class="tg-0lax"></td>
                                            <td class="tg-0lax"></td>
                                        </tr>
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