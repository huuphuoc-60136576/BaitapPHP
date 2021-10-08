<!DOCTYPE html>
<html>
<head>
    <title>Bài 2: Thiết kế Form nhập và tính trên dãy số</title>
</head>
<body>
    <?php
        $daySo = "";
        $hienThi = "";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($daySo)) {
                $daySo = $_POST['daySo'];
                $arr = explode(",", $daySo);
                
                $tong = array_sum($arr);
                $hienThi = $tong;   
            }
        }
    ?>


    <form action="Bai2-tinh-tong.php" method="post">
        <table>
            <caption>NHẬP VÀ TÍNH TRÊN DÃY SỐ</caption>
            <tr>
                <td>Nhập dãy số: </td>
                <td><input type="text" name="daySo" value="<?php echo $daySo; ?>"></td>
                <td>(*)</td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tổng dãy số"></td>
            </tr>
            <tr>
                <td>Tổng dãy số: </td>
                <td><input type="text" value="<?php echo $hienThi; ?>"></td>
            </tr>
            <tr>
                <td colspan="3">
                    (*) Các số được nhập cachs nhau bằng dấu ","
                </td>
            </tr>
        </table>
    </form>

</body>
</html>