<?php
    $startTime = '09:00:00';
    $stopTime = '10:00:00';

    $diff = (strtotime($stopTime) - strtotime($startTime));

    $add = strtotime('+2 hour', strtotime($startTime));

    var_dump($diff);
    echo $diff/60;

    var_dump($add);
    echo Date("H:i:s", $add);

    echo -(-1);

    echo "<br>";

    require_once("dbcon.php");

    $result = $con->query("SELECT * FROM `logininfo`");

    $table = $result->fetch_all();

    var_dump($table);

    echo "<br>";
    echo $table[1][3];

    echo "<br>";
    echo sizeof($table);
?>