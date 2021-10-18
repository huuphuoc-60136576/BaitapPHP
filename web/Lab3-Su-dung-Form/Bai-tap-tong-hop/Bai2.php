<!DOCTYPE html>
<html>
<head>
    <title>Tính tiền điện</title>

    <style>
        .error {
            color: red;
        }
        
        .submit {
            text-align: center;
        }
        
    </style>
</head>
<body>
    
    <?php
        $tenChuHo = "";
        $chiSoCu = $chiSoMoi = "";
        $donGia = 20000;
        $soTienThanhToan = "";

        $tenChuHoErr = "";
        $chiSoCuErr = "";
        $chiSoMoiErr = "";
        $lonHonErr = "";
        $donGiaErr = "";
        $err = array();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tenChuHo = $_POST['tenChuHo'];
            $chiSoCu = $_POST['chiSoCu'];
            $chiSoMoi = $_POST['chiSoMoi'];
            $donGia = $_POST['donGia'] ?? 20000;

            if (empty($tenChuHo)) {
                $tenChuHoErr = "Vui lòng nhập tên chủ hộ!" . "<br>";
                $err[] = $tenChuHoErr;
            }

            if (!is_numeric($chiSoCu)) {
                $chiSoCuErr = "Vui lòng nhập số!";
                $err[] = $chiSoCuErr;
            }
            
            if (!is_numeric($chiSoMoi)) {
                $chiSoMoiErr = "Vui lòng nhập số!";
                $err[] = $chiSoMoiErr;
            }

            if ($chiSoCu > $chiSoMoi) {
                $lonHonErr = "Chỉ số cũ và mới có sự sai lệch!";
                $err[] = $lonHonErr;
            }

            if (!is_numeric($donGia)) {
                $donGiaErr = "Vui lòng nhập số!";
                $err[] = $donGiaErr;
            }

            // Thanh toán
            if (empty($err)) {
                $soTienThanhToan = ($chiSoMoi - $chiSoCu) * $donGia;
            }

        }
    ?>

    <form action="" name="tinhTienDien" method="post">
        <table>
            <caption>THANH TOÁN TIỀN ĐIỆN</caption>
            <tr>
                <td>Tên chủ hộ: </td>
                <td>
                    <input type="text" name="tenChuHo" value="<?php echo $tenChuHo; ?>">
                </td>
                <td></td>
                <td>
                    <span class="error"><?php echo $tenChuHoErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>Chỉ số cũ: </td>
                <td>
                    <input type="text" name="chiSoCu" value="<?php echo $chiSoCu; ?>">
                </td>
                <td>(Kw)</td>
                <td>
                    <span class="error"><?php echo $chiSoCuErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>Chỉ số mới: </td>
                <td>
                    <input type="text" name="chiSoMoi" value="<?php echo $chiSoMoi; ?>">
                </td>
                <td>(Kw)</td>
                <td>
                    <span class="error"><?php echo $chiSoMoiErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>Đơn giá: </td>
                <td>
                    <input type="text" name="donGia" value="<?php echo $donGia; ?>">
                </td>
                <td>(VNĐ)</td>
                <td>
                    <span class="error"><?php echo $donGiaErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>Số tiền thanh toán: </td>
                <td>
                    <input type="text" name="soTienThanhToan" disabled value="<?php echo $soTienThanhToan; ?>">
                </td>
                <td>(VNĐ)</td>
            </tr>
            <tr>
                <tr>
                    <td colspan="3" class="submit">
                        <input type="submit" value="Tính">
                    </td>
                </tr>
            </tr>
        </table>
    </form>

    <span class="error">
        <?php echo $lonHonErr; ?>
    </span>
</body>
</html>