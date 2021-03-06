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
  <title>CapstoneProject</title>
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <style>
    .icon:before {
      font-family: "Font Awesome 5 Free";
      font-style: normal;
      font-weight: 900;
    }
  </style>
</head>

<body id="top">

  <?php include("navbar_top.php") ?>

  <!-- Banner -->
  <section id="banner">
    <div class="inner">
      <h2>Employee Management</h2>
      <p>
        Sign In Now to Clock In and Receive Updates.

      </p>
      <ul class="actions">

        <?php
        if (isset($_COOKIE["PHPSESSID"])) {
          echo "<li><a href='logout_process.php' class='button big special'>Log Out</a></li>";
        } else {
          echo "<li><a href='login.php' class='button big special'>Log In</a></li>";
        }


        ?>

      </ul>
    </div>
  </section>

  <!-- One -->
  <section id="one" class="wrapper style1">
    <header class="major">
      <h2>employee management software</h2>
      <p>Checkout New Tools for Your Needs</p>
    </header>
    <div class="container">
      <div class="row">
        <div class="4u">
          <section class="special box">
            <!-- <i class="icon fa-user-clock major"></i> -->
            <i class="icon fa-user-clock fas major"></i>
            <h3>Clock In/Clock Out</h3>
            <p>
              Use brand new clock in/clock out tool to process clock in and clock out.
            </p>
          </section>
        </div>
        <div class="4u">
          <section class="special box">
            <i class="icon fa-sign-out-alt fas major"></i>
            <h3>Apply Leave</h3>
            <p>
              Use the new tools to apply for leave. Faster approval with digital forms.
            </p>
          </section>
        </div>
        <div class="4u">
          <section class="special box">
            <i class="icon fa-cog major"></i>
            <h3>Setting</h3>
            <p>
              Advanced tools prepared for you in revolution 4.0.
            </p>
          </section>
        </div>
      </div>
    </div>
  </section>

  <!-- Two -->
  <section id="two" class="wrapper style2">
    <header class="major">
      <h2>Features</h2>
      <p>Find out the features that we made.</p>
    </header>
    <div class="container">
      <div class="row">
        <div class="6u">
          <section class="special">
            <a href="#" class="image fit"><img src="images/pic05.jpg" alt="" /></a>
            <h3>Clock in and out in real time</h3>
            <p>
              Our software development team created this application to facilitate 
              the automation and embracing technology.In regards to the new project, 
              changes are made to the code base. This is a good thing, 
               this project is awesome.
            </p>
            <ul class="actions">
              <li><a href="#" class="button alt">Learn More</a></li>
            </ul>
          </section>
        </div>
        <div class="6u">
          <section class="special">
            <a href="#" class="image fit"><img src="images/pic06.jpg" alt="" /></a>
            <h3>Employee Attendance Report</h3>
            <p>
              We've designed a calendar view UI to help visualize attendance records
              The cells are also color coded based on status, mouse over the dates and
               it will provide more context about their stats.
            </p>
            <ul class="actions">
              <li><a href="#" class="button alt">Learn More</a></li>
            </ul>
          </section>
        </div>
      </div>
    </div>
  </section>



  <?php include("footer.php") ?>

</body>

</html>