<?php
    session_start();
    require_once("dbcon.php");

    $query = 'INSERT INTO `attendance`(`ID`, `employeeID`, `date`, `time`, `status`, `remark`) 
            VALUES (\'\', \''.$_SESSION["id"].'\',\''.date("Y-m-d").'\',\''.date("H:i:s").'\',
            \''.$_POST["submit"].'\',\'\')';
    $result = $con->query($query);

    if($_POST["submit"] == "Clock In"){
        echo "<script type='text/javascript'>alert('Check in successful. Hi ".$_SESSION["name"]."');window.location='user-dashboard.php';</script>";
    } else {
        echo "<script type='text/javascript'>alert('Check out successful. Good bye');window.location='user-dashboard.php';</script>";
    }
?>