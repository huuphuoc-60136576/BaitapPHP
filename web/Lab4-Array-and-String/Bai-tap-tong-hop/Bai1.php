<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 1</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    
    <?php
        $n = "";
        $so = "";
        $mang = array();
        $hienThi = "";

        $err = array();

        $nErr = $soErr = "";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $n = $_POST['soNguyenN'];
            $so = $_POST['so'];

            if (!is_numeric($n)) {
                $nErr = "Vui lòng nhập lại n!";
                $err[] = $nErr;
            }

            if (!is_numeric($so)) {
                $soErr = "Vui lòng nhập lại số!";
                $err[] = $soErr;
            }


            if (empty($err)) {
                $hienThi = "Mảng được khởi tạo: \n";
                $mang = taoMang($n);
                $hienThi .= implode(", ", $mang);

                $hienThi .= "\nSắp xếp mảng tăng dần: \n";
                $temp = $mang;
                sort($temp);
                $hienThi .= implode(", ", $temp);

                $viTri = rand(0, $n - 1);
                chenSoVaoMang($mang, $so, $viTri);
                $hienThi .= "\nSố $so được thêm vào vị trí $viTri tron mảng: \n";
                $hienThi .= implode(", ", $mang);

                $hienThi .= "\nMảng sau khi được sắp xếp: \n";
                sapXepMang($mang, $viTri);
                $hienThi .= implode(", ", $mang);
            }
        }
    
        // Tạo mảng
        function taoMang($n)
        {
            $mang = array();
            for ($i=0; $i < $n; $i++) { 
                $mang[$i] = rand(-100, 100);
            }

            return $mang;
        }

        // Chèn một số vào mảng
        function chenSoVaoMang(&$arr, $so, $viTri) {
            array_splice($arr, $viTri, 0, $so);
        }

        // Sắp xếp mảng
        function sapXepMang(&$mang, $viTri) {
            $n = count($mang);
            $so[] = $mang[$viTri];
            $mang1 = $mang2 = array();


            for ($i=0; $i < $viTri; $i++) { 
                $mang1[] = $mang[$i];
            }

            for ($j=$n-1; $j > $viTri ; $j--) { 
                $mang2[] = $mang[$j];
            }

            sort($mang1);
            rsort($mang2);

            $mang = array_merge($mang1, $so, $mang2);
        }
    ?>

    <form action="" method="post">
        <table>
            <tr>
                <td>Nhập n: </td>
                <td><input type="text"  name="soNguyenN" value="<?php echo $n; ?>"></td>
                <td>
                    <span class="error">
                        <?php echo $nErr; ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td>Nhập số: </td>
                <td>
                    <input type="text" name="so" value="<?php echo $so; ?>">
                </td>
                <td>
                    <span class="error">
                        <?php echo $soErr; ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Nhập"></td>
            </tr>
            <tr>
                <td colspan="3">
                    <textarea cols="60" rows="10"><?php
                        echo $hienThi;
                    ?></textarea>
                </td>
            </tr>
        </table>
    </form>

</body>
</html>