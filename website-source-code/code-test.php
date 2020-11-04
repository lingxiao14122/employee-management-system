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
?>