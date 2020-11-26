<?php
    require_once("dbcon.php");

    if (isset($_COOKIE["PHPSESSID"])){
        session_start();
    } else {
        echo "<script type='text/javascript'>alert('Error: Haven't Login. Please Login to process.');window.location='login.php';</script>";
    }

    $id = $_SESSION["id"];
    
    $currentDate = Date("Y-m-d");
    $currentTime = Date("H:i:s");

    $query = "SELECT * FROM `attendance_update_log` ORDER BY `update_date` DESC";
    $result = $con->query($query);

    if(!$result || $result->num_rows == 0){
        $insertQuery = "INSERT INTO `attendance_update_log`(`update_date`, `update_time`, `admin_id`) VALUES ('$currentDate','$currentTime','$id')";
        $result = $con->query($insertQuery);
        if($result){
            echo "<script type='text/javascript'>alert('Successful Setup Database for Attendance');window.location='admin-dashboard.php';</script>";
        } else {
            echo "<script type='text/javascript'>alert('Database Error');window.location='admin-dashboard.php';</script>";
        }
    } else {
        $lastUpdateRow = $result->fetch_assoc();
        $lastUpdateDate = $lastUpdateRow["update_date"];

        if(strtotime($currentDate) == strtotime($lastUpdateDate)){
            echo "<script type='text/javascript'>alert('Already updated database.');window.location='admin-dashboard.php';</script>";
        }

        $employeeQuery = "SELECT * FROM `employeeinfo`";
        $employeeResult = $con->query($employeeQuery);

        if($employeeResult){

            while($employeeRow = $employeeResult->fetch_assoc()){
                $date = $lastUpdateDate;
                while(strtotime($date) <= strtotime($currentDate)){
                    /*echo $date;
                    echo "<br>";*/
                    $attendanceQuery = 'SELECT * FROM `attendance` WHERE `employeeID` = \''.$employeeRow["ID"].'\' AND `date` = \''.$date.'\'';
                    $attendanceResult = $con->query($attendanceQuery);

                    if(!$attendanceResult || $attendanceResult->num_rows == 0){

                        /*echo Date("N", strtotime($date));
                        echo "<br>";*/

                        if(Date("N", strtotime($date)) == 6 || Date("N", strtotime($date)) == 7){
                            //insert weekend work absence
                            

                            if($employeeRow["weekend_work"] == true){
                                $leaveQuery = 'SELECT * FROM `leaveapplication` WHERE `employeeID` = \''.$employeeRow["ID"].'\' AND \''.$date.'\' BETWEEN `dateRequest_start` AND `dateRequest_end` AND `approval` = \'Accept\'';
                                $leaveResult = $con->query($leaveQuery);
    
                                if(!$leaveResult || $leaveResult->num_rows == 0){
    
                                    $insertAttendanceQuery = 'INSERT INTO `attendance`(`employeeID`, `date`, `time`, `status`, `remark`) 
                                                            VALUES (\''.$employeeRow["ID"].'\',\''.$date.'\',\'00:00:00\',\'Absence\',\'\')';
                                    $result = $con->query($insertAttendanceQuery);
                                    /*echo $insertAttendanceQuery;
                                    echo "<br>";*/
    
                                } else {
                                    $leaveRow = $leaveResult->fetch_assoc();
                                    //absence with leave applied
                                    $insertAttendanceQuery = 'INSERT INTO `attendance`(`employeeID`, `date`, `time`, `status`, `remark`) 
                                                            VALUES (\''.$employeeRow["ID"].'\',\''.$date.'\',\'00:00:00\',\'Absence (With Leave Applied)\',\'Leave ID: '.$leaveRow["ID"].'\')';
                                    $result = $con->query($insertAttendanceQuery);
                                    /*echo $insertAttendanceQuery;
                                    echo "<br>";*/
    
                                }
                            } else {
                                //ignore
                            }
                            
                        } else {

                            $leaveQuery = 'SELECT * FROM `leaveapplication` WHERE `employeeID` = \''.$employeeRow["ID"].'\' AND \''.$date.'\' BETWEEN `dateRequest_start` AND `dateRequest_end` AND `approval` = \'Accept\'';
                            $leaveResult = $con->query($leaveQuery);

                            if(!$leaveResult || $leaveResult->num_rows == 0){

                                $insertAttendanceQuery = 'INSERT INTO `attendance`(`employeeID`, `date`, `time`, `status`, `remark`) 
                                                        VALUES (\''.$employeeRow["ID"].'\',\''.$date.'\',\'00:00:00\',\'Absence\',\'\')';
                                $result = $con->query($insertAttendanceQuery);
                                /*echo $insertAttendanceQuery;
                                echo "<br>";*/

                            } else {
                                $leaveRow = $leaveResult->fetch_assoc();
                                //absence with leave applied
                                $insertAttendanceQuery = 'INSERT INTO `attendance`(`employeeID`, `date`, `time`, `status`, `remark`) 
                                                        VALUES (\''.$employeeRow["ID"].'\',\''.$date.'\',\'00:00:00\',\'Absence (With Leave Applied)\',\'Leave ID: '.$leaveRow["ID"].'\')';
                                $result = $con->query($insertAttendanceQuery);
                                /*echo $insertAttendanceQuery;
                                echo "<br>";*/

                            }

                        }

                    } else {
                        //ignore
                    }
                    $date = Date("Y-m-d", strtotime("+1 day", strtotime($date)));
                }
            }

            $insertQuery = "INSERT INTO `attendance_update_log`(`update_date`, `update_time`, `admin_id`) VALUES ('$currentDate','$currentTime','$id')";
                /*echo "<br>";
                echo $insertQuery;*/
                $result = $con->query($insertQuery);
                if($result){
                    echo "<script type='text/javascript'>alert('Successful update all employee Attendance');window.location='admin-dashboard.php';</script>";
                } else {
                    echo "<script type='text/javascript'>alert('Database Error');window.location='admin-dashboard.php';</script>";
                }

        } else {
            echo "<script type='text/javascript'>alert('Error:No Employee Data.');window.location='login.php';</script>";
        }
    }
?>