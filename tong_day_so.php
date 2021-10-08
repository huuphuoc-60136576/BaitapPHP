<html>
<head>
    <link href="style.css">
</head>
<body>
    
    <?php
        $daySo = "";
        $str = "";
        $tong = "";

        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if (isset($_POST['daySo']))
            {
                $str = $_POST['daySo'];
                $daySo = explode(",", $str);

                $tong = 0;
                $counter = count($daySo);
                for ($i=0; $i < $counter; $i++) { 
                   $tong += $daySo[$i];
                }
            }
        }
    ?>


    <form action="tong_day_so.php" name="tongDaySo" method="post">
        <table>
            <caption>NHẬP VÀ TÍNH TRÊN DÃY SỐ</caption>
            <tr>
                <td>Nhập dãy số: </td>
                <td><input type="text" name="daySo" value="<?php echo $str ?>"></td>
                <td><span>(*)</span></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tổng dãy số"></td>
                <td></td>
            </tr>
            <tr>
                <td>Tổng dãy số: </td>
                <td><input type="text" value="<?php echo $tong; ?>"></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">(*) Các số được nhập cách nhau bằng dầu ","</td>
            </tr>
        </table>
    </form>
</body>
</html>