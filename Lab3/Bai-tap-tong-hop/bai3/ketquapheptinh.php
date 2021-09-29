<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả phép tính</title>

    <link rel="stylesheet" href="bai3.css">
</head>
<body>
    <?php
        session_start();

        $phepTinh = $_SESSION['phepTinh'];
        $soThuNhat = $_SESSION['soThuNhat'];
        $soThuHai = $_SESSION['soThuHai'];

        switch ($phepTinh) {
            case '+':
                $ketQua = $soThuNhat + $soThuHai;
                $hienThi = 'Cộng';
                break;
            case '-':
                $ketQua = $soThuNhat - $soThuHai;
                $hienThi = 'Trừ';
                break;
            case '*':
                $ketQua = $soThuNhat * $soThuHai;
                $hienThi = 'Nhân';
                break;
            case '/':
                $ketQua = $soThuNhat / $soThuHai;
                $hienThi = 'Chia';
                break;
            default:
                
                break;
        }
    ?>

    <h3>PHÉP TÍNH TRÊN HAI SỐ</h3>
    <form name="ketQuaPhepTinh">
        <table>
            <tr>
                <td class="phepTinh">Chọn phép tính: </td>
                <td class="hienThi"><?php echo $hienThi; ?></td>
            </tr>
            <tr>
                <td class="info">Số 1: </td>
                <td>
                    <input type="text" name="soThuNhat" value="<?php echo $soThuNhat; ?>">
                </td>
            </tr>
            <tr>
                <td class="info">Số 2: </td>
                <td>
                    <input type="text" name="soThuHai" value="<?php echo $soThuHai; ?>">
                </td>
            </tr>
            <tr>
                <td class="info">Kết quả: </td>
                <td>
                    <input type="text" value="<?php echo $ketQua; ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td><a href="javascript:window.history.back(-1);">Trở về trang trước</a></td>
            </tr>
        </table>
    </form>
</body>
</html>