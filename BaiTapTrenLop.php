<?php
    $a = rand(1, 5);
    $b = rand(10, 100);

    echo "<br>a = $a";
    echo "<br>b = $b";

    switch ($a) {
        case 1:
            echo "<br>Chu vi của hình vuông có cạnh là $b = ". ($b * 4);
            echo "<br>Diện tích của hình vuông có cạnh $b = ". ($b * $b);
            break;
        case 2:
            echo "<br>Chu vi của hình tròn có bán kính là $b = ". (2 * $b * 3.14);
            echo "<br>Diện tích của hình tròn có bán kính $b = ". ($b * $b * 3.14);
            break;
        case 3:
            echo "<br>Chu vi của tam giác đều có cạnh là $b = ". (3 * $b);
            echo "<br>Diện tích của tam giác đều có cạnh là $b = ". ($b * $b * sqrt(3)/4);
            break;
        case 4:
            echo "<br>Chu vi của hình chữ nhật có cạnh là $a và $b = ". (2 * ($a + $b));
            echo "<br>Diện tích của hình chữ nhật có cạnh là $a và $b = ". ($a * $b);
            break;
        default:
            echo "<br>Không làm gì cả!";
            break;
    }
?>