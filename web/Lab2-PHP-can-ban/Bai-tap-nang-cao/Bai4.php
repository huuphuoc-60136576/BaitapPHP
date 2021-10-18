<!DOCTYPE html>
<html>
<head>
    <title>Hiển thị ma trận</title>

    <style>
        table, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }
    </style>
</head>
<body>
    
    <?php
        $m = rand(2, 5);
        $n = rand(2, 5);

        $maTran = array();

        // Tạo ma trận
        for ($i=0; $i < $m; $i++) { 
            for ($j=0; $j < $n; $j++) {
                $giaTri[$j] = rand(-100, 100);
            }
            $maTran[$i] = $giaTri;

        }
    ?>

    <table>
        <?php
            echo "Ma trận $m x $n: <br>";
            // Hiển thị ma trận
            for ($k=0; $k < $m; $k++) { 
                echo "<tr>";
                for ($l=0; $l < $n; $l++) { 
                    echo "<td>". $maTran[$k][$l] ."</td>";
                }
                echo "</tr>";
            }
        ?>
    </table>

</body>
</html>