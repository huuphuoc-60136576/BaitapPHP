<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xử lý thông tin</title>
</head>
<body>
    <?php
        $hoTen = $_POST['hoTen'];
        $diaChi = $_POST['diaChi'];
        $soDienThoai = $_POST['soDienThoai'];
        $gioiTinh = $_POST['gioiTinh'];
        $quocTich = $_POST['quocTich'];
        
        $phpMySQL = $_POST['php-mySQL'] ?? "";
        $cSharp = $_POST['Csharp'] ?? "";
        $xml = $_POST['XML'] ?? "";
        $python = $_POST['Python'] ?? "";

        $ghiChu = $_POST['ghiChu'];
    ?>

    <h4>Bạn đã đăng nhập thành công, dưới đây là những thông tin bạn nhập:</h4>
    <p>Họ tên: <?php echo $hoTen ?></p>
    <p>Giới tính: <?php echo $gioiTinh ?></p>
    <p>Địa chỉ: <?php echo $diaChi ?></p>
    <p>Điện thoại: <?php echo $soDienThoai ?></p>
    <p>Quốc tịch: <?php echo $quocTich ?></p>
    <p>Môn học: <?php echo $phpMySQL . " " . $cSharp . " " . $xml . " " . $python?></p>
    <p>Ghi chú: <?php echo $ghiChu ?></p>
    <td><a href="javascript:window.history.back(-1);">Trở về trang trước</a></td>
</body>
</html>