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
        .attendance-right {}

        .card-info-right {
            margin: 49px 0px;
        }

        .card-right {
            font-size: 24px;
            margin: 10px 47px;
        }

        /* Table Table Table */

        /* .tg {
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
        }*/

        .attendance-table-div {


            border-width: 4px;
            height: 25em;
        }

        input[type="submit"]:focus {
            outline: none;

        }
    </style>
</head>

<body id="top">

    <?php include("navbar_top.php") ?>

    <!-- Main -->
    <section id="main" class="wrapper style1">
        <header class="major">
            <h2>Hi, admin</h2>
            <p>Welcome to dashboard, you may browse at navigation</p>
        </header>
        <div class="container">
            <div class="container-admin-dashboard">
                <div class="row-admin-dashboard">
                    <div class="navigation-admin-dashboard">

                        <section>
                            <h2>Navigation</h2>
                            <ul class="alt navigation-admin">
                                <li><a href="#">Dashboard</a></li>
                                <li><a href="#">Search employee detail</a></li>
                                <li><a href="#">Leave request</a></li>
                                <li><a href="#">Employee report</a></li>
                                <li><a href="#">Manage user</a></li>
                                <li><a href="#">//</a></li>
                                <li><a href="#">//</a></li>
                                <li><a href="#">//</a></li>
                            </ul>
                        </section>
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
                                            Avg Hours/Day
                                        </div>
                                        <div class="card-left-num float-left">
                                            0.0
                                        </div>
                                        <div class="card-left float-left">
                                            hrs
                                        </div>
                                    </div>
                                </div>
                                <!--Grey card-->
                                <div class="attendance-card attendance-right">
                                    <div class="card-info-right">
                                        <div class="card-right float-left">
                                            TUE 01,NOV 2020
                                        </div>
                                        <div class="card-right float-left">
                                            12:10AM
                                        </div>
                                        <div class="card-right float-left">
                                            <button type="submit" name="submit" class="btn-user-clockin" value="submit">Clock In</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <h2>Attendance Log - 30 days</h2>

                            <div class="attendance-table-div">
                                <table class="tg">
                                    <thead>
                                        <tr>
                                            <th class="tg-0pky">Date</th>
                                            <th class="tg-0lax">Duration</th>
                                            <th class="tg-0lax">Effective Hours</th>
                                            <th class="tg-0lax">Arrival</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="tg-0lax">03/11 TUE</td>
                                            <td class="tg-0lax">Logged in 8:30AM - 5:33PM</td>
                                            <td class="tg-0lax">9.05 hrs</td>
                                            <td class="tg-0lax">0.5hrs late</td>
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