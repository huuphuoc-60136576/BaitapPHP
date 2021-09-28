<?php
    $number = rand(-100, 100);
    echo "<br>$number";

    // Số nguyên tố là một số tự nhiên lớn hơn 1
    // chỉ có đúng 2 ước số lf 1 và chính nó.
    function kiemTraNguyenTo($number)
    {
        if ($number < 1)
            return false;
        
        if ($number == 2)
            return true;

        $dem = 0;
        for ($i=2; $i <= sqrt($number); $i++) { 
            if ($number % $i == 0) {
                $dem++;
            }
        }

        if ($dem == 0) {
            return true;
        }

        return false;
    }

    function ghiFile($num)
    {
        $fp = @fopen('soNT.txt', 'a+');

        if (!$fp) {
            echo "<br>Mở file không thành công";
        } else {
            if (kiemTraNguyenTo($num)) {
                $data = $num. "\n";

                fwrite($fp, $data);

                fclose($fp);
            }
        }
    }

    ghiFile($number);
?>