<?php
    function checkStatus(int $id){
        
        require('dbcon.php');

        $query = 'SELECT * FROM `attendance` WHERE `employeeID` = "'.$id.'" AND `date` = "'.date("Y-m-d").'" ORDER BY `attendance`.`time` DESC';
        $result = $con->query($query);
        

        if($result->num_rows == 0){
            $status = "Clock In";
        } else {
            $row = $result->fetch_assoc();
            if($row["status"] == "Clock In"){
                $status = "Clock Out";
            } else {
                $status = "Clock In";
            }
        }

        return $status;
    }
?>