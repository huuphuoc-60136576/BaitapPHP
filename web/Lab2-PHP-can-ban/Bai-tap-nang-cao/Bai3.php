<!DOCTYPE html>
<html>
<head>
    <title>Bảng cửu chương từ 1 đến 10</title>

    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>

    <table>
        <?php
            echo "<tr>";
            for ($k=1; $k <= 10; $k++) { 
                echo "<th>Bảng cửu chương $k</th>";
            }
            echo "</tr>";

            for ($i=1; $i <= 10; $i++) { 
                echo "<tr>";
                for ($j=1; $j <= 10; $j++) { 
                    $ketQua = $j . " x " . $i . " = " . ($j * $i);
                    echo "<td>". $ketQua ."</td>";
                }
                echo "</tr>";
            }
        ?>
    </table>

</body>
</html>