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

        .page-div-main {
            border-width: 4px;
            height: 53em;
            width: 54em;
        }

        button:active {
            outline: black;
        }

        .leave-input {
            width: 52em;
            margin-bottom: 20px;
            margin-right: 11px;
            border-radius: 9px;
            /* border: black; */
            border-color: black;
            height: 2.75em;
        }

        .leave-input-fromto {
            width: 21em;
            display: inline-block;
        }

        .leave-label {
            font-size: 22px;
            margin: 17px 2px;
        }

        .leave-label-fromto {
            display: inline-block;
            margin-right: 35px;
        }

        .leave-form {
            margin: 0 0 2em 0;
            padding: 0px 13px 0px 0px;
        }

        .select-custom {
            font-size: 18px;
            color: black;
            font-weight: 500;
            background-color: white;
            border: solid 2px black;
            width: auto;
        }

        .fromto-container {
            width: 54em;
        }

        .from {

        }

        .to {

        }
    </style>
</head>

<body id="top">

    <?php include("navbar_top.php") ?>

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
                            <h2>Leave Request</h2>


                            <div class="page-div-main">
                                <form action=".php" method="POST" class="leave-form">

                                    <label class="leave-label">Employee ID:</label>
                                    <input class="leave-input" name="id" value="<?php echo $_SESSION["id"]?>" disabled>

                                    <label class="leave-label">Employee Name:</label>
                                    <input class="leave-input" name="name" value="<?php echo $_SESSION["name"]?>" disabled>

                                    <label class="leave-label">Employee Number:</label>
                                    <input class="leave-input" name="reason">

                                    <div class="fromto-container">
                                        <div class="from">
                                            <label class="leave-label leave-label-fromto">From:</label>
                                            <input class="leave-input leave-input-fromto" name="reason">
                                        </div>
                                        <div class="to"><label class="leave-label leave-label-fromto">To:</label>
                                            <input class="leave-input leave-input-fromto" name="reason">
                                        </div>
                                    </div>



                                    <label class="leave-label">Reason for Absence:</label>
                                    <div class="custom-select" style="width:200px;">
                                        <select class="select-custom">
                                            <option disabled>Select reason:</option>
                                            <option value="sick">Sick leave</option>
                                            <option value="bereavementFamily">Bereavement leave (Immediate Family)</option>
                                            <option value="bereavementOthers">Bereavement leave (Others)</option>
                                            <option value="personal">Personal Leave</option>
                                            <option value="judylegal">Judy duty or legal leave</option>
                                            <option value="emergency">Emergency Leave</option>
                                            <option value="temporary">Temporary Leave</option>
                                            <option value="withoutpay">Leave Without Pay</option>
                                            <option value="others">Others: </option>
                                        </select>
                                    </div>

                                    <label class="leave-label">Remarks:</label>
                                    <input class="leave-input" name="remark">

                                    <button type="submit" name="submit" class="special btn-admin-search" value="submit">Submit Leave Request</button>
                                </form>
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