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
        $dsMatHang = array(
            'A001' => array("Sữa tắm XMen", "Chai 50ml", 50),
            'A002' => array("Dầu gội đầu Lifeboy", "Chai 50ml", 20),
            'B001' => array("Dầu ăn Cái lân", "Chai 1 lít", 10),
            'B002' => array("Đường cát", "Kg", 15),
            'C001' => array("Chén sứ Minh Long", "Bộ 10 cái", 2)
        );

        $maMatHangMoi = $tenMatHang = $donViTinh = $soLuong = "";

        $err = "";
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $maMatHangMoi = $_POST['maMatHang'];
            $tenMatHang = $_POST['tenMatHang'];
            $donViTinh = $_POST['donViTinh'];
            $soLuong = $_POST['soLuong'];

            if (empty($_POST['maMatHang']) || empty($_POST['tenMatHang']) || empty($_POST['donViTinh']) || empty($_POST['soLuong'])) {
                $err = "Bạn hãy nhập đầy đủ thông tin!";

            } else {


                $dsMatHang[$maMatHangMoi] = array($tenMatHang, $donViTinh, $soLuong);
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
        <p><?php echo $err; ?></p>
    </form>

</body>
</html>