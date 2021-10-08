<!DOCTYPE html>
<html>
<head>

</head>
<body>
    
    <?php
        $m = $n = "";
        $hienThi = "";
        $err = "";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST['n']) && isset($_POST['m'])) {
                $n = $_POST['n'];
                $m = $_POST['m'];
                $arr = array();

                if (is_numeric($n) && is_numeric($m)) {
                    
                    // In ra ma trận vừa mới tạo
                    $arr = taoMaTran($n, $m);
                    $hienThi = "Ma trận $n x $m là: &#13;&#10;";
                    hienThiMaTran($arr, $hienThi);

                    // Đếm số phần tử có chữ số cuối là số lẻ
                    $hienThi .= "Có " . demChuSoCuoiLe($arr) . " phần tử có chữ số cuối là lẻ &#13;&#10;";

                    // Thay thế các phần tử khác 0 thành 1. In ra ma trận sau thay thế
                    $arr = thayThe($arr);
                    $hienThi .= "Ma trận sau thay thế &#13;&#10;";
                    hienThiMaTran($arr, $hienThi);
                } else {
                    $err = "Nhập chính xác thông tin!";
                }
            }
        }

        // Hàm tạo ma trận
        function taoMaTran($n, $m) {
            $arr = array();
            for ($i=0; $i < $n; $i++) { 
                for ($j=0; $j < $m; $j++) { 
                    $phanTu = rand(-200, 200);
                    $arr[$i][$j] = $phanTu;
                }
            }

            return $arr;
        }

        // Hàm hiển thị ma trận
        function hienThiMaTran($arr, &$hienThi) {
            $count = count($arr);

            foreach ($arr as $subArr) {
                $hienThi .= implode(", ", $subArr) . "&#13;&#10;";
            }

            // for ($i=0; $i < $count; $i++) { 
            //     $hienThi .= implode(",", $arr[$i]) . "&#13;&#10;";
            // }
        }

        // Đếm số phần tử có chữ số cuối là số lẻ
        function demChuSoCuoiLe($arr) {
            $counter = 0;
        
            foreach ($arr as $subArr) {
                foreach ($subArr as $value) {
                    if ($value %2 != 0) {
                        $counter++;
                    }
                }
            }

            // for ($i=0; $i < $n; $i++) { 
            //     for ($j=0; $j < $m; $j++) { 
            //         if ($arr[$i][$j] %2 != 0) {
            //             $counter++;
            //         }
            //     }
            // }

            return $counter;
        }

        // Thay thế các phần tử khác 0 thành 1
        function thayThe(&$arr) {

            foreach ($arr as &$subArr) {
                          
                foreach ($subArr as &$value) {
                    if ($value != 0) {
                        $value = 1;
                    }

                }
            }
            return $arr;
        }
    ?>

    <form action="Bai4-thao-tac-tren-ma-tran.php" method="post">
        <table>
            <tr>
                <td>Nhập n: </td>
                <td><input type="text" name="n" value="<?php echo $n; ?>"></td>
            </tr>
            <tr>
                <td>Nhập m: </td>
                <td><input type="text" name="m" value="<?php echo $m; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Hiển thị"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <textarea cols="50" rows="10"><?php
                            
                        echo $hienThi;
                        
                    ?></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2"><?php echo $err; ?></td>
            </tr>
        </table>
    </form>

</body>
</html>