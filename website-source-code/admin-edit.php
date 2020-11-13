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
            width: 400px;
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

                        <?php include("admin-navigation.php") ?>

                    </div>

                    <div class="8u skel-cell-important">
                        <section>
                            <h2>Fill Information</h2>

                            <form>
                                <label>Employee Info: </label>
                                <div class="form-control edit-form">
                                    <input type="text" name="name" placeholder="name" required />
                                </div>
                                <div class="form-control edit-form">
                                    <input type="email" name="gender" placeholder="gender" required />
                                </div>
                                <div class="form-control edit-form">
                                    <input type="text" name="position" placeholder="position" required />
                                </div>
                                <div class="form-control edit-form">
                                    <input type="text" name="height" placeholder="height" required />
                                </div>
                                <div class="form-control edit-form">
                                    <input type="text" name="phone" placeholder="phone number" required />
                                </div>
                                <div class="form-control edit-form">
                                    <input type="text" name="email" placeholder="email" required />
                                </div>
                                <div class="form-control edit-form">
                                    <input type="text" name="address" placeholder="address" required />
                                </div>
                                <div class="form-control edit-form">
                                    <input type="text" name="payroll" placeholder="payroll" required />
                                </div>
                                <div class="form-control edit-form">
                                    <input class="typetime" type="time" name="starttime" placeholder="start time" required />
                                </div>
                                <div class="form-control edit-form">
                                    <input class="typetime" type="time" name="endtime" placeholder="end time" required />
                                </div>
                                <div class="form-control edit-form">
                                    <input type="text" name="resttime" placeholder="rest time" required />
                                </div>

                                <div class="form-control edit-form">
                                    <input type="checkbox" id="weekend" name="weekend" value="Bike" />
                                    <label for="weekend"> Week End</label><br />
                                </div>

                                <label>Employee Account: </label>
                                <div class="form-control edit-form">
                                    <input class="typetime" type="text" name="username" placeholder="username" required />
                                </div>
                                <div class="form-control edit-form">
                                    <input type="text" name="password" placeholder="password" required />
                                </div>
                                <div class="form-control edit-form">
                                    <input type="text" name="user type" placeholder="user type" required />
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