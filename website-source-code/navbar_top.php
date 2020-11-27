<!--this is the navigation bar on top of every webpage, please include in all pages-->

<!-- Header -->
<header id="header" class="skel-layers-fixed">
  <h1><a href="index.php">EMPLOYEE MANAGEMENT SOFTWARE</a></h1>
  <nav id="nav">
    <ul>
      <li><a href="index.php">Home</a></li>

      <?php

      if (isset($_COOKIE["PHPSESSID"])) {

        if($_SESSION["usertype"] == "admin"){
          echo "<li><a href='admin-dashboard.php'>Dashboard</a></li>";
        } else {
          echo "<li><a href='user-dashboard.php'>Dashboard</a></li>";
        }
      }

      if (!isset($_COOKIE["PHPSESSID"])) {
        echo "<li><a href=\"login.php\" class=\"button special\">Log In</a></li>";
      } else {
        echo "<li><a href=\"logout_process.php\" class=\"button special\">Log Out</a></li>";
      }

      ?>
    </ul>
  </nav>
</header>