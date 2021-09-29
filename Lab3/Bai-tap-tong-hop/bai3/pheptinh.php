<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phép tính</title>

    <link rel="stylesheet" href="bai3.css">
</head>
<body>
    <?php
        session_start();
        $soThuNhat = $soThuHai = "";
        $error = $pheTinhErr = "";
        
        $check = 0;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['phepTinh'])) {
                $_SESSION['phepTinh'] = $_POST['phepTinh'];
            } else {
                $pheTinhErr = "Vui lòng chọn phép tính!";
            }
            
            if (isset($_POST['soThuNhat']) && is_numeric($_POST['soThuNhat'])) {
                $soThuNhat = $_POST['soThuNhat'];
                $_SESSION['soThuNhat'] = $_POST['soThuNhat'];
            } else {
                $check = 1;
                $error = "Vui lòng nhập số!";
            }

            if (isset($_POST['soThuHai']) && is_numeric($_POST['soThuHai'])) {
                $soThuHai = $_POST['soThuHai'];
                $_SESSION['soThuHai'] = $_POST['soThuHai'];
            } else {
                $check = 1;
                $error = "Vui lòng nhập số!";
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $check == 0) {
            header('Location: ketquapheptinh.php');
            exit;
        }
    ?>

    <h3>PHÉP TÍNH TRÊN HAI SỐ</h3>
    <form action="pheptinh.php" name="mayTinh" method="post">
        <table>
            <tr>
                <td class="phepTinh">Chọn phép tính: </td>
            <td>
                <input type="radio" name="phepTinh" value="+" 
                    <?php if (isset($_POST['phepTinh']) && $_POST['phepTinh'] == '+') echo "checked"; else echo "" ?>> Cộng
                <input type="radio" name="phepTinh" value="-" 
                    <?php if (isset($_POST['phepTinh']) && $_POST['phepTinh'] == '-') echo "checked"; else echo "" ?>> Trừ
                <input type="radio" name="phepTinh" value="*" 
                    <?php if (isset($_POST['phepTinh']) && $_POST['phepTinh'] == '*') echo "checked"; else echo "" ?>> Nhân
                <input type="radio" name="phepTinh" value="/" 
                    <?php if (isset($_POST['phepTinh']) && $_POST['phepTinh'] == '/') echo "checked"; else echo "" ?>> Chia
            </td>
            <tr>
                <td><span class="error"><?php echo $pheTinhErr; ?></span></td>
            </tr>
            </tr>
            <tr>
                <td class="info">Số thứ nhất: </td>
                <td>
                    <input type="text" name="soThuNhat" value="<?php echo $soThuNhat; ?>">
                </td>
            </tr>
            <tr>
                <td class="info">Số thứ nhì: </td>
                <td>
                    <input type="text" name="soThuHai" value="<?php echo $soThuHai; ?>">
                </td>
            </tr>
            <tr>
                <td><span class="error"><?php echo $error; ?></span></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tính"></td>
            </tr>
        </table>
    </form>
</body>
</html>