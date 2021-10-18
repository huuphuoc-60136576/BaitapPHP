<!DOCTYPE html>
<html>
<head>
    <title>Diện tích hình chữ nhật</title>
    <style>
        .error {
            color: red;
        }

        form {
            border: 5px solid lightblue;
            width: 17rem;
        }

        caption {
            background-color: grey;
            color: aquamarine;
        }
    </style>
</head>
<body>
    
    <?php
        $chieuDai = $chieuRong = $dienTich = "";

        $dayDuErr = "";
        $beHonKhongErr = "";

        $err = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $chieuDai = $_POST['chieuDai'];
            $chieuRong = $_POST['chieuRong'];

            if (!is_numeric($chieuDai) || !is_numeric($chieuRong)) {
                $dayDuErr = "Vui lòng nhập số! <br>";
                $err[] = $dayDuErr;
            }

            if (empty($dayDuErr) && ($chieuDai < 0 || $chieuRong < 0)) {
                $beHonKhongErr = "Vui lòng nhập dữ liệu lớn hơn 0 <br>";
                $err[] = $beHonKhongErr;
            }

            if (empty($err)) {
                $dienTich = $chieuDai * $chieuRong;
            }
        }
    ?>


    <form action="" name="dienTichChuNhat" method="post">
        <table>
            <caption>DIỆN TÍCH HÌNH CHỮ NHẬT</caption>
            <tr>
                <td>Chiều dài: </td>
                <td><input type="text" name="chieuDai" value="<?php echo $chieuDai; ?>"></td>
            </tr>
            <tr>
                <td>Chiều rộng: </td>
                <td><input type="text" name="chieuRong" value="<?php echo $chieuRong; ?>"></td>
            </tr>
            <tr>
                <td>Diện tích: </td>
                <td><input type="text" disabled value="<?php echo $dienTich; ?>"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <input type="submit" value="Submit">
                </td>
            </tr>
        </table>
    </form>
    
    <span class="error">
        <?php
            echo $dayDuErr;
            echo $beHonKhongErr;
        ?>
    </span>
</body>
</html>