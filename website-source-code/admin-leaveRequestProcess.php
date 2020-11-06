<?php
    require_once("dbcon.php");
    $id = $_GET["id"];
    $approval = $_GET["approval"];

    $query = "UPDATE `leaveapplication` SET `approval` = '$approval' WHERE `id` = '$id'";
    $result = $con->query($query);

    echo "<script>window.location='admin-leaveRequest.php'</script>";
?>