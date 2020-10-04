<?php

    include_once("dbcon.php");

    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM logininfo where username = '$username' AND password = '$password'";

    $result = $con->query($query);

    if($result->num_rows > 0){
        echo "<script type='text/javascript'>alert('Login Successful');window.location='index.php';</script>";
    } else {
        echo "<script type='text/javascript'>alert('Username or Password is incorrect');window.location='login.php';</script>";
    }

?>