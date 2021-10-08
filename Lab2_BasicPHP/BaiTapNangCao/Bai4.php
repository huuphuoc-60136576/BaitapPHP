<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma trận</title>

    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>
</head>
<body>
    <?php
        $m = rand(2, 5);
        $n = rand(2, 5);
        $array;

        echo "<br> m = $m";
        echo "<br> n = $n";

        for ($i=0; $i < $m; $i++) { 
            for ($j=0; $j < $n; $j++) { 
                $array[$i][$j] = rand(-100, 100);
            }
        }

        echo "<table>";
        for ($i=0; $i < $m; $i++) { 
            echo "<tr>";
            for ($j=0; $j < $n; $j++) { 
             echo "<td>". $array[$i][$j]. "</td>";   
            }
            echo "</tr>";
        }
        echo "</table>";
    ?>
</body>
</html>