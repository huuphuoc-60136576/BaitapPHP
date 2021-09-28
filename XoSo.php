<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xổ số</title>

    <style>
        table {
            margin: auto;
            text-align: center;
        }

        td {
            border: 1px solid black;
            font-size: 1.5rem;
            padding: 10px;
        }

        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Kết quả xổ số khiến thiết Khánh Hòa ngày <?php echo date('d-m-Y') ?></h1>
    <table>
        <tr>
            <td>Giải 8</td>
            <?php
                $number = rand(0, 99);
                if ($number < 10)
                    $number = "0". $number;
                echo "<td style='color:red'> $number </td>";
            ?>
        </tr>
        <tr>
            <td>Giải 7</td>
            <?php
                $number = rand(0, 999);
                if ($number < 10)
                    $number = "00". $number;
                else if ($number < 100)
                    $number = "0". $number;

                echo "<td> $number </td>";
            ?>
        </tr>
        <tr>
            <td>Giải 6</td>
            <?php
                $temp = 0;
                for ($i=0; $i < 3; $i++) { 
                    $number = rand(0, 9999);                               
                    while ($number == $temp) {
                        $number = rand(0, 9999); 
                    }

                    if ($number < 10)
                        $number = "000". $number;
                    else if ($number < 100)
                        $number = "00". $number;
                    else if ($number < 1000)
                        $number = "0". $number;

                    echo "<td> $number </td>";

                    $temp = $number;
                }                
            ?>
        </tr>
        <tr>
            <td>Giải 5</td>
            <?php
                $number = rand(0, 9999);
                if ($number < 10)
                    $number = "000". $number;
                else if ($number < 100)
                    $number = "00". $number;
                else if ($number < 1000)
                    $number = "0". $number;

                echo "<td> $number </td>";
            ?>
        </tr>
        <tr>
            <td>Giải 4</td>
            <?php
                $temp = 0;
                for ($i=0; $i < 7; $i++) { 
                    $number = rand(0, 99999);                               
                    while ($number == $temp) {
                        $number = rand(0, 99999); 
                    }

                    if ($number < 10)
                        $number = "0000". $number;
                    else if ($number < 100)
                        $number = "000". $number;
                    else if ($number < 1000)
                        $number = "00". $number;
                    else if ($number < 10000)
                        $number = "0". $number;

                    echo "<td> $number </td>";

                    $temp = $number;
                }                
            ?>
        </tr>
        <tr>
            <td>Giải 3</td>
            <?php
                $temp = 0;
                for ($i=0; $i < 2; $i++) { 
                    $number = rand(0, 99999);                               
                    while ($number == $temp) {
                        $number = rand(0, 99999); 
                    }

                    if ($number < 10)
                        $number = "0000". $number;
                    else if ($number < 100)
                        $number = "000". $number;
                    else if ($number < 1000)
                        $number = "00". $number;
                    else if ($number < 10000)
                        $number = "0". $number;

                    echo "<td> $number </td>";

                    $temp = $number;
                }                
            ?>
        </tr>
        <tr>
            <td>Giải 2</td>
            <?php
                $number = rand(0, 99999);                               

                if ($number < 10)
                    $number = "0000". $number;
                else if ($number < 100)
                    $number = "000". $number;
                else if ($number < 1000)
                    $number = "00". $number;
                else if ($number < 10000)
                    $number = "0". $number;

                echo "<td> $number </td>";
            ?>
        </tr>
        <tr>
            <td>Giải ĐB</td>
            <?php
                $number = rand(0, 999999);                               

                if ($number < 10)
                    $number = "00000". $number;
                else if ($number < 100)
                    $number = "0000". $number;
                else if ($number < 1000)
                    $number = "000". $number;
                else if ($number < 10000)
                    $number = "00". $number;
                else if ($number < 10000)
                    $number = "0". $number;

                echo "<td style='color:red'> $number </td>";
            ?>
        </tr>
    </table>
</body>
</html>