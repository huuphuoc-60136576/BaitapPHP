<?php
    $number = rand(1, 10);
    echo "<br>Số được chọn ngẫu nhiên: $number";

    echo "<br>Bảng cửu chương của $number là:";
    for ($i=1; $i <= 10; $i++) { 
        echo "<br>$number x $i = ". ($number * $i);
    }
?>