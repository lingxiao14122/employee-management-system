<?php
    require_once("dbcon.php");

    $employeeID = $_GET["employeeID"];

    $deleteQuery = "DELETE FROM `employeeinfo` WHERE `ID` = '$employeeID'";
    $deleteQuery2 = "DELETE FROM `logininfo` WHERE `employeeID` = '$employeeID'";

    $result = $con->query($deleteQuery2);
    $result = $con->query($deleteQuery);

    echo "<script type='text/javascript'>alert('Successful deleted employee info');window.location='admin-manageUser.php';</script>";
?>