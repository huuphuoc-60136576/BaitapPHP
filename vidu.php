<html>
<body>
    



    <?php
        $digits8 = 2;
        $giai8 =  isset($_POST['giai8']) ? $_POST['giai8'] : str_pad(Rand(0, pow(10, $digits8) - 1), $digits8, '0', STR_PAD_LEFT);
        echo $dayso = $giai8;


        $ketQua = "";
        $doSo = "";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $doSo = $_POST['doSo'];

            $haiSo = substr($doSo, -2);

            if ($haiSo == $giai8) {
                $ketQua = "Trúng giải 8!";
            }
        }

    ?>


    <form action="" method="post">
        <input type="text" name="giai8" readonly value="<?php echo $giai8; ?>">

        <input type="text" name="doSo" value="<?php echo $doSo; ?>">
        <input type="submit" value="Xem kết quả">
    </form>

    <span>
        <?php
            echo $ketQua;
        ?>
    </span>
</body>
</html>