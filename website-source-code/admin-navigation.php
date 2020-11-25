<style>
.leaverequest{
    background-color: rgb(255, 170, 170);
    border-radius: 5px;
    color: red;
}
</style>

<section>
    <h2>Navigation</h2>
    <ul class="alt navigation-admin">
        <li><a href="admin-dashboard.php">Dashboard</a></li>
        <li><a href="admin-searchEmpDetail.php">Search employee detail</a></li>

        <?php
            require("dbcon.php");
            $count = 0;

            $query = "SELECT * FROM `leaveapplication`";
            $result = $con->query($query);
            
            if(!$result || $result->num_rows == 0){
                echo "<li><a href=\"admin-leaveRequest.php\">Leave request</a></li>";
            } else {
                while($row = $result->fetch_assoc()){
                    if($row["approval"] == NULL || $row["approval"] == "" || $row["approval"] == "Pending"){
                        $count = $count + 1;
                    }
                }
                
                if($count == 0){
                    echo "<li><a href=\"admin-leaveRequest.php\">Leave Request</a></li>";
                } else {
                    echo "<li><a href=\"admin-leaveRequest.php\" class=\"leaverequest\">Leave Request ($count)</a></li>";
                }
            }
        ?>
        <li><a href="admin-employeeReport.php">Employee report</a></li>
        <li><a href="admin-manageUser.php">Manage user</a></li>
        <li><a href="admin-attendance.php">Clock In / Out</a></li>

    </ul>
</section>



