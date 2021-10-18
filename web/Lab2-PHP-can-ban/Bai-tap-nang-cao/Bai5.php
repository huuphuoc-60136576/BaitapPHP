<!DOCTYPE html>
<html>
<head>
    <title>Lưu số nguyên tố</title>
</head>
<body>
    
    <?php
        $soNgauNhien = rand(-100, 100);
        
        // Kiểm tra số nguyên tố
        function kiemTraNguyenTo($so) {
            if ($so < 0) {
                return false;
            }

            if ($so == 0 || $so == 1) {
                return false;
            }

            $temp = 0;
            for ($i=2; $i <= sqrt($so); $i++) { 
                if ($so % $i == 0) {
                    $temp++;
                }
            }

            if ($temp != 0) {
                return false;
            }

            return true;
        }

        // Thông báo
        if (kiemTraNguyenTo($soNgauNhien) == true) {
            echo "Số $soNgauNhien là số nguyên tố!<br>";
        } else {
            echo "Số $soNgauNhien không là số nguyên tố! <br>";
        }

        // Thao tác trên file
        $path = 'soNT.txt';
        $fp = @fopen($path, "a+");

        if (!$fp) {
            echo "Không mở được file!";
        } else {
            if (kiemTraNguyenTo($soNgauNhien) == true) {
                $data = $soNgauNhien . " ";
                
                fwrite($fp, $data);
            }
            fclose($fp);
        }

        // Hiển trị dữ liệu trong file
        $path = 'soNT.txt';
        $fp = @fopen($path, "r");
        echo "Dữ liệu trong file $path: ";
        echo fgets($fp);
        fclose($fp);
    ?>

    <br>
    <button onClick="window.location.reload();">Tải lại trang</button>
</body>
</html>