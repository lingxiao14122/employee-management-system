<?php
    if (isset($_COOKIE["PHPSESSID"])){
        session_start();
    } else {
        echo "<script type='text/javascript'>alert('Error: Haven't Login. Please Login to process.');window.location='login.php';</script>";
    }

    require_once("dbcom.php");
    require_once("functions.php");

    $currentTime = Date("H:i:s");

    $query = 'SELECT * FROM `employeeinfo` WHERE `id` = \''.$_SESSION["id"].'\'';
    $result = $con->query($query);
    $employeeInfoRow = $result->fetch_assoc();

    //check employee clock in earlier and latest time
    if(Date("H") >= 21 && Date("H") <= 21){
        //in between 7am to 9pm will process clock in

        //check current day are weekend or not
        if(Date("N") == 6 || Date("N") == 7){
            //weekend employee will clock in as normal, but non-weekend employee will count as OT
            if($employeeInfoRow["weekend_work"] == 1){
                //weekend employee will clock in as normal day

                //check employee if first clock in in current day
                $query = 'SELECT * FROM `attendance` WHERE `employeeID`=\''.$_SESSION["id"].'\' AND `date`=\''.Date("Y-m-d").'\' ORDER BY `time` DESC';
                $result = $con->query($query);
                if(!$result || $result->num_rows == 0){
                    //first clock in

                    //check employee if late clock in (apply late 10min)
                    $lateDuration = diffTime($employeeInfoRow["work_start_time"], $currentTime);
                    if($lateDuration > 10){
                        //late clock in

                        insertQuery($_SESSION["id"], $_SESSION["name"], "CLock In", "Late".number_format($lateDuration, 2)."minute/s", $lateDuration);
                    } else {
                        //not late clock in
                        
                        insertQuery($_SESSION["id"], $_SESSION["name"], "CLock In", "", 0);
                    }
                } else {
                    //non-first clock in

                    //check database to make sure last record is clock out
                    $attendanceRow = $result->fetch_assoc();
                    if($attendanceRow["status"] == "Clock Out"){
                        //database safe

                        //check employee got OT work overnight on previous day
                        $overnightDuration = diffTime($attendanceRow["time"], "07:00:00");
                        if($overnightDuration >= 0){
                            //got overnight work

                            //check employee if late clock in (apply late 10min)
                            $lateDuration = diffTime($employeeInfoRow["work_start_time"], $currentTime);
                            if($lateDuration > 10){
                                //late clock in

                                insertQuery($_SESSION["id"], $_SESSION["name"], "CLock In", "Late".number_format($lateDuration, 2)."minute/s", $lateDuration);
                            } else {
                                //not late clock in
                                
                                insertQuery($_SESSION["id"], $_SESSION["name"], "CLock In", "", 0);
                            }
                        } else {
                            //not overnight work (rest)

                            //check attendance if exceed over 2 time clock in
                            $count = 0;
                            while($row = $result->fetch_assoc()){
                                if($row["status"] == "CLock In"){
                                    $count++;
                                }
                            }

                            if($count < 2){
                                //employee proceed to clock in after rest

                                //check employee if late clock in (apply late 10min)
                                $restTime = addTime($attendanceRow["time"], $employeeInfoRow["rest_time"]);
                                $lateDuration = diffTime($restTime, $currentTime);
                                if($lateDuration > 10){
                                    //late clock in rest

                                    insertQuery($_SESSION["id"], $_SESSION["name"], "CLock In", "Late".number_format($lateDuration, 2)."minute/s (rest)", $lateDuration);
                                } else {
                                    //not late clock in rest
                                    
                                    insertQuery($_SESSION["id"], $_SESSION["name"], "CLock In", "(rest)", 0);
                                }
                            } else {
                                //employee exceed clock in 2 time

                                echo "<script type='text/javascript'>alert('Error: Exceed clock in per day');window.location='user-dashboard.php';</script>";
                            }
                        }
                    } else {
                        //database error

                        echo "<script type='text/javascript'>alert('Database error');window.location='user-dashboard.php';</script>";
                    }
                }
            } else {
                //non-weekend employee as OT

                //check employee if first clock in in current day
                $query = 'SELECT * FROM `attendance` WHERE `employeeID`=\''.$_SESSION["id"].'\' AND `date`=\''.Date("Y-m-d").'\' ORDER BY `time` DESC';
                $result = $con->query($query);
                if(!$result || $result->num_rows == 0){
                    //first clock in

                    //clock in as OT day
                    insertQuery($_SESSION["id"], $_SESSION["name"], "CLock In", "Weekend OT", 0);
                } else {
                    //non-first clock in

                    //check database to make sure last record is clock out
                    $attendanceRow = $result->fetch_assoc();
                    if($attendanceRow["status"] == "Clock Out"){
                        //database safe

                        //check employee got OT work overnight on previous day
                        $overnightDuration = diffTime($attendanceRow["time"], "07:00:00");
                        if($overnightDuration >= 0){
                            //got overnight work

                            //clock in as OT day
                            insertQuery($_SESSION["id"], $_SESSION["name"], "CLock In", "Weekend OT", 0);
                        } else {
                            //not overnight work (rest)

                            //check attendance if exceed over 2 time clock in
                            $count = 0;
                            while($row = $result->fetch_assoc()){
                                if($row["status"] == "CLock In"){
                                    $count++;
                                }
                            }

                            if($count < 2){
                                //employee proceed to clock in after rest

                                //clock in weekend OT rest
                                insertQuery($_SESSION["id"], $_SESSION["name"], "CLock In", "Weekend OT (rest)", 0);
                            } else {
                                //employee exceed clock in 2 time

                                echo "<script type='text/javascript'>alert('Exceed clock in per day');window.location='user-dashboard.php';</script>";
                            }
                        }
                    } else {
                        //database error

                        echo "<script type='text/javascript'>alert('Database error');window.location='user-dashboard.php';</script>";
                    }
                }
            }

        } else {
            //all employee are normal work

            //check employee if first clock in in current day
            $query = 'SELECT * FROM `attendance` WHERE `employeeID`=\''.$_SESSION["id"].'\' AND `date`=\''.Date("Y-m-d").'\' ORDER BY `time` DESC';
            $result = $con->query($query);
            if(!$result || $result->num_rows == 0){
                //first clock in

                //check employee if late clock in (apply late 10min)
                $lateDuration = diffTime($employeeInfoRow["work_start_time"], $currentTime);
                if($lateDuration > 10){
                    //late clock in

                    insertQuery($_SESSION["id"], $_SESSION["name"], "CLock In", "Late".number_format($lateDuration, 2)."minute/s", $lateDuration);
                } else {
                    //not late clock in
                    
                    //clock in
                    insertQuery($_SESSION["id"], $_SESSION["name"], "CLock In", "", 0);
                }
            } else {
                //non-first clock in

                //check database to make sure last record is clock out
                $attendanceRow = $result->fetch_assoc();
                if($attendanceRow["status"] == "Clock Out"){
                    //database safe

                    //check employee got OT work overnight on previous day
                    $overnightDuration = diffTime($attendanceRow["time"], "07:00:00");
                    if($overnightDuration >= 0){
                        //got overnight work

                        //check employee if late clock in (apply late 10min)
                        $lateDuration = diffTime($employeeInfoRow["work_start_time"], $currentTime);
                        if($lateDuration > 10){
                            //late clock in

                            insertQuery($_SESSION["id"], $_SESSION["name"], "CLock In", "Late".number_format($lateDuration, 2)."minute/s", $lateDuration);
                        } else {
                            //not late clock in
                            
                            insertQuery($_SESSION["id"], $_SESSION["name"], "CLock In", "", 0);
                        }
                    } else {
                        //not overnight work (rest)

                        //check attendance if exceed over 2 time clock in
                        $count = 0;
                        while($row = $result->fetch_assoc()){
                            if($row["status"] == "CLock In"){
                                $count++;
                            }
                        }

                        if($count < 2){
                            //employee proceed to clock in after rest

                            //check employee if late clock in (apply late 10min)
                            $restTime = addTime($attendanceRow["time"], $employeeInfoRow["rest_time"]);
                            $lateDuration = diffTime($restTime, $currentTime);
                            if($lateDuration > 10){
                                //late clock in rest

                                insertQuery($_SESSION["id"], $_SESSION["name"], "CLock In", "Late".number_format($lateDuration, 2)."minute/s (rest)", $lateDuration);
                            } else {
                                //not late clock in rest
                                
                                insertQuery($_SESSION["id"], $_SESSION["name"], "CLock In", "(rest)", 0);
                            }
                        } else {
                            //employee exceed clock in 2 time

                            echo "<script type='text/javascript'>alert('Exceed clock in per day');window.location='user-dashboard.php';</script>";
                        }
                    }
                } else {
                    //database error

                    echo "<script type='text/javascript'>alert('Database Error');window.location='user-dashboard.php';</script>";
                }
            }
        }

    } else {
        //alert user current time cannot clock in

        echo "<script type='text/javascript'>alert('Sorry, current time cannot clock in.');window.location='user-dashboard.php';</script>";
    }
?>