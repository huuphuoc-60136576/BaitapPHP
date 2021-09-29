<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính tiền điện</title>

    <link rel="stylesheet" href="bai2.css" />
</head>
<body>
    <?php
        $tenChuHo = "";
        $chiSoCu = $chiSoMoi = "";
        $donGia = 20000;
        $soTienThanhToan = "";

        $tenChuHoErr = $numberErr = "";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['tenChuHo']) && $_POST['tenChuHo'] != "") {
                $tenChuHo = $_POST['tenChuHo'];
            } else {
                $tenChuHo = "";
                $tenChuHoErr = "Vui lòng nhập tên chủ hộ!";
            }

            if (isset($_POST['chiSoCu'])) {
                $chiSoCu = $_POST['chiSoCu'];
            } else {
                $chiSoCu = "";
            }

            if (isset($_POST['chiSoMoi'])) {
                $chiSoMoi = $_POST['chiSoMoi'];
            } else {
                $chiSoMoi = "";
            }

            if (isset($_POST['donGia'])) {
                $donGia = $_POST['donGia'];
            } else {
                $donGia = 20000;
            }

            if (is_numeric($chiSoCu) && is_numeric($chiSoMoi)) {
                $soTienThanhToan = ($chiSoMoi - $chiSoCu) * $donGia;
            } else {
                $soTienThanhToan = "";
                $numberErr = "Vui lòng nhập số!";
            }
        }
    ?>

    <form action="bai2_tinh-tien-dien.php" name="tinhTienDien" method="post">
        <table>
            <caption>THANH TOÁN TIỀN ĐIỆN</caption>
            <tbody>
                <tr>
                    <td class="info">Tên chủ hộ: </td>
                    <td>
                        <input type="text" name="tenChuHo" 
                            value="<?php echo $tenChuHo; ?>">
                        <span class="error"><?php echo $tenChuHoErr; ?></span>
                    </td>
                </tr>
                <tr>
                    <td class="info">Chỉ số cũ: </td>
                    <td>
                        <input type="text" name="chiSoCu" 
                            value="<?php echo $chiSoCu; ?>"> <span class="donVi">(Kw)</span>
                    </td>
                </tr>
                <tr>
                    <td class="info">Chỉ số mới: </td>
                    <td>
                        <input type="text" name="chiSoMoi" 
                            value="<?php echo $chiSoMoi; ?>"> <span class="donVi">(Kw)</span>
                    </td>
                </tr>
                <tr>
                    <td class="info">Đơn giá: </td>
                    <td>
                        <input type="text" name="donGia" 
                            value="<?php echo $donGia; ?>"> <span class="donVi">(VNĐ)</span>
                    </td>
                </tr>
                <tr>
                    <td class="info">Số tiền thanh toán: </td>
                    <td>
                        <input type="text" name="soTienThanhToan" disabled 
                            value="<?php echo $soTienThanhToan ?>"> <span class="donVi">(VNĐ)</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><span class="error"><?php echo $numberErr ?></span></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Tính"></td>
                </tr>
            </tbody>
        </table>
    </form>
</body>
</html>