<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xổ số kiến thiết</title>

    <style>
        input {
            width: 3rem;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    
    <?php
        // Cái giải xổ sổ
        // giải tám 1 số:
        $giaiTam = isset($_POST['giaiTam']) ? $_POST['giaiTam'] : xuLySo(2);
        
        // giải bảy 1 số:
        $giaiBay = isset($_POST['giaiBay']) ? $_POST['giaiBay'] : xuLySo(3);
       
        // giải sáu 3 số:
        $giaiSau = array();
        for ($i=1; $i <= 3; $i++) { 
            $giaiSau[$i] = isset($_POST["giaiSau$i"]) ? $_POST["giaiSau$i"] : xuLySo(4);
        }
        
        // giải năm 1 số:
        $giaiNam = isset($_POST['giaiNam']) ? $_POST['giaiNam'] : xuLySo(4);

        // giải bốn 7 số:
        $giaiBon = array();
        for ($i=1; $i <= 7; $i++) { 
            $giaiBon[$i] = isset($_POST["giaiBon$i"]) ? $_POST["giaiBon$i"] : xuLySo(5);
        }

        // giải ba 2 số:
        $giaiBa = array();
        for ($i=1; $i <= 2; $i++) { 
            $giaiBa[$i] = isset($_POST["giaiBa$i"]) ? $_POST["giaiBa$i"] : xuLySo(5);
        }

        // giải hai có 1 số:
        $giaiHai = isset($_POST['giaiHai']) ? $_POST['giaiHai'] : xuLySo(5);

        // giải nhất có 1 số:
        $giaiNhat = isset($_POST['giaiNhat']) ? $_POST['giaiNhat'] : xuLySo(5);

        // giải đặc biệt có 1 số:
        $giaiDacBiet = isset($_POST['giaiDacBiet']) ? $_POST['giaiDacBiet'] : xuLySo(6);

        // thêm số 0 vào trước
        function xuLySo($soChuSo) {
            $gioiHanCuaGiai = pow(10, $soChuSo) - 1;
            $giaTri = rand(0, $gioiHanCuaGiai);
            $xuLy = substr(str_repeat(0, $soChuSo) . $giaTri, -$soChuSo);

            return $xuLy;
        }    
    ?>

    <!-- Xử lý trúng giải -->
    <?php
        $soDo = "";
        $thongBaoTrungGiai = array();

        $err = array();
        $deTrongErr = "";

        if (isset($_POST['doSo'])) {
            $soDo = $_POST['soDo'];

            if (empty($soDo)) {
                $deTrongErr = "Vui lòng nhập số vào để dò!";
                $err[] = $deTrongErr;
            }

            if (empty($err)) {
                $haiChuSo = substr($soDo, -2);
                $baChuSo = substr($soDo, -3);
                $bonChuSo = substr($soDo, -4);
                $namChuSo = substr($soDo, -5);

                if ($haiChuSo == $giaiTam) {
                    $thongBaoTrungGiai[] = "Chúc mừng bạn đã trúng giải tám!<br>";
                }

                if ($baChuSo == $giaiBay) {
                    $thongBaoTrungGiai[] = "Chúc mừng bạn đã trúng giải bảy!<br>";
                }

                foreach ($giaiSau as $so) {
                    if ($bonChuSo == $so) {
                        $thongBaoTrungGiai[] = "Chúc mừng bạn đã trúng giải sáu!<br>";
                        break;
                    }
                }

                if ($bonChuSo == $giaiNam) {
                    $thongBaoTrungGiai[] = "Chúc mừng bạn đã trúng giải năm!<br>";
                }

                foreach ($giaiBon as $so) {
                    if ($namChuSo == $so) {
                        $thongBaoTrungGiai[] = "Chúc mừng bạn đã trúng giải bốn!<br>";
                        break;
                    }
                }

                foreach ($giaiBa as $so) {
                    if ($namChuSo == $so) {
                        $thongBaoTrungGiai[] = "Chúc mừng bạn đã trúng giải ba!<br>";
                        break;
                    }
                }

                if ($namChuSo == $giaiHai) {
                    $thongBaoTrungGiai[] = "Chúc mừng bạn đã trúng giải hai!<br>";
                }

                if ($namChuSo == $giaiNhat) {
                    $thongBaoTrungGiai[] = "Chúc mừng bạn đã trúng giải nhất!<br>";
                }

                if ($soDo == $giaiDacBiet) {
                    $thongBaoTrungGiai[] = "Chúc mừng bạn đã trúng giải đặc biệt!<br>";
                }
            }
        }
    ?>

    <form action="" name="xoSo" method="post">
        <table>
            <caption>XỔ SỐ KHÁNH HÒA</caption>
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
                    <input type="text" name="giaiSau1" readonly value="<?php echo $giaiSau[1]; ?>">
                    <input type="text" name="giaiSau2" readonly value="<?php echo $giaiSau[2]; ?>">
                    <input type="text" name="giaiSau3" readonly value="<?php echo $giaiSau[3]; ?>">
                </td>
            </tr>
            <tr>
                <td>Giải năm: </td>
                <td>
                    <input type="text" name="giaiNam" readonly value="<?php echo $giaiNam; ?>">
                </td>
            </tr>
            <tr>
                <td>Giải bốn: </td>
                <td>
                    <input type="text" name="giaiBon1" readonly value="<?php echo $giaiBon[1] ?>">
                    <input type="text" name="giaiBon2" readonly value="<?php echo $giaiBon[2] ?>">
                    <input type="text" name="giaiBon3" readonly value="<?php echo $giaiBon[3] ?>">
                    <input type="text" name="giaiBon4" readonly value="<?php echo $giaiBon[4] ?>">
                    <input type="text" name="giaiBon5" readonly value="<?php echo $giaiBon[5] ?>">
                    <input type="text" name="giaiBon6" readonly value="<?php echo $giaiBon[6] ?>">
                    <input type="text" name="giaiBon7" readonly value="<?php echo $giaiBon[7] ?>">
                </td>
            </tr>
            <tr>
                <td>Giải ba: </td>
                <td>
                    <input type="text" name="giaiBa1" readonly value="<?php echo $giaiBa[1] ?>">
                    <input type="text" name="giaiBa2" readonly value="<?php echo $giaiBa[2] ?>">
                </td>
            </tr>
            <tr>
                <td>Giải hai: </td>
                <td>
                    <input type="text" name="giaiHai" readonly value="<?php echo $giaiHai; ?>">
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
            <tr>
                <td>Nhập số dò: </td>
                <td>
                    <input type="text" name="soDo" value="<?php echo $soDo; ?>"> <input type="submit" name="doSo" value="Dò số">
                </td>
            </tr>
        </table>
    </form>
    
    <span class="error">
        <?php echo $deTrongErr; ?>
    </span>

    <?php
        foreach ($thongBaoTrungGiai as $thongBao) {
            echo $thongBao;
        }
    ?>
</body>
</html>