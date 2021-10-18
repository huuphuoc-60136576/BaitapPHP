<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 1</title>
</head>
<body>
    
    <?php
        $n = "";
        $mang = array();
        $hienThi = "";

        $err = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $n = $_POST['soNguyenN'];
            
            if (empty($err)) {
                $mang = taoMang($n);

                $hienThi = "Mảng được khởi tạo: \n";
                $hienThi .= implode(", ", $mang);

                $hienThi .= "\nCác số dương chẵn trong mảng: \n";
                inDuongChan($mang, $hienThi);

                $hienThi .= "\nCác phần tử có chữ số cuối là lẻ: \n";
                inLe($mang, $hienThi);
            }
        }


        // Tạo mảng
        function taoMang($n) {
            $mang = array();
            for ($i=0; $i < $n; $i++) { 
                $giaTri = rand(-200, 200);
                $mang[$i] = $giaTri;
            }

            return $mang;
        }

        // In ra các số dương chẵn
        function inDuongChan($arr, &$hienThi) {
            foreach ($arr as $value) {
                if ($value > 0 && $value % 2 == 0) {
                    $hienThi .= $value . " ";
                }
            }
        }

        // Tìm và hiển thị các phần từ có chữ số cuối là số lẻ
        function inLe($arr, &$hienThi) {
            foreach ($arr as $value) {
                if ($value % 2 != 0) {
                    $hienThi .= $value . " ";
                }
            }
        }
    ?>

    <form action="" method="post">
        <table>
            <tr>
                <td>Nhập vào số nguyên dương n: </td>
                <td>
                    <input type="text" name="soNguyenN" value="<?php echo $n; ?>">
                </td>
                <td>
                    <input type="submit" value="Nhập">
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <textarea cols="70" rows="10" disabled><?php
                        echo $hienThi;
                    ?></textarea>
                </td>
            </tr>
        </table>
    </form>

</body>
</html>