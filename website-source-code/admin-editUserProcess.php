<?php

    require_once("dbcon.php");

    $employeeID = $_GET["employeeID"];

    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $position = $_POST["position"];
    $height = $_POST["height"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $payroll = $_POST["payroll"];
    $workstarttime = $_POST["starttime"];
    $workendtime = $_POST["endtime"];
    $restduration = $_POST["restduration"];

    if(isset($_POST["weekend"])){
        $weekendwork = true;
    } else {
        $weekendwork = false;
    }
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    $usertype = $_POST["usertype"];

    if(!is_numeric($phone) || !is_numeric($height) || !is_numeric($payroll)){
        echo "<script type='text/javascript'>alert('Error: Phone, height or payroll cannot be alphabet or other character.');window.location='admin-addUser.php';</script>";
    }

    $updateQuery = "UPDATE `employeeinfo` SET `name`='$name',`gender`='$gender',
            `position`='$position',`height`='$height',`phone`='$phone',`email`='$email',`address`='$address',
            `payroll`='$payroll',`work_start_time`='$workstarttime',`work_end_time`='$workendtime',`rest_time`='$restduration',
            `weekend_work`='$weekendwork' WHERE `ID`='$employeeID'";

    $updateQuery2 = "UPDATE `logininfo` SET `username`='$username',`password`='$password',`usertype`='$usertype' WHERE `employeeID` = '$employeeID'";

    $result = $con->query($updateQuery);
    $result = $con->query($updateQuery2);

    echo "<script type='text/javascript'>alert('Update user info successful');window.location='admin-manageUser.php';</script>";
?>