<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 4</title>

    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    
    <?php
        $n = $m = "";
        $maTran = array();
        $hienThi = "";
        
        $err = array();
        $soErr = "";
        $lonHon0Err = "";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $n = $_POST['soNguyenDuongN'];
            $m = $_POST['soNguyenDuongM'];

            $kiemTraNhapChua = 0;
            if (!is_numeric($n) || !is_numeric($m)) {
                $kiemTraNhapChua = 1;
                $soErr = "Vui lòng nhập số! <br>";
                $err[] = $soErr;
            }

            if (($n < 0 || $m <0) && $kiemTraNhapChua == 0) {
                $lonHon0Err = "Vui lòng nhập số lớn hơn 0!<br>";
                $err[] = $lonHon0Err;
            }

            if (empty($err)) {

                $maTran = taoMaTran($n, $m);
                $hienThi = "Ma trận $n x $m được khởi tạo: \n";
                hienThiMaTran($maTran, $hienThi);
                
                $demLe = demLe($maTran);
                $hienThi .= "\nMa trận có $demLe phần tử có chữ số cuối là số lẻ.\n";

                $hienThi .= "\nThay thế các phần tử khác 0 thành 1: \n";
                thayThe($maTran);
                hienThiMaTran($maTran, $hienThi);
            }
        }

        // Tạo ma trận
        function taoMaTran($n, $m) {
            $maTran = array();

            for ($i=0; $i < $n; $i++) { 
                for ($j=0; $j < $m; $j++) { 
                    $giaTri = rand(-200, 200);
                    $maTran[$i][] = $giaTri;
                }
            }

            return $maTran;
        }

        // Hiển thị ma trận
        function hienThiMaTran($maTran, &$hienThi) {    
            // ma trận là một mảng gồm nhiều mảng
            foreach ($maTran as $mang) {
                $hienThi .= implode(", ", $mang) . "\n";
            }
        }

        // Đếm số phần tử có chữ số cuối là số lẻ
        function demLe($maTran) {
            $dem = 0;

            foreach ($maTran as $mang) {
                foreach ($mang as $giaTri) {
                    if ($giaTri % 2 != 0) {
                        $dem++;
                    }
                }
            }

            return $dem;
        }

        // Thay thế các phần tử khác 0 thành 1
        function thayThe(&$maTran) {
            
            foreach ($maTran as &$mang) {
                foreach ($mang as &$giaTri) {
                    if ($giaTri != 0) {
                        $giaTri = 1;
                    }
                }
            }
        }
    ?>

    <form action="" name="xuLyMaTran" method="post">
        <table>
            <caption>THAO TÁC TRÊN MA TRẬN</caption>
            <tr>
                <td>Nhập n: </td>
                <td>
                    <input type="text" name="soNguyenDuongN" value="<?php echo $n; ?>">
                </td>
                <td>

                </td>
            </tr>
            <tr>
                <td>Nhập m: </td>
                <td>
                    <input type="text" name="soNguyenDuongM" value="<?php echo $m; ?>">
                </td>
                <td>

                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <textarea cols="60" rows="10" disabled><?php
                        echo $hienThi;
                    ?></textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Nhập">
                </td>
            </tr>
        </table>
    </form>
    
    <span class="error">
        <?php
            echo $soErr;
            echo $lonHon0Err;
        ?>
    </span>

</body>
</html>