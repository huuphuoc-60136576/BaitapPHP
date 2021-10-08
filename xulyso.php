<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <?php
        $soNguyen = "";
        $soNguyenErr = "";
        
        $mangSoNguyenTo = array();

        $luuSo = "";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['soNguyen'])) {
                $soNguyen = $_POST['soNguyen'];
                if ($soNguyen < 10 || $soNguyen > 1000) {
                    $soNguyenErr = "Mời bạn nhập lại!";
                } else {
                    hienThiSoNguyenTo($soNguyen);

                    // Câu 2:
                    $temp = $soNguyen;
                    $luuSo = array();
                    
                    // Tách số đó thành từng số.
                    while ($temp != 0)
                    {
                        $luuSo[] = $temp % 10;
                        $temp = (int)($temp / 10);
                    }
                }
            }
        }

        // Câu 1:
        function hienThiSoNguyenTo($n)
        {
            global $mangSoNguyenTo;
            $counter = 0;
            for ($i=2; $i < $n; $i++) { 
                if (kiemTraNguyenTo($i) == true) {
                    $mangSoNguyenTo[$counter] = $i;
                    $counter++;                   
                }
            }
        }

        function kiemTraNguyenTo($num)
        {
            $dem = 0;
            for ($i=2; $i <= sqrt($num); $i++) { 
                if ($num % $i == 0)
                    $dem++;
            }

            if ($num == 2 || $dem == 0)
                return true;
            
            return false;
        }
    ?>

    <form action="xulyso.php" name="xuLySo" method="post">
        <table>
            <caption>Xử lý số</caption>
            <tr>
                <td class="info">Nhập số: </td>
                <td>
                    <input type="text" name="soNguyen" value="<?php echo $soNguyen; ?>">
                    <span class="error"><?php echo $soNguyenErr; ?></span>
                </td>
            </tr>
            <tr>
                <td class="info">Kết quả: </td>
                <td>
                    <textarea name="" cols="100" rows="10">
                        <?php
                            if ($mangSoNguyenTo != NULL) {
                                echo "Danh sách số nguyên tố bé hơn $soNguyen:";
                                foreach ($mangSoNguyenTo as $soNguyenTo) {
                                    echo $soNguyenTo . " ";
                                }
                                echo "\n";

                                // Câu b
                                echo "Số nguyên $soNguyen có: ". count($luuSo). " chữ số. \n";

                                // Câu c
                                echo "Chữ số lớn nhất trong số nguyên này là: ". max($luuSo);
                            }
                        ?>
                    </textarea>
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