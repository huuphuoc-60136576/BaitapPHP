<!DOCTYPE html>
<html>
<head>
    <title>Số ngẫu nhiên</title>
</head>
<body>
    
    <?php
        $soNgauNhien = rand(10, 1000);

        // Câu a
        // Kiem tra nguyen to
        function kiemTraNguyenTo($so) {
            if ($so == 0 || $so == 1) {
                return false;
            }

            $temp = 0;

            for ($i=2; $i <= sqrt($so); $i++) { 
                if ($so % $i == 0) {
                    $temp++;
                }
            }

            if ($temp == 0) {
                return true;
            }

            return false;
        }

        // Hien thi so nguyen to nho hon $soNgauNhien
        function hienThiSoNguyenTo($soNgauNhien) {
            for ($i=0; $i < $soNgauNhien; $i++) { 
                if (kiemTraNguyenTo($i) == true) {
                    echo $i . " ";
                }
            }
        }

        // Câu b:
        function tachChuSo($so) {
            $temp = array();

            while ($so > 0) {
                $temp[] = $so % 10;
                $so = (int)($so / 10);
            }

            return $temp;
        }

        echo "Câu a: Các số nguyên tố nhỏ hơn $soNgauNhien" . "<br>";
        hienThiSoNguyenTo($soNgauNhien);
        echo "<br>";

        $luuChuSo = tachChuSo($soNgauNhien);
        echo "Câu b: Số nguyễn $soNgauNhien có " . count($luuChuSo) . " chữ số.";
        echo "<br>";

        echo "Câu c: Chữ số nguyên lớn nhất của $soNgauNhien: ";
        echo max($luuChuSo);
    ?>

</body>
</html>