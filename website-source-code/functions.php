<?php
    function checkStatus(int $id){
        
        require('dbcon.php');

        $query = 'SELECT * FROM `attendance` WHERE `employeeID` = "'.$id.'" AND `date` = "'.date("Y-m-d").'" ORDER BY `attendance`.`time` DESC';
        $result = $con->query($query);
        
        if(!$result || $result->num_rows == 0){
            $status = "Clock In";
        } else {
            $attendanceRow = $result->fetch_assoc();
            if($attendanceRow["status"] == "Clock In"){
                $status = "Clock Out";
            } else {
                $status = "Clock In";
            }
        }

        return $status;
    }

    function diffTime($startTime, $stopTime){

        $diff = (strtotime($stopTime) - strtotime($startTime));

        return ($diff/60);
    }

    function addTime($startTime, $duration){
        $total = strtotime($duration, strtotime($startTime));

        return $total;
    }

    function insertQuery($id, $name, $status, $remark, $diffTime){
        require("dbcon.php");

        $query = 'INSERT INTO `attendance`(`ID`, `employeeID`, `date`, `time`, `status`, `remark`) 
            VALUES (\'\', \''.$id.'\',\''.date("Y-m-d").'\',\''.date("H:i:s").'\',
            \''.$status.'\',\''.$remark.'\')';

        //$result = $con->query($query);

        if($status == "Clock In"){
            if($diffTime == NULL || $diffTime == 0){
                echo "<script type='text/javascript'>alert('Clock in successful. Hi ".$name."');window.location='user-dashboard.php';</script>";
            } else {
                if($diffTime > 10){
                    echo "<script type='text/javascript'>alert('Clock in successful. Hi ".$name.", you have late ".number_format($diffTime, 2)." minute/s, Please imform HR if any problem.');window.location='user-dashboard.php';</script>";
                } else {
                    echo "<script type='text/javascript'>alert('Clock in successful. Hi ".$name."');window.location='user-dashboard.php';</script>";
                }
            }
        } else {
            if($diffTime == NULL || $diffTime == 0){
                echo "<script type='text/javascript'>alert('Check out successful. Good bye');window.location='user-dashboard.php';</script>";
            } else {
                if($diffTime > 60){
                    echo "<script type='text/javascript'>alert('Check out successful. Good bye, Note: You have gained ".number_format($diffTime, 2)." minute/s of OT');window.location='user-dashboard.php';</script>";
                } else {
                    echo "<script type='text/javascript'>alert('Check out successful. Good bye');window.location='user-dashboard.php';</script>";
                }
            }
        }
    }
?>