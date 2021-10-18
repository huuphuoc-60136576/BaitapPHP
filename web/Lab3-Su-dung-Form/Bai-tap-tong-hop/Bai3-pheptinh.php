<?php
    // Start the session
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Phép tính trên 2 số</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    
    <?php
        $phepTinh = "";
        $soThuNhat = "";
        $soThuHai = "";

        $phepTinhErr = "";
        $soThuNhatErr = "";
        $soThuHaiErr = "";

        $err = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $phepTinh = $_POST['phepTinh'] ?? "";
            $soThuNhat = $_POST['soThuNhat'];
            $soThuHai = $_POST['soThuHai'];

            if (empty($phepTinh)) {
                $phepTinhErr = "Vui lòng chọn phép tính!";
                $err[] = $phepTinhErr;
            }

            if (!is_numeric($soThuNhat)) {
                $soThuNhatErr = "Vui lòng nhập số!";
                $err[] = $soThuNhatErr;
            }

            if (!is_numeric($soThuHai)) {
                $soThuHaiErr = "Vui lòng nhập số!";
                $err[] = $soThuHaiErr;
            }

            if (empty($err)) {
                $_SESSION['phepTinh'] = $phepTinh;
                $_SESSION['soThuNhat'] = $soThuNhat;
                $_SESSION['soThuHai'] = $soThuHai;

                header("Location: bai3-ketquapheptinh.php");
            }
        }
    ?>

    <form action="" method="post">
        <table>
            <caption>PHÉP TÍNH TRÊN HAI SỐ</caption>
            <tr>
                <td>Chọn phép tính: </td>
                <td>
                    <input type="radio" name="phepTinh" value="Cộng" 
                        <?php if (isset($_POST['phepTinh']) && $_POST['phepTinh'] == "Cộng") echo "checked"; ?>> Cộng
                    <input type="radio" name="phepTinh" value="Trừ"
                        <?php if (isset($_POST['phepTinh']) && $_POST['phepTinh'] == "Trừ") echo "checked";?> > Trừ
                    <input type="radio" name="phepTinh" value="Nhân"
                        <?php if (isset($_POST['phepTinh']) && $_POST['phepTinh'] == "Nhân") echo "checked"; ?>> Nhân
                    <input type="radio" name="phepTinh" value="Chia"
                        <?php if (isset($_POST['phepTinh']) && $_POST['phepTinh'] == "Chia") echo "checked"; ?>> Chia
                </td>
                <td>
                    <span class="error"><?php echo $phepTinhErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>Số thứ nhất: </td>
                <td>
                    <input type="text" name="soThuNhat" value="<?php echo $soThuNhat; ?>">
                </td>
                <td>
                    <span class="error"><?php echo $soThuNhatErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>Số thứ hai: </td>
                <td>
                    <input type="text" name="soThuHai" value="<?php echo $soThuHai; ?>">
                </td>
                <td>
                    <span class="error"><?php echo $soThuHaiErr; ?></span>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Tính">
                </td>
            </tr>
        </table>
    </form>

</body>
</html>