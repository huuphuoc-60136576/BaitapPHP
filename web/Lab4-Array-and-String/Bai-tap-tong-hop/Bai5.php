<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 5</title>

    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }
        th {
            color: red;
        }
        .error{
            color: red;
        }
    </style>
</head>
<body>
    
    <?php
        $dsMatHang = array(
            'A001' => array(
                'tenMatHang' => "Sửa tắm XMen",
                'donViTinh' => "Chai 50ml",
                'soLuong' => 50
            ),
            'A002' => array(
                'tenMatHang' => "Dàu gội đầu Lifeboy",
                'donViTinh' => "Chai 50ml",
                'soLuong' => 20
            ),
            'B001' => array(
                'tenMatHang' => "Dầu ăn Cái Lân",
                'donViTinh' => "Chai 1 lít",
                'soLuong' => 10
            ),
            'B002' => array(
                'tenMatHang' => "Đường cát",
                'donViTinh' => "Kg",
                'soLuong' => 15
            ),
            'C001' => array(
                'tenMatHang' => "Chén sứ Minh Long",
                'donViTinh' => "Bộ 10 cái",
                'soLuong' => 2
            ),
        );

        $_SESSION['dsMatHang'] = $_SESSION['dsMatHang'] ?? $dsMatHang;

        // echo "<pre>";
        // var_dump($_SESSION['dsMatHang']);
        // echo "</pre>";

        // session_unset();
        // session_destroy();

        // Xử lý dự liệu post lên 
        $maMatHangMoi = $tenMatHang = $donViTinh = $soLuong = "";

        $err = array();

        $maDaTonTaiErr = "";
        $deTrongErr = "";
    
        if (isset($_POST['themMatHang'])) {
            $maMatHangMoi = $_POST['maMatHang'];
            $tenMatHang = $_POST['tenMatHang'];
            $donViTinh = $_POST['donViTinh'];
            $soLuong = $_POST['soLuong'];

            if (empty($maMatHangMoi) || empty($tenMatHang) || empty($donViTinh) || empty($soLuong)) {
                $deTrongErr = "Vui lòng nhập đầy đủ thông tin mặt hàng!<br>";
                $err[] = $deTrongErr;
            }

            foreach ($_SESSION['dsMatHang'] as $key => $value) {
                if ($maMatHangMoi == $key) {
                    $maDaTonTaiErr = "Mã này đã tồn tại trong danh sách!<br>";
                    $err[] = $maDaTonTaiErr;
                    break;
                }
            }

            if (empty($err)) {
                $_SESSION['dsMatHang'][$maMatHangMoi] = [
                    'tenMatHang' => $tenMatHang,
                    'donViTinh' => $donViTinh,
                    'soLuong' => $soLuong
                ];
               
            }
        }

        // Lấy lại danh sách mới từ session
        $dsMatHang = $_SESSION['dsMatHang'];
    ?>

    <table>
        <tr>
            <th>Mã mặt hàng</th>
            <th>Tên mặt hàng</th>
            <th>Đơn vị tính</th>
            <th>Số lượng</th>
        </tr>

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
    </table>

    <br>
    <form action="" name="nhapThongTinMatHang" method="post">
        <table>
            <caption>NHẬP THÔNG TIN MẶT HÀNG</caption>
            <tr>
                <td>Mã mặt hàng: </td>
                <td>
                    <input type="text" name="maMatHang" value="<?php echo $maMatHangMoi; ?>">
                </td>
            </tr>
            <tr>
                <td>Tên mặt hàng: </td>
                <td>
                    <input type="text" name="tenMatHang" value="<?php echo $tenMatHang; ?>">
                </td>
            </tr>
            <tr>
                <td>Đơn vị tính</td>
                <td>
                    <input type="text" name="donViTinh" value="<?php echo $donViTinh; ?>">
                </td>
            </tr>
            <tr>
                <td>Số lượng: </td>
                <td>
                    <input type="text" name="soLuong" value="<?php echo $soLuong; ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="themMatHang" value="Thêm">
                </td>
            </tr>
        </table>
    </form>

    <span class="error">
        <?php
            echo $deTrongErr;
            echo $maDaTonTaiErr;
        ?>
    </span>

</body>
</html>