<!DOCTYPE html>
<html>
<head>
    <title>Nhận thông tin</title>
</head>
<body>
    <p><strong>Bạn đã đăng nhập thành công, dưới đây là những thông tin bạn nhập:</strong></p>

    <?php
        $hoTen = $_POST['hoTen'];
        $gioiTinh = $_POST['gioiTinh'];
        $diaChi = $_POST['diaChi'];
        $dienThoai = $_POST['soDienThoai'];
        $quocTich = $_POST['quocTich'];
        $monHoc = $_POST['monHoc'];
        $ghiChu = $_POST['ghiChu'];

        echo "Họ tên: " . $hoTen ."<br>";
        echo "Giới tính: " . $gioiTinh . "<br>";
        echo "Địa chỉ: " . $diaChi . "<br>";
        echo "Điện thoại: " . $dienThoai . "<br>";
        echo "Quốc tịch: " . $quocTich . "<br>";
        echo "Môn học: " . implode(", ", $monHoc) . "<br>";
        echo "Ghi chú: " . $ghiChu;
    ?>

    
</body>
</html>