<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiểm tra giữa kỳ</title>

    <style>
        h3 {
            text-align: center;
        }

        .error {
            color: red;
        }

        .xemSinhVien {
            text-align: center;
        }
    </style>
</head>
<body>
    
    <?php
        $dsSinhVien = array(
            "60136576" => array(
                'hoTen' => "Lê Hữu Phước", 
                'ngaySinh' => "09-01-2000", 
                'gioiTinh' => "Nam", 
                'diaChi' => "132/Lưu Hữu Phước", 
                'sdt' => "0794508947", 
                'lop' => "60.CNTT-1"),
            "60135123" => array(
                'hoTen' => "Ngô Xuân Huy", 
                'ngaySinh' => "11-11-2000", 
                'gioiTinh' => "Nam", 
                'diaChi' => "Số 6 Trần Phú", 
                'sdt' => "0123999999", 
                'lop' => "60.CNTT-2"),
            "60137456" => array(
                'hoTen' => "Võ Bá Toàn", 
                'ngaySinh' => "10-10-2000", 
                'gioiTinh' => "Nam", 
                'diaChi' => "190 Võ Văn Ký", 
                'sdt' => "0123789654", 
                'lop' => "60.CNTT-3"),
            "60139789" => array(
                'hoTen' => "Phạm Thị Út Linh", 
                'ngaySinh' => "09-09-2000", 
                'gioiTinh' => "Nữ", 
                'diaChi' => "Số 7 Lý Thường Kiệt", 
                'sdt' => "0912354", 
                'lop' => "60.CNTT-1"),
        );
    

        $_SESSION['sinhVien'] = $_SESSION['sinhVien'] ?? $dsSinhVien;

        $mssv = "";
        $hoTen = "";
        $ngaySinh = "";
        $gioiTinh = "";
        $diaChi = "";
        $lop = "";

        $err = array();

        $mssvErr = $hoTenErr = $ngaySinhErr = $gioiTinhErr = $diaChiErr = $lopErr = "";



        if (isset($_POST['nhapThongTin'])) {
            $mssv = $_POST['mssv'];
            $hoTen = $_POST['hoTen'];
            $ngaySinh = $_POST['ngaySinh'];
            $gioiTinh = $_POST['gioiTinh'] ?? "";
            $diaChi = $_POST['diaChi'];
            $lop = $_POST['lop'];

            if (empty($mssv)) {
                $mssvErr = "Vui lòng nhập mã số sinh viên!";
                $err[] = $mssvErr;
            }

            if (empty($hoTen)) {
                $hoTenErr = "Vui lòng nhập họ tên sinh viên!";
                $err[] = $hoTenErr;
            }

            if (empty($ngaySinh)) {
                $ngaySinhErr = "Vui lòng nhập ngày sinh viên!";
                $err[] = $ngaySinhErr;
            }

            if (empty($gioiTinh)) {
                $gioiTinhErr = "Vui lòng chọn giới tính sinh viên!";
                $err[] = $gioiTinhErr;
            }

            if (empty($diaChi)) {
                $diaChiErr = "Vui lòng nhập địa chỉ sinh viên!";
                $err[] = $diaChiErr;
            }

            if (empty($lop)) {
                $lopErr = "Vui lòng nhập lớp sinh viên!";
                $err[] = $lopErr;
            }

            if (empty($err)) {
                $dsSinhVien[$mssv] = array($hoTen, $ngaySinh, $gioiTinh, $diaChi, $lop);

                $_SESSION['sinhVien'][$mssv] = [
                    'hoTen' => $hoTen,
                    'ngaySinh' => $ngaySinh,
                    'gioiTinh' => $gioiTinh,
                    'diaChi' => $diaChi,
                    'lop' => $lop
                ];
            }

        }
        
        // session_unset();
        // session_destroy();

        $dsSinhVien = $_SESSION['sinhVien'];
        $sinhVien = array(
                'hoTen' => "", 
                'ngaySinh' => "", 
                'gioiTinh' => "", 
                'diaChi' => "", 
                'sdt' => "", 
                'lop' => "  ");
        $chonMaSV = "";

        if (isset($_POST['xemThongTin'])) {
            $chonMaSV = $_POST['chonMaSV'];
            $sinhVien = $dsSinhVien[$chonMaSV];

            // var_dump($sinhVien);
        }

    ?>

    <form action="" method="post">
        <table>
            <caption>NHẬP THÔNG TIN SINH VIÊN</caption>
            <tr>
                <td>Mã số sinh viên: </td>
                <td>
                    <input type="text" name="mssv" value="<?php echo $mssv; ?>">
                </td>
                <td>
                    <span class="error"><?php echo $mssvErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>Họ tên: </td>
                <td>
                    <input type="text" name="hoTen" value="<?php echo $hoTen; ?>">
                </td>
                <td>
                    <span class="error"><?php echo $hoTenErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>Ngày sinh: </td>
                <td>
                    <input type="date" name="ngaySinh" value="<?php echo $ngaySinh; ?>">
                </td>
                <td>
                    <span class="error"><?php echo $ngaySinhErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>Giới tính: </td>
                <td>
                    <input type="radio" name="gioiTinh" value="Nam" 
                        <?php if (isset($_POST['gioiTinh']) && $_POST['gioiTinh'] == "Nam") echo "checked"; ?>> Nam
                    <input type="radio" name="gioiTinh" value="Nữ" 
                        <?php if (isset($_POST['gioiTinh']) && $_POST['gioiTinh'] == "Nữ") echo "checked"; ?>> Nữ
                </td>
                <td>
                    <span class="error"><?php echo $gioiTinhErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>Địa chỉ: </td>
                <td>
                    <input type="text" name="diaChi" value="<?php echo $diaChi; ?>">
                </td>
                <td>
                    <span class="error"><?php echo $diaChiErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>Lớp: </td>
                <td>
                    <input type="text" name="lop" value="<?php echo $lop; ?>">
                </td>
                <td>
                    <span class="error"><?php echo $lopErr; ?></span>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="nhapThongTin" value="Nhập thông tin">
                </td>
            </tr>
        </table>
    </form>


    <h3>HIỂN THỊ THÔNG TIN SINH VIÊN</h3>
    <form action="" method="post">
        <div class="xemSinhVien">
            <label>Chọn mã số sinh viên: </label>

            <select name="chonMaSV">
                <?php
                    foreach ($dsSinhVien as $key => $value) {
                        echo "<option value='$key'> $key </option>";
                    }
                ?>
            </select>

            <input type="submit" name="xemThongTin" value="Xem thông tin">
        </div>
    </form>
    <fieldset>
        <legend>Thông tin sinh viên</legend>
        <table>
            <tr>
                <td>Mã số SV: </td>
                <td><input type="text" readonly value="<?php echo $chonMaSV; ?>"></td>
                <td>Họ tên: </td>
                <td><input type="text" value="<?php echo $sinhVien['hoTen']; ?>"></td>
            </tr>
            <tr>
                <td>Giới tính: </td>
                <td><input type="text" readonly value="<?php echo $sinhVien['gioiTinh']; ?>"></td>
                <td>Lớp: </td>
                <td><input type="text" readonly value="<?php echo $sinhVien['lop'] ?>"></td>
            </tr>
            <tr>
                <td>Ngày sinh: </td>
                <td><input type="text" readonly value="<?php echo $sinhVien['ngaySinh']; ?>"></td>
                <td>Địa chỉ: </td>
                <td><input type="text" readonly value="<?php echo $sinhVien['diaChi'];?>"></td>
            </tr>
        </table>
    </fieldset> 
</body>
</html>