<!DOCTYPE html>
<html>
<head>

    <style>
        table, th, td {
            border: 0.5px solid black;
            border-collapse: collapse;
        }

        th {
            color: red;
            padding: 5px;
        }
    </style>

</head>
<body>
    <?php
        $dsMatHang = array();

        // Lấy danh sách từ file đưa vào mảng
        $path = 'dsMatHang.txt';

        $fp = @fopen($path, "r");
        
        if (!$fp) {
            echo "Mở file không thành công!";
        } else {
            // lập qua từng dòng để đọc
            while (!feof($fp)) {
                $thongTinSanPham = fgets($fp);
                $temp = explode(", ", $thongTinSanPham);

                $dsMatHang[$temp[0]] = array($temp[1], $temp[2], $temp[3]);
            }

            fclose($fp);
        }


        //-----
        $maMatHangMoi = $tenMatHang = $donViTinh = $soLuong = "";

        $thongTinErr = "";
        $maSanPhamErr = "";
        $err = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $maMatHangMoi = $_POST['maMatHang'];
            $tenMatHang = $_POST['tenMatHang'];
            $donViTinh = $_POST['donViTinh'];
            $soLuong = $_POST['soLuong'];

            if (empty($_POST['maMatHang']) || empty($_POST['tenMatHang']) || empty($_POST['donViTinh']) || empty($_POST['soLuong'])) {
                $thongTinErr = "Bạn hãy nhập đầy đủ thông tin!";
                $err[] = $thongTinErr;
            }
            
            foreach ($dsMatHang as $key => $value) {
                if ($maMatHangMoi == $key) {
                    $maSanPhamErr = "Mã sản phẩm này đã tồn tại!";
                    $err[] = $maSanPhamErr;
                }
            }

            // Thêm sản phẩm vào danh sách
            if (empty($err)) {
                $dsMatHang[$maMatHangMoi] = array($tenMatHang, $donViTinh, $soLuong);

                // Ghi vào file
                $fp = @fopen($path, 'a+');

                // Kiểm tra mở file
                if (!$fp) {
                    echo "Mở file không thành công!";
                } else {
                    $matHangMoi = "\n". $maMatHangMoi . ", " . $tenMatHang . ", " . $donViTinh . ", " . $soLuong;

                    // Ghi file
                    fwrite($fp, $matHangMoi);
                    // Đóng file
                    fclose($fp);
                }
            }
        }
    ?>

    <table>
        <tr>
            <th>Mã mặt hàng </th>
            <th>Tên mặt hàng </th>
            <th>Đơn vị tính </th>
            <th>Số lượng </th>
        </tr>
        <tr>
            <?php
                foreach ($dsMatHang as $maMatHang => $matHang) {
                    echo "<tr>";
                    echo "<td>$maMatHang</td>";
                    foreach ($matHang as $thongTin) {
                        echo "<td>$thongTin</td>";   
                    }
                    echo "</tr>";
                }
            ?>
        </tr>
    </table>
    <br>
    <form action="Bai5-quan-ly-thong-tin-mat-hang.php" method="post">
        <table>
            <tr>
                <td>Mã mặt hàng: </td>
                <td><input type="text" name="maMatHang" value="<?php echo $maMatHangMoi; ?>"></td>
            </tr>
            <tr>
                <td>Tên mặt hàng: </td>
                <td><input type="text" name="tenMatHang" value="<?php echo $tenMatHang; ?>"></td>
            </tr>
            <tr>
                <td>Đơn vị tính: </td>
                <td><input type="text" name="donViTinh" value="<?php echo $donViTinh; ?>"></td>
            </tr>
            <tr>
                <td>Số lượng: </td>
                <td><input type="text" name="soLuong" value="<?php echo $soLuong; ?>"></td>
            </tr>
        </table>

        <input type="submit" value="Thêm">
        <p>
            <?php
                echo $thongTinErr;
                echo $maSanPhamErr;
            ?>
        </p>
    </form>

</body>
</html>