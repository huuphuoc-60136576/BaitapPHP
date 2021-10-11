<!DOCTYPE html>
<html>
<head>
    <title>Viết hàm xử lý số</title>
</head>
<body>
    
    <?php
        $n = "";
        $so = "";
        $viTri = "";
        
        $thongBao = "";
        $hienThiCaua = "";
        $hienThiCaub = "";
        $hienThiCauc = "";
        $hienThiCaud = "";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST['soTuNhien']) && isset($_POST['so']) && isset($_POST['viTri'])) {
                $n = $_POST['soTuNhien'];
                $so = $_POST['so'];
                $viTri = $_POST['viTri'];

                if (is_numeric($n) && is_numeric($so)) {
                    if ($n > 0) {
                    $arr = array();
                    
                    // a- Hiển thị mảng phát sinh ngẫu nhiên có độ dài n.
                    taoMang($n, $arr);
                    $hienThiCaua = "- Mảng được khởi tạo: &#13;&#10;";
                    $hienThiCaua .= hienThiMang($arr) . "&#13;&#10;"; 
                    
                    // b- Sắp xếp mảng tăng dần theo giá trị.
                    asort($arr);
                    $hienThiCaub = "- Sắp xếp mảng tăng dần theo giá trị: &#13;&#10;";
                    $hienThiCaub .= hienThiMang($arr) . "&#13;&#10;";

                    // c- Chèn một số vào vị trí bất kỳ trong mảng. In ra mảng sau khi chèn số.
                    chenVaoMang($so, $viTri, $arr);
                    $hienThiCauc = "Số $so được chèn vào vị trí $viTri &#13;&#10;";
                    $hienThiCauc .= "Mảng sau khi chèn $so: &#13;&#10;";
                    $hienThiCauc .= hienThiMang($arr) . "&#13;&#10;";

                    // d- Sắp xếp mảng theo dạng sau: Từ phần tử đầu tiên đến phần tử được 
                    // chèn vào là tăng dần; từ phần tử được chèn vào đến phần tử cuối là 
                    // giảm dần.
                    sapXep($so, $arr);
                    $hienThiCaud = "Mảng sau khi được sắp xếp: &#13;&#10;";
                    $hienThiCaud .= hienThiMang($arr);

                    } else {
                        $thongBao = "Số bạn nhập quá thấp!";
                    }                 
                
                } else {
                    $thongBao = "Vui lòng nhập số!";
                }

            }
        }

        // Hàm tạo mảng
        function taoMang($n, &$arr) {
            for ($i=0; $i < $n; $i++) { 
                $arr[$i] = rand(-200, 200);
            }
        }

        // Hàm hiển thị mảng
        function hienThiMang($arr) {
            return implode(",", $arr);
        }

        // Chèn một số vào vị trí bất kỳ trong mảng
        function chenVaoMang($so, $viTri, &$arr) {
            array_splice($arr, $viTri, 0, $so);
        }

        // Lấy các phần tử đứng trước $so cho vào một mảng sau đó sắp xếp tăng dần
        // Lấy các phần tử đứng sau $so cho vào một mảng khác sau đó sắp xếp giảm dần
        // arr = mangTruoc + $so + mangSau
        function sapXep($so, &$arr) {
            $count = count($arr);
            $luu[0] = $so;
            for ($i=0; $i < $count; $i++) {
                if ($arr[$i] == $so) break;
                $mangTruoc[] = $arr[$i];
            }

            for ($i=$count-1; $i >= 0; $i--) {
                if ($arr[$i] == $so) break;
                $mangSau[] = $arr[$i];
            }

            if ($count > 1) {
                asort($mangTruoc);
                rsort($mangSau);
                $arr = array_merge($mangTruoc, $luu, $mangSau);
            }

        }

    ?>


    <form action="Bai1-Xu-ly-so.php" method="post">
        <table>
            <tr>
                <td><?php echo $thongBao; ?></td>
            </tr>
            <tr>
                <td>Nhập số tự nhiên n: </td>
                <td>
                    <input type="text" name="soTuNhien" value="<?php echo $n; ?>">
                </td>
            </tr>
            <tr>
                <td>Nhập số muốn chèn vào mảng: </td>
                <td>
                    <input type="text" name="so" value="<?php echo $so; ?>">
                </td>
            </tr>
            <tr>
                <td>Nhập vị trí muốn chèn vào mảng: </td>
                <td>
                    <input type="text" name="viTri" value="<?php echo $viTri; ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Hiển thị kết quả">
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <textarea cols="60" rows="10"><?php                            
                            echo $hienThiCaua;
                            echo $hienThiCaub;
                            echo $hienThiCauc;
                            echo $hienThiCaud;
                    ?></textarea>
                </td>
            </tr>
        </table>
    </form>

</body>
</html>