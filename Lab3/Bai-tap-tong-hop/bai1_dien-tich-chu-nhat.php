<html>
<head>
    <title>Diện tích hình chữ nhật</title>

    <style>
        div {
            background-color: #06111c;
            border: 5px solid #bb2020;
            width: 300px;
            height: 190px;
            text-align: center;
        }
        
        h3 {
            color: #ffeb4d;
        }
        
        .nut-submit {
            text-align: center;
        }

        .error {
            color: red;
        }

        .info {
            color: #BEC7C7;
        }
    </style>
</head>
<body>
    <?php
        $chieuDai = $chieuRong = 0;
        $error = "";

        if (isset($_POST['chieuDai'])){
            $chieuDai = $_POST['chieuDai'];
        }
        
        if (isset($_POST['chieuRong'])){
            $chieuRong = $_POST['chieuRong'];
        }
        
        if (is_numeric($chieuDai) && is_numeric($chieuRong)) {
            $dienTich = $chieuDai * $chieuRong;
        } else {
            $dienTich = "";
            $error = 'Vui lòng nhập số!';
        }
    ?>

    <div>
        <h3>DIỆN TÍCH HÌNH CHỮ NHẬT</h3>
        <form action="bai1_dien-tich-chu-nhat.php" name="tinhDienTich" method="POST">
            <table>
                <tr>
                    <td class="info">Chiều dài: </td>
                    <td><input type="text" name="chieuDai" value="<?php echo $chieuDai; ?>"></td>
                </tr>
                <tr>
                    <td class="info">Chiều rộng: </td>
                    <td><input type="text" name="chieuRong" value="<?php echo $chieuRong; ?>"></td>
                </tr>
                <tr>
                    <td class="info">Diện tích: </td>
                    <td><input type="text" name="dienTich" disabled value="<?php echo $dienTich; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2"><span class="error"><?php if ($error != "") echo $error; ?></span></td>
                </tr>
                <tr>
                    <td class="nut-submit" colspan="2"><input type="submit" value="Tính"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>