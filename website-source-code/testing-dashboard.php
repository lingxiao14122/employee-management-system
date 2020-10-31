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

                            <p>
                                Vis accumsan feugiat adipiscing nisl amet adipiscing accumsan
                                blandit accumsan sapien blandit ac amet faucibus aliquet
                                placerat commodo. Interdum ante aliquet commodo accumsan vis
                                phasellus adipiscing. Ornare a in lacinia. Vestibulum accumsan
                                ac metus massa tempor. Accumsan in lacinia ornare massa amet. Ac
                                interdum ac non praesent. Cubilia lacinia interdum massa
                                faucibus blandit nullam. Accumsan phasellus nunc integer.
                                Accumsan euismod nunc adipiscing lacinia erat ut sit. Arcu amet.
                                Id massa aliquet arcu accumsan lorem amet accumsan commodo odio
                                cubilia ac eu interdum placerat placerat arcu commodo lobortis
                                adipiscing semper ornare pellentesque.
                            </p>
                            <p>
                                Amet nibh adipiscing adipiscing. Commodo ante vis placerat
                                interdum massa massa primis. Tempus condimentum tempus non ac
                                varius cubilia adipiscing placerat lorem turpis at. Aliquet
                                lorem porttitor interdum. Amet lacus. Aliquam lobortis faucibus
                                blandit ac phasellus. In amet magna non interdum volutpat
                                porttitor metus a ante ac neque. Nisi turpis. Commodo col.
                                Interdum adipiscing mollis ut aliquam id ante adipiscing commodo
                                integer arcu amet blandit adipiscing arcu ante.
                            </p>
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