<?php
    require_once("dbcon.php");

    $id = $_POST["id"];
    $name = $_POST["name"];
    $dateStart = $_POST["dateStart"];
    $dateEnd = $_POST["dateEnd"];
    $reason = $_POST["reason"];
    $others = $_POST["others"];
    $remark = $_POST["remark"];

    if($reason == "Others"){
        $query = "INSERT INTO `leaveapplication`(`ID`, `employeeID`, 
                `reason`, `dateRequest_start`, `dateRequest_end`, 
                `approval`, `remark`) VALUES ('','$id',
                '$reason - $others','$dateStart','$dateEnd','Pending','$remark')";
    } else {
        $query = "INSERT INTO `leaveapplication`(`ID`, `employeeID`, 
                `reason`, `dateRequest_start`, `dateRequest_end`, 
                `approval`, `remark`) VALUES ('','$id',
                '$reason','$dateStart','$dateEnd','Pending','$remark')";
    }
    

    $result = $con->query($query);

    if($result){
        echo "<script type='text/javascript'>alert('Leave request submit succesful');window.location='user-dashboard.php';</script>";
    } else {
        echo "<script type='text/javascript'>alert('Leave request submit unsuccesful, please try again later.');window.location='user-dashboard.php';</script>";
    }
?>