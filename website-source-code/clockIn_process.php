<?php
    session_start();
    include_once("dbcon.php");
    include_once("functions.php");

    $currentTime = Date("H:i:s");
    $rowPerDay = 4;

    $query = 'SELECT * FROM `employeeinfo` WHERE `id` = \''.$_SESSION["id"].'\'';

    $result = $con->query($query);
    $employeeInfoRow = $result->fetch_assoc();

    //check employee clock in earlier and latest time
    if(Date("H") >= 7 && Date("H") <= 21){     //time to check in 7am(0700) to 9pm(2100)

        //check employee work on weekend and the current date is Saturday or Sunday
        if($employeeInfoRow["weekend_work"] == TRUE && (Date("N") == 6 || Date("N") == 7)){
            //check employee if first clock in current day
            $query = 'SELECT * FROM `attendance` WHERE `employeeID`=\''.$_SESSION["id"].'\' AND `date`=\''.Date("Y-m-d").'\' ORDER BY `time` DESC';
            $result = $con->query($query);
            if(!$result || $result->num_rows == 0){
                //check employee if got late clock in (apply late 10min)
                $diffTime = diffTime($employeeInfoRow["work_start_time"], $currentTime);
                if($diffTime > 10){ //apply late 10min
                    insertQuery($_SESSION["id"], $_SESSION["name"], "Clock In" , "Late $diffTime minute/s", $diffTime);

                    //echo "Late";
                    //echo "<script type='text/javascript'>alert('You have late.');window.location='user-dashboard.php';</script>";
                } else {
                    insertQuery($_SESSION["id"], $_SESSION["name"], "Clock In" , "", $diffTime);

                    //echo "on time";
                    //echo "<script type='text/javascript'>alert('You are on time.');window.location='user-dashboard.php';</script>";
                }
            } else {
                //check employee got OT work overnight on previous day
                $attendanceRow = $result->fetch_assoc();
                $overnightDuration = diffTime($attendanceRow["time"], "07:00:00");
                if($attendanceRow["date"] == Date("Y-m-d") && $overnightDuration >= 0 && $attendanceRow["status"] == "Clock Out"){
                    //make sure last record is clock out status
                    if($attendanceRow["status"] == "Clock Out"){
                        //check employee if got late clock in (apply late 10min)
                        $diffTime = diffTime($employeeInfoRow["work_start_time"], $currentTime);
                        if($diffTime > 10){ //apply late 10min
                            insertQuery($_SESSION["id"], $_SESSION["name"], "Clock In" , "Late $diffTime minute/s", $diffTime);

                            //echo "Late";
                            //echo "<script type='text/javascript'>alert('You have late.');window.location='user-dashboard.php';</script>";
                        } else {
                            insertQuery($_SESSION["id"], $_SESSION["name"], "Clock In" , "", $diffTime);

                            //echo "on time";
                            //echo "<script type='text/javascript'>alert('You are on time.');window.location='user-dashboard.php';</script>";
                        }
                    } else {
                        echo "Database Error";
                    }
                } else {
                    //check employee if check in after 4 time clock in and out
                    if($result->num_rows <= 4){
                        $attendanceRow = $result->fetch_assoc();
                        //make sure last record is clock out status
                        if($attendanceRow["status"] == "Clock Out"){

                            $possibleCheckInTime = addTime($attendanceRow["time"], $employeeInfoRow["rest_time"]);
                            $diffTime = diffTime($currentTime, $possibleCheckInTime);
                            //ckeck employee if late clock in after rest (10min)
                            if($diffTime > 10){ //apply late 10min
                                insertQuery($_SESSION["id"], $_SESSION["name"], "Clock In" , "Late $diffTime minute/s after rest", $diffTime);

                                //echo "late after rest";
                            } else {
                                insertQuery($_SESSION["id"], $_SESSION["name"], "Clock In" , "Rest back", $diffTime);

                                //echo "on time after rest";
                            }
                        } else {
                            echo "Database Error";
                        }
                    } else {
                        echo "exceed check in and out";
                    }
                }
            }
        } else {
            //check employee if first clock in current day
            $query = 'SELECT * FROM `attendance` WHERE `employeeID`=\''.$_SESSION["id"].'\' AND `date`=\''.Date("Y-m-d").'\' ORDER BY `time` DESC';
            $result = $con->query($query);
            if(!$result || $result->num_rows == 0){
                //check employee got OT on weekend or not
                if(Date("N") == 6 || Date("N") == 7){
                    insertQuery($_SESSION["id"], $_SESSION["name"], "Clock In" , "OT (Weekend)", $diffTime);
                } else {
                    //check employee if got late clock in (apply late 10min)
                    $diffTime = diffTime($employeeInfoRow["work_start_time"], $currentTime);
                    if($diffTime > 10){ //apply late 10min
                        insertQuery($_SESSION["id"], $_SESSION["name"], "Clock In" , "Late $diffTime minute/s", $diffTime);

                        //echo "Late";
                        //echo "<script type='text/javascript'>alert('You have late.');window.location='user-dashboard.php';</script>";
                    } else {
                        insertQuery($_SESSION["id"], $_SESSION["name"], "Clock In" , "", $diffTime);

                        //echo "on time";
                        //echo "<script type='text/javascript'>alert('You are on time.');window.location='user-dashboard.php';</script>";
                    }
                }
            } else {
                //check employee got OT work overnight on previous day
                $attendanceRow = $result->fetch_assoc();
                $overnightDuration = diffTime($attendanceRow["time"], "07:00:00");
                if($attendanceRow["date"] == Date("Y-m-d") && $overnightDuration >= 0 && $attendanceRow["status"] == "Clock Out"){
                    //make sure last record is clock out status
                    if($attendanceRow["status"] == "Clock Out"){
                        //check employee if got late clock in (apply late 10min)
                        $diffTime = diffTime($employeeInfoRow["work_start_time"], $currentTime);
                        if($diffTime > 10){ //apply late 10min
                            insertQuery($_SESSION["id"], $_SESSION["name"], "Clock In" , "Late $diffTime minute/s", $diffTime);

                            //echo "Late";
                            //echo "<script type='text/javascript'>alert('You have late.');window.location='user-dashboard.php';</script>";
                        } else {
                            insertQuery($_SESSION["id"], $_SESSION["name"], "Clock In" , "", $diffTime);

                            //echo "on time";
                            //echo "<script type='text/javascript'>alert('You are on time.');window.location='user-dashboard.php';</script>";
                        }
                    } else {
                        echo "Database error";
                    }
                } else {
                    //check employee if check in after 4 time clock in and out
                    if($result->num_rows <= 4){
                        $attendanceRow = $result->fetch_assoc();
                        //make sure last record is clock out status
                        if($attendanceRow["status"] == "Clock Out"){

                            $possibleCheckInTime = addTime($attendanceRow["time"], $employeeInfoRow["rest_time"]);
                            $diffTime = diffTime($currentTime, $possibleCheckInTime);
                            //ckeck employee if late clock in after rest (10min) or 5 if user OT overnight
                            if($diffTime > 10){ //apply late 10min
                                insertQuery($_SESSION["id"], $_SESSION["name"], "Clock In" , "Late $diffTime minute/s after rest", $diffTime);
                                
                                //echo "late after rest";
                            } else {
                                insertQuery($_SESSION["id"], $_SESSION["name"], "Clock In" , "Rest Back", $diffTime);

                                //echo "on time after rest";
                            }
                        } else {
                            echo "Database Error";
                        }
                    } else {
                        echo "exceed check in and out";
                    }
                }
            }
        }
    } else {
        echo "<script type='text/javascript'>alert('Sorry, current time cannot clock in.');window.location='user-dashboard.php';</script>";
    }
?>

