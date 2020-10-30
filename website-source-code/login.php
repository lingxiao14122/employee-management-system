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
  </head>
  <body id="top">
    
  <?php include("navbar_top.php") ?>

    <!-- One -->
    <section id="one" class="wrapper style1">
      <header class="major">
        <h2>Logins page</h2>
        <p>Enter credentials to gain acess to your work profile</p>
      </header>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5 centerrr">

            <form class="book-form" method="post" action="login_process.php">
              <h3>Enter Username And Password</h3>
              <div class="row align-items-center">
                <div class="mb-3 mb-md-4 col-md-12">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Username"
                    name="username"
                  />
                </div>
                <div class="mb-3 mb-md-4 col-md-12">
                  <input
                    type="password"
                    class="form-control"
                    placeholder="Password"
                    name="password"
                  />
                </div>

                <div class="col-md-12">
                  <input
                    type="submit"
                    value="login now"
                    class="btn btn-primary btn-block py-3"
                  />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <?php include("footer.php") ?>

  </body>
</html>
