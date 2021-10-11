<!DOCTYPE html>
<html>
<head>
    <title>Bài 3: Bài toán xổ số kiến thiết</title>

    <style>
        input {
            width: 5rem;
        }
    </style>
</head>
<body>

    <?php
        $giaiTam = isset($_POST['giaiTam']) ? $_POST['giaiTam'] : xoSoNgauNhien(2);
        $giaiBay = isset($_POST['giaiBay']) ? $_POST['giaiBay'] : xoSoNgauNhien(3);
        $giaiSau1 = isset($_POST['giaiSau1']) ? $_POST['giaiSau1'] : xoSoNgauNhien(4);
        $giaiSau2 = isset($_POST['giaiSau2']) ? $_POST['giaiSau2'] : xoSoNgauNhien(4);
        $giaiSau3 = isset($_POST['giaiSau3']) ? $_POST['giaiSau3'] : xoSoNgauNhien(4);
        $giaiNam = isset($_POST['giaiNam']) ? $_POST['giaiNam'] : xoSoNgauNhien(4);
        $giaiTu1 = isset($_POST['giaiTu1']) ? $_POST['giaiTu1'] : xoSoNgauNhien(5);
        $giaiTu2 = isset($_POST['giaiTu2']) ? $_POST['giaiTu2'] : xoSoNgauNhien(5);
        $giaiTu3 = isset($_POST['giaiTu3']) ? $_POST['giaiTu3'] : xoSoNgauNhien(5);
        $giaiTu4 = isset($_POST['giaiTu4']) ? $_POST['giaiTu4'] : xoSoNgauNhien(5);
        $giaiTu5 = isset($_POST['giaiTu5']) ? $_POST['giaiTu5'] : xoSoNgauNhien(5);
        $giaiTu6 = isset($_POST['giaiTu6']) ? $_POST['giaiTu6'] : xoSoNgauNhien(5);
        $giaiTu7 = isset($_POST['giaiTu7']) ? $_POST['giaiTu7'] : xoSoNgauNhien(5);
        $giaiBa1 = isset($_POST['giaiBa1']) ? $_POST['giaiBa1'] : xoSoNgauNhien(5);
        $giaiBa2 = isset($_POST['giaiBa2']) ? $_POST['giaiBa2'] : xoSoNgauNhien(5);
        $giaiHai = isset($_POST['giaiHai']) ? $_POST['giaiHai'] : xoSoNgauNhien(5);
        $giaiNhat = isset($_POST['giaiNhat']) ? $_POST['giaiNhat'] : xoSoNgauNhien(5);
        $giaiDacBiet = isset($_POST['giaiDacBiet']) ? $_POST['giaiDacBiet'] : xoSoNgauNhien(6);



        $soDo = "";
        $ketQua = "";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $soDo = $_POST['soDo']; 

            // Tờ vé số có 6 chữ số
            // Dò số thì ta dò ngược lại nên đi từ cuối lên
            $haiChuSo = substr($soDo, -2);
            $baChuSo = substr($soDo, -3);
            $bonChuSo = substr($soDo, -4);
            $namChuSo = substr($soDo, -5);

            if ($haiChuSo == $giaiTam) {
                $ketQua = "Chúc mừng, bạn đã trúng giải tám!" . "<br>";
            }

            if ($baChuSo == $giaiBay) {
                $ketQua .= "Chúc mừng, bạn đã trúng giải bảy!" . "<br>";
            }

            if ($bonChuSo == $giaiSau1 || $bonChuSo == $giaiSau2 || $bonChuSo == $giaiSau3) {
                $ketQua .= "Chúc mừng, bạn đã trúng giải sáu!" . "<br>";
            }

            if ($bonChuSo == $giaiNam) {
                $ketQua .= "Chúc mừng, bạn đã trúng giải năm!" . "<br>";
            }

            for ($i=1; $i <= 7; $i++) { 
                $tam = "giaiTu".$i;
                // $$tam là giải thứ $i
                if ($namChuSo == $$tam) {
                    $ketQua .= "Chúc mừng, bạn đã trúng giải tư!" . "<br>";
                    break;
                }
            }

            if ($namChuSo == $giaiBa1 || $namChuSo == $giaiBa2) {
                $ketQua .= "Chúc mừng, bạn đã trúng giải ba!" . "<br>";
            }

            if ($namChuSo == $giaiHai) {
                $ketQua .= "Chúc mừng, bạn đã trúng giải hai!" . "<br>";
            }

            if ($namChuSo == $giaiNhat) {
                $ketQua .= "Chúc mừng, bạn đã trúng giải nhất!" . "<br>";
            }

            if ($soDo == $giaiDacBiet) {
                $ketQua .= "Chúc mừng, bạn đã trúng giải đặc biệt!" . "<br>";
            }
        }


        // Hàm dùng để lấy số ngẫu nhiên
        function xoSoNgauNhien($soChuSo)
        {
            $gioiHanCuaGiai = pow(10, $soChuSo) - 1;
            $soNgauNhien = rand(0, $gioiHanCuaGiai);
            $soDuocChon = substr(str_repeat(0, $soChuSo) . $soNgauNhien, - $soChuSo); // cắt ngược chuỗi vào thêm các số 0 vào đầu
            return$soDuocChon;
        }
        
    ?>
    
    <form action="" method="post">
        <table>
            <tr>
                <td>Giải tám: </td>
                <td>
                    <input type="text" name="giaiTam" readonly value="<?php echo $giaiTam; ?>">
                </td>
            </tr>
            <tr>
                <td>Giải bảy: </td>
                <td>
                    <input type="text" name="giaiBay" readonly value="<?php echo $giaiBay; ?>">
                </td>
            </tr>
            <tr>
                <td>Giải sáu: </td>
                <td>
                    <input type="text" name="giaiSau1" readonly value="<?php echo $giaiSau1; ?>">
                    <input type="text" name="giaiSau2" readonly value="<?php echo $giaiSau2; ?>">
                    <input type="text" name="giaiSau3" readonly value="<?php echo $giaiSau3; ?>">
                </td>
            </tr>
            <tr>
                <td>Giải năm: </td>
                <td>
                    <input type="text" name="giaiNam" readonly value="<?php echo $giaiNam; ?>">
                </td>
            </tr>
            <tr>
                <td>Giải tư: </td>
                <td>
                    <input type="text" name="giaiTu1" readonly value="<?php echo $giaiTu1; ?>">
                    <input type="text" name="giaiTu2" readonly value="<?php echo $giaiTu2; ?>">
                    <input type="text" name="giaiTu3" readonly value="<?php echo $giaiTu3; ?>">
                    <input type="text" name="giaiTu4" readonly value="<?php echo $giaiTu4; ?>">
                    <input type="text" name="giaiTu5" readonly value="<?php echo $giaiTu5; ?>">
                    <input type="text" name="giaiTu6" readonly value="<?php echo $giaiTu6; ?>">
                    <input type="text" name="giaiTu7" readonly value="<?php echo $giaiTu7; ?>">
                </td>
            </tr>
            <tr>
                <td>Giải ba: </td>
                <td>
                    <input type="text" name="giaiBa1" readonly value="<?php echo $giaiBa1; ?>">
                    <input type="text" name="giaiBa2" readonly value="<?php echo $giaiBa2; ?>">                    
                </td>
            </tr>
            <tr>
                <td>Giải hai: </td>
                <td>
                    <input type="text" name="giaiHai" readonly value="<?php echo $giaiHai;?>">
                </td>
            </tr>
            <tr>
                <td>Giải nhất: </td>
                <td>
                    <input type="text" name="giaiNhat" readonly value="<?php echo $giaiNhat; ?>">
                </td>
            </tr>
            <tr>
                <td>Giải đặc biệt: </td>
                <td>
                    <input type="text" name="giaiDacBiet" readonly value="<?php echo $giaiDacBiet; ?>">
                </td>
            </tr>
        </table>


        <input type="text" name="soDo" value="<?php echo $soDo; ?>">        
        <input type="submit" value="Dò số">

        <span>
            <?php
                echo $ketQua;
            ?>
        </span>
    </form>

</body>
</html>