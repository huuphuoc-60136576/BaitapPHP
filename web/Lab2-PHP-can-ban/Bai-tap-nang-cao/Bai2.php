<!DOCTYPE html>
<html>
<head>
    <title>Bảng cửu chương</title>
</head>
<body>
    
    <?php
        $soNgauNhien = rand(1, 10);

        // in ra bản cửu chương của $soNgauNhien
        echo "Bảng cửu chương $soNgauNhien: " . "<br>";
        for ($i = 1; $i <= 10; $i++) { 
            echo $soNgauNhien . " x " . $i . " = " . ($soNgauNhien * $i) . "<br>";      
        }
    ?>

</body>
</html>