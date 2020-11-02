<?php

    require_once("dbcon.php");

    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM logininfo where username = '$username' AND password = '$password'";

    $result = $con->query($query);

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        if($row["usertype"] == "admin"){
            session_start();
            echo session_id();
            $query = 'SELECT * FROM `employeeinfo` WHERE `ID` = "'.$row["employeeID"].'"';
            $result = $con->query($query);
            $rows = $result->fetch_assoc();
            $_SESSION["name"] = $rows["name"];
            echo "<script type='text/javascript'>alert('Login Successful, ".$_SESSION["name"]."');window.location='admin-dashboard.php';</script>";
        } else {
            echo "<script type='text/javascript'>alert('Login Successful');window.location='userindex.php';</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('Username or Password is incorrect');window.location='login.php';</script>";
    }

?>