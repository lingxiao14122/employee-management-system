<?php
    session_start();
    include_once("dbcon.php");
    include_once("functions.php");

    $currentTime = Date("H:i:s");

    $query = 'SELECT * FROM `employeeinfo` WHERE `id` = \''.$_SESSION["id"].'\'';

    $result = $con->query($query);
    $employeeInfoRow = $result->fetch_assoc();

    //check employee work on weekend and current date is Saturday or Sunday
    if($employeeInfoRow["weekend_work"] == TRUE && (Date("N") == 6 || Date("N") == 7)){
        //check if employee clock out after start work and before work end time to rest
        $diffStartTime = diffTime($currentTime, $employeeInfoRow["work_start_time"]);
        $diffEndTime = diffTime($currentTime, $employeeInfoRow["work_end_time"]);
        if($diffStartTime < -180 && $diffEndTime > 180){    //give user rest before 3 hours(180 min) work end time
            $query = 'SELECT * FROM `attendance` WHERE `employeeID`=\''.$_SESSION["id"].'\' AND `date`=\''.Date("Y-m-d").'\' ORDER BY `time` DESC';
            $result = $con->query($query);
            $attendanceRow = $result->fetch_assoc();

            $timeduration = diffTime($attendanceRow["time"], $currentTime);

            //check if employee clock out after 30 min clock in
            if($timeduration > 30){
                insertQuery($_SESSION["id"], $_SESSION["name"], "Clock Out" , "Rest", NULL);

                //echo "clock out rest";
            } else {
                echo "<script type='text/javascript'>alert('Cannot clock out before 30 minutes clock in');window.location='user-dashboard.php';</script>";
                
                //echo "cannot clock out after 30 min late clock in";
            }
        } else {
            echo "<script type='text/javascript'>alert('Cannot clock out before 3 hours work start time');window.location='user-dashboard.php';</script>";

            //echo "cannot clock out after 3hr clock in";
        }
        //check if employee clock before work end time 5min and after 30min
        if($diffEndTime > 5 && $diffEndTime < -60){
            insertQuery($_SESSION["id"], $_SESSION["name"], "Clock Out" , "", NULL);

            //echo "clock out";
        } else {
            insertQuery($_SESSION["id"], $_SESSION["name"], "Clock Out" , "OT (".-(number_format($diffEndTime)).")", -($diffEndTime));

            //echo "clock out OT";
        }
    } else {
        //check employee got OT on weekend or not
        if(Date("N") == 6 || Date("N") == 7){
            //check employee if clock out before OT clock in time 30 min
            $query = 'SELECT * FROM `attendance` WHERE `employeeID`=\''.$_SESSION["id"].'\' AND `date`=\''.Date("Y-m-d").'\' ORDER BY `time` DESC';
            $result = $con->query($query);
            $attendanceRow = $result->fetch_assoc();

            $otTimeduration = diffTime($attendanceRow["time"], $currentTime);
            if($otTimeduration > 30){   //30 min after clock in
                insertQuery($_SESSION["id"], $_SESSION["name"], "Clock Out" , "OT (Weekend)", NULL);

                //echo "clock out OT (Not weekend)";
            } else {
                echo "<script type='text/javascript'>alert('Cannot clock out before 30 minutes clock in');window.location='user-dashboard.php';</script>";

                //echo "cannot clock out before 30 min clock in";
            }
        } else {
            //check if employee clock out after start work and before work end time to rest
            $diffStartTime = diffTime($currentTime, $employeeInfoRow["work_start_time"]);
            $diffEndTime = diffTime($currentTime, $employeeInfoRow["work_end_time"]);
            if($diffStartTime < -180 && $diffEndTime > 180){    //give user rest before 3 hours(180 min) work end time
                $query = 'SELECT * FROM `attendance` WHERE `employeeID`=\''.$_SESSION["id"].'\' AND `date`=\''.Date("Y-m-d").'\' ORDER BY `time` DESC';
                $result = $con->query($query);
                $attendanceRow = $result->fetch_assoc();

                $timeduration = diffTime($attendanceRow["time"], $currentTime);

                if($timeduration > 30){
                    insertQuery($_SESSION["id"], $_SESSION["name"], "Clock Out" , "Rest", NULL);

                    //echo "clock out rest(Not weekend)";
                } else {
                    echo "<script type='text/javascript'>alert('Cannot clock out before 30 minutes clock in');window.location='user-dashboard.php';</script>";

                    //echo "cannot clock out after 30 min late clock in";
                }
            } else {
                echo "<script type='text/javascript'>alert('Cannot clock out before 3 hours work start time');window.location='user-dashboard.php';</script>";

                //echo "cannot clock out after 3hr clock in";
            }
            //check if employee clock before work end time 5min and after 30min
            if($diffEndTime > 5 && $diffEndTime < -60){
                insertQuery($_SESSION["id"], $_SESSION["name"], "Clock Out" , "", NULL);

                //echo "clock out(Not weekend)";
            } else {
                insertQuery($_SESSION["id"], $_SESSION["name"], "Clock Out" , "OT (".-(number_format($diffEndTime)).")", -($diffEndTime));

                //echo "clock out OT(Not weekend)";
            }
        }
    }

?>