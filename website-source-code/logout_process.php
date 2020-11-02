<?php
    session_start();
    setcookie('PHPSESSID', '', time() - 86400, '/');
    session_unset();
    session_destroy();
    print "<script type='text/javascript'>alert('Successful Logout!');window.location='index.php';</script>";
?>