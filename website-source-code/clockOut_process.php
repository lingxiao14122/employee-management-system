<?php
    if (isset($_COOKIE["PHPSESSID"])){
        session_start();
    } else {
        echo "<script type='text/javascript'>alert('Error: Haven't Login. Please Login to process.');window.location='login.php';</script>";
    }

    require_once("dbcom.php");
    require_once("functions.php");

    $currentTime = Date("H:i:s");
    $currentDate = Date("Y-m-d");

    $query = 'SELECT * FROM `employeeinfo` WHERE `id` = \''.$_SESSION["id"].'\'';
    $result = $con->query($query);
    $employeeInfoRow = $result->fetch_assoc();

    //check current day are weekend or not
    if(Date("N") == 6 || Date("N") == 7){
        //weekend employee will clock out as normal, but non-weekend employee will count as OT
        if($employeeInfoRow["weekend_work"] == 1){
            //weekend employee will work as normal

            //check database to make sure last record is clock in
            $query = 'SELECT * FROM `attendance` WHERE `employeeID`=\''.$_SESSION["id"].'\' AND `date`=\''.Date("Y-m-d").'\' ORDER BY `time` DESC';
            $result = $con->query($query);

            if(!$result || $result->num_rows == 0){
                //database error

                echo "<script type='text/javascript'>alert('Database Error');window.location='user-dashboard.php';</script>";
            } else {
                $attendanceRow = $result->fetch_assoc();
                if($attendanceRow["status"] == "Clock In"){
                    //database safe

                    //check employee when to clock out (Cannot clock out after work time start 3 hours or before work time end 3 hours)
                    $startTimeDuration = diffTime($employeeInfoRow["work_start_time"], $currentTime);
                    $endTimeDuration = diffTime($employeeInfoRow["work_end_time"], $currentTime);
                    if($startTimeDuration <= 180 || $endTimeDuration >= -180){
                        //cannot clock out

                        echo "<script type='text/javascript'>alert('Error: Cannot clock out after work time start 3 hours or before work time end 3 hours.');window.location='user-dashboard.php';</script>";
                    } else if($endTimeDuration <= -10){
                        //clock out late day

                        //check employee if got OT work
                        if($endTimeDuration >= 60){
                            //clock out with OT state

                            insertQuery($_SESSION["id"], $_SESSION["name"], "CLock Out", "OT (".number_format($endTimeDuration, 2).")", $endTimeDuration);
                        } else {
                            //normal clock out

                            insertQuery($_SESSION["id"], $_SESSION["name"], "CLock Out", "", 0);
                        }
                    } else {
                        //clock out for rest

                        while($row = $result->fetch_assoc()){
                            if($row["remark"] == "(rest)"){
                                //cannot clock out due to already had rest
                            } else {
                                //clock out for rest
                                
                                insertQuery($_SESSION["id"], $_SESSION["name"], "CLock Out", "(rest)", 0);
                            }
                        }
                    }
                } else {
                    //database error

                    echo "<script type='text/javascript'>alert('Database Error');window.location='user-dashboard.php';</script>";
                }
            }
        } else {
            //non-weekend employee will count as OT clock out

            $attendanceRow = $result->fetch_assoc();
            if($attendanceRow["status"] == "Clock In"){
                //database safe

                insertQuery($_SESSION["id"], $_SESSION["name"], "CLock Out", "(Weekend OT)", 0);
            } else {
                //database error

                echo "<script type='text/javascript'>alert('Database Error');window.location='user-dashboard.php';</script>";
            }
        }
    } else {
        //all employee are normal work

        //check database to make sure last record is clock in
        $query = 'SELECT * FROM `attendance` WHERE `employeeID`=\''.$_SESSION["id"].'\' AND `date`=\''.Date("Y-m-d").'\' ORDER BY `time` DESC';
        $result = $con->query($query);

        if(!$result || $result->num_rows == 0){
            //database error

            echo "<script type='text/javascript'>alert('Database Error');window.location='user-dashboard.php';</script>";
        } else {
            $attendanceRow = $result->fetch_assoc();
            if($attendanceRow["status"] == "Clock In"){
                //database safe

                //check employee when to clock out (Cannot clock out after work time start 3 hours or before work time end 3 hours)
                $startTimeDuration = diffTime($employeeInfoRow["work_start_time"], $currentTime);
                $endTimeDuration = diffTime($employeeInfoRow["work_end_time"], $currentTime);
                if($startTimeDuration <= 180 || $endTimeDuration >= -180){
                    //cannot clock out
                } else if($endTimeDuration <= -10){
                    //clock out late day

                    //check employee if got OT work
                    if($endTimeDuration >= 60){
                        //clock out with OT state

                        insertQuery($_SESSION["id"], $_SESSION["name"], "CLock Out", "OT (".number_format($endTimeDuration, 2).")", $endTimeDuration);
                    } else {
                        //normal clock out

                        insertQuery($_SESSION["id"], $_SESSION["name"], "CLock Out", "", 0);
                    }
                } else {
                    //clock out for rest

                    while($row = $result->fetch_assoc()){
                        if($row["remark"] == "(rest)"){
                            //cannot clock out due to already had rest
                        } else {
                            //clock out for rest
                            
                            insertQuery($_SESSION["id"], $_SESSION["name"], "CLock Out", "(rest)", 0);
                        }
                    }
                }
            } else {
                //database error

                echo "<script type='text/javascript'>alert('Database Error');window.location='user-dashboard.php';</script>";
            }
        }
    }
?>