<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    
    
    <script src="js/jquery.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
    <noscript>
        
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-xlarge.css" />
    </noscript>

    <!--CSS CSS CSS CSS CSS CSS CSS CSS CSS CSS CSS -->
    <style>
        .tooltip {
            position: relative;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 500px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: -230px;
            margin-left: 0px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip .tooltiptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }

        .iframe {
            width: 109%;
            height: 900px;
        }

        #navButton .toggle {
		visibility: hidden;
	}

		#navButton .toggle:before {
			visibility: hidden;
		}

		#navButton .toggle:before {
			visibility: hidden;
        }
    </style>


</head>

<body>
    <?php
    require_once("dbcon.php");
    $id = $_GET["id"];
    $year = $_POST["year"];

    if($year < 1990 || $year > 2100){
        echo "";
    }

    echo "<div style=\"overflow-x:auto; overflow: visible;\">
    <table>
        <thead>
            <tr>
                <th></th>
                <td>Day</td>
                <td>Day</td>
                <td>Day</td>
                <td>Day</td>
                <td>Day</td>
                <td>Day</td>
                <td>Day</td>
                <td>Day</td>
                <td>Day</td>
                <td>Day</td>
                <td>Day</td>
                <td>Day</td>
                <td>Day</td>
                <td>Day</td>
                <td>Day</td>
                <td>Day</td>
                <td>Day</td>
                <td>Day</td>
                <td>Day</td>
                <td>Day</td>
                <td>Day</td>
                <td>Day</td>
                <td>Day</td>
                <td>Day</td>
                <td>Day</td>
                <td>Day</td>
                <td>Day</td>
                <td>Day</td>
                <td>Day</td>
                <td>Day</td>
                <td>Day</td>
            </tr>
        </thead>
        <tbody>";

        for($i = 1; $i <= 12; $i++){
            $month = "$year-$i-1";
            $numberDay = Date("t", strtotime($month));
            echo "<tr>";
            echo "<th>".Date("M", strtotime($month))."</th>";

            for($j = 1; $j <= $numberDay; $j++){
                $date = "$year-$i-$j";
                $selectQuery = 'SELECT * FROM `attendance` WHERE `employeeID` = \''.$id.'\' AND `date` = \''.$date.'\'';
                $selectResult = $con->query($selectQuery);

                if(!$selectResult || $selectResult->num_rows == 0){
                    echo "<td>$j</td>";
                } else if($selectResult->num_rows == 1){
                    $row = $selectResult->fetch_assoc();
                    if($row["status"] == "Absence"){
                        echo "<td style=\"background-color: #FFAAAA; color: white;\" class=\"tooltip\">$j<span class=\"tooltiptext\">";
                        echo "Status: ".$row["status"];
                        echo ", Remark: ".$row["remark"];
                        echo "</span></td>";
                    } else {
                        echo "<td style=\"background-color: #b5f4ff;\" class=\"tooltip\">$j<span class=\"tooltiptext\">";
                        echo "Status: ".$row["status"];
                        echo ", Remark: ".$row["remark"];
                        echo "</span></td>";
                    }
                } else {
                    echo "<td style=\"background-color: #ccffd4;\" class=\"tooltip\">$j<span class=\"tooltiptext\">";
                    $count = 0;
                    while($row = $selectResult->fetch_assoc()){
                        echo "Time: ".$row["time"];
                        echo ", Status: ".$row["status"];
                        echo ", Remark: ".$row["remark"];

                        if($count < $selectResult->num_rows){
                            echo "<br>";
                        }
                        $count++;
                    }
                    echo "</span></td>";
                }
            }
            
            
            echo "</tr>";
        }

        echo "</tbody>
        </table>
    </div>";
    ?>
    
</body>

</html>