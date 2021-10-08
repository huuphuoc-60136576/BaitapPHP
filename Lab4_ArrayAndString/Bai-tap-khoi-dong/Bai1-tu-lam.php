<!DOCTYPE html>
<html>
<head>
    <title>Tạo mảng xử lý một số thao tác cơ bản</title>
</head>
<body>
    <?php
        $n = "";
        $ketqua = "";
        $thongBao = "";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['soNguyenDuong']) && is_numeric($_POST['soNguyenDuong'])) {
                $n = $_POST['soNguyenDuong'];

                if ($n > 0) {
                    for ($i=0; $i < $n; $i++) { 
                        $arr[$i] = rand(-200, 200);
                    }

                    $ketqua = "Danh sách số được khởi tạo: &#13;&#10;";
                    $ketqua .= implode(",", $arr) . "&#13;&#10;";

                    $luuSoDuongChan = array();
                    $couter = 0;
                    for ($i=0; $i < $n; $i++) {
                        if ($arr[$i] > 0 && $arr[$i] % 2 == 0) {
                            $luuSoDuongChan[$couter] = $arr[$i];
                            $couter++; 
                        }
                    }

                    $ketqua .= "Danh sách số nguyên dương chẵn: &#13;&#10;";
                    $ketqua .= implode(",", $luuSoDuongChan) . "&#13;&#10;";

                    $luuSoCoChuSoCuoiLe = array();
                    $couter = 0;
                    for ($i=0; $i < $n; $i++) { 
                        $soCuoi = $arr[$i] % 10;
                        if ($soCuoi %2 != 0) {
                            $luuSoCoChuSoCuoiLe[$couter] = $arr[$i];
                            $couter++;
                        }
                    }

                    $ketqua .= "Danh sách số có chữ số cuối lẻ: &#13;&#10;";
                    $ketqua .= implode(",", $luuSoCoChuSoCuoiLe) . "&#13;&#10;";

                } else {
                    $thongBao = "Vui lòng nhập số nguyên dương!";                    
                }
            } else {
                $thongBao = "Vui lòng nhập số!";
            }
        }
    
    ?>


    <form action="Bai1-tu-lam.php" name="suLyCoBan" method="post">
        <table>
            <tr>
                <td colspan="3"><?php echo $thongBao; ?></td>
            </tr>
            <tr>
                <td>Nhập vào một số: </td>
                <td><input type="text" name="soNguyenDuong"></td>
                <td><input type="submit" value="Kêt quả"></td>
            </tr>
            <tr>
                <td colspan="3">
                    <textarea cols="50" rows="10">
                        <?php
                            echo $ketqua;
                        ?>
                    </textarea>
                </td>
            </tr>
        </table>
    </form>

</body>
</html>