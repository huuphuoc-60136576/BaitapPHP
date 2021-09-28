<?php
    $number = rand(10, 1000);
    echo $number. '<br>';

    // Câu a
    function hienThiSoNguyenTo($number)
    {
        for ($i=1; $i < $number; $i++) { 
            if (kiemTraNguyenTo($i) == true)
                echo $i. ' ';
        }
    }

    // Số nguyên tố là số chỉ chia hết cho 1 và chính nó.
    function kiemTraNguyenTo($num)
    {
        $dem = 0;
        for ($i=2; $i <= sqrt($num); $i++) { 
            if ($num % $i == 0)
                $dem++;
        }

        if ($num == 2 || $dem == 0)
            return true;
        
        return false;
    }

    hienThiSoNguyenTo($number);

    
    $temp = $number;
    $luuSo = array();
    
    // Tách số đó thành từng số.
    while ($temp != 0)
    {
        $luuSo[] = $temp % 10;
        $temp = (int)($temp / 10);
    }

    // Câu b
    echo "<br>Số nguyên $number có: ". count($luuSo). " chữ số.". '<br>';

    // Câu c
    echo "Chữ số lớn nhất trong số nguyên này là: ". max($luuSo). '<br>';
?>