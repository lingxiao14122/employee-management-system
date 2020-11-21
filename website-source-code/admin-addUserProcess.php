<?php

    require_once("dbcon.php");

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

    $insertQuery = "INSERT INTO `employeeinfo`(`name`, `gender`, `position`, `height`, 
            `phone`, `email`, `address`, `payroll`, `work_start_time`, `work_end_time`, 
            `rest_time`, `weekend_work`) VALUES ('$name','$gender','$position','$height','$phone',
            '$email','$address','$payroll','$workstarttime','$workendtime','$restduration','$weekendwork')";

    $result = $con->query($insertQuery);
    
    $findQuery = "SELECT * FROM `employeeinfo` WHERE `name` = '$name' AND `email` = '$email'";

    $result = $con->query($findQuery);

    $row = $result->fetch_assoc();

    $insertQuery2 = 'INSERT INTO `logininfo`(`employeeID`, `username`, `password`, `usertype`) 
            VALUES (\''.$row["ID"].'\',\''.$username.'\',\''.$password.'\',\''.$usertype.'\')';

    $result = $con->query($insertQuery2);

    echo "<script type='text/javascript'>alert('Add new user successful');window.location='admin-manageUser.php';</script>";
?>