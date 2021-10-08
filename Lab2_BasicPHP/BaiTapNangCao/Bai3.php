<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng cửu chương</title>
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
    <h2>Bảng cửu chương từ 1 đến 10</h2>
    <table>
        <tr>
        <?php
            for ($i=1; $i <= 10; $i++) { 
                echo "<th>Cửu chương $i<th>";
            }

            for ($i=1; $i <= 10; $i++) { 
                echo "<tr>";
                for ($j=1; $j <= 10; $j++) { 
                    echo "<td>$j x $i = ". ($j * $i). "<td>";
                }
                echo "</tr>";
            }
        ?>
        </tr>
    </table>
</body>
</html>