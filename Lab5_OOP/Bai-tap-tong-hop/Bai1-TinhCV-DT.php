<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính chu vi - diện tích</title>

    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    
    <?php
        abstract class HinhHoc
        {
            protected $ten;
            protected $doDai;

            public function getTen()
            {
                return $this->ten;
            }

            public function setTen($ten)
            {
                $this->ten = $ten;
            }

            public function getDoDai()
            {
                return $this->doDai;
            }

            public function setDoDai($doDai)
            {
                $this->doDai = $doDai;
            }

            abstract public function tinhChuVi();
            abstract public function tinhDienTich();
        }

        class HinhVuong extends HinhHoc
        {
            public function TinhChuVi()
            {
                return $this->doDai * 4;
            }

            public function TinhDienTich()
            {
                return pow($this->doDai, 2);
            }
        }

        class HinhTron extends HinhHoc
        {
            const PI = 3.14;
            public function TinhChuVi()
            {
                return 2 * $this->doDai * self::PI;
            }

            public function TinhDienTich()
            {
                return pow($this->doDai, 2) * self::PI;
            }
        }

        class TamGiacDeu extends HinhHoc
        {
            public function TinhChuVi()
            {
                return 3 * $this->doDai;
            }

            public function TinhDienTich()
            {
                return $this->doDai * $this->doDai * sqrt(3)/4;
            }
        }

        class TamGiacThuong extends HinhHoc
        {
            public function TinhChuVi()
            {
                return array_sum($this->doDai);
            }

            public function TinhDienTich()
            {
                $p = self::TinhChuVi() / 2;
                $a = $this->doDai[0];                
                $b = $this->doDai[1];                
                $c = $this->doDai[2];
            
                return sqrt($p * ($p - $a) * ($p - $b) * ($p - $c));
            }
        }

        class HinhChuNhat extends HinhHoc
        {
            public function TinhChuVi()
            {
                $a = $this->doDai[0];
                $b = $this->doDai[1];
                return 2 * ($a + $b);
            }

            public function TinhDienTich()
            {
                $a = $this->doDai[0];
                $b = $this->doDai[1];
                return $a * $b;
            }
        }
    ?>

    <!-- Xử lý dữ liệu post lên -->
    <?php
        $hinh = isset($_POST['hinh']) ? $hinh = $_POST['hinh'] : "";

        $ten = isset($_POST['ten']) ? $ten = $_POST['ten'] : "";
        $doDai = isset($_POST['doDai']) ? $doDai = $_POST['doDai'] : "";

        $error = array();
        $hinhErr = "";
        $doDaiErr = "";
        $tamGiacThuongErr = "";

        // làm xác minh lỗi rồi làm tiếp các bước sử lý để ra kết quả.
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($hinh)) {
                $hinhErr = "Vui lòng chọn hình!";
                $error[] = $hinhErr;
            }

            if (is_numeric($doDai) && $doDai < 0) {
                $doDaiErr = "Độ dài phải lớn hơn 0";
                $error[] = $doDaiErr;
            }
        }

        $hienThi = "";

        $flag = 0; // xử lý tam giác thường và hình chữ nhật

        if ($hinh == 'tam giác thường') {
            $flag = 1;
            
            $doDaiCacCanh = explode(",", $doDai);
            $soCanh = count($doDaiCacCanh);

           if ($soCanh == 3) {
                $a = $doDaiCacCanh[0];
                $b = $doDaiCacCanh[1];
                $c = $doDaiCacCanh[2];

                if ($a + $b > $c && $b + $c > $a && $c + $a > $b) {
                    $tamGiacThuong = new TamGiacThuong();
                    $tamGiacThuong->setTen($ten);
                    $tamGiacThuong->setDoDai($doDaiCacCanh);

                    $hienThi = "Tên hình: " . $tamGiacThuong->getTen() . "\n"
                                    . "Độ dài: " . implode(", ", $tamGiacThuong->getDoDai()) . "\n"
                                    . "Chu vi: " . $tamGiacThuong->TinhChuVi(). "\n"
                                    . "Diện tích: " . $tamGiacThuong->TinhDienTich(); 
                } else {
                    $tamGiacThuongErr = "3 cạnh này không phải là 3 cạnh của một tam giác!";
                }
           } else {
               $doDaiErr = "Đối với hình tam giác thường bạn chỉ cần nhập 3 số!";
           }
        }

        if ($hinh == 'hình chữ nhật') {
            $flag = 1;

            $doDaiCacCanh = explode(",", $doDai);
            $soCanh = count($doDaiCacCanh);

            if ($soCanh == 2) {
                $a = $doDaiCacCanh[0];
                $b = $doDaiCacCanh[1];

                if ($a > 0 && $b > 0) {
                    $hinhChuNhat = new HinhChuNhat();
                    $hinhChuNhat->setTen($ten);
                    $hinhChuNhat->setDoDai($doDaiCacCanh);

                    $hienThi = "Tên hình: " . $hinhChuNhat->getTen() . "\n"
                                    . "Độ dài: " . implode(", ", $hinhChuNhat->getDoDai()) . "\n"
                                    . "Chu vi: " . $hinhChuNhat->TinhChuVi(). "\n"
                                    . "Diện tích: " . $hinhChuNhat->TinhDienTich();                 
                } else {
                    $doDaiErr = "Độ dài các cạnh phải lớp hơn 0";
                }
            } else {
                $doDaiErr = "Đối với hình chữ nhật bạn chỉ cần nhập 2 số!";
            }
        }



        if (empty($error) && $flag == 0) {
            switch ($hinh) {
                case 'hình vuông':
                    $hinhVuong = new HinhVuong();
                    $hinhVuong->setTen($ten);
                    $hinhVuong->setDoDai($doDai);
                    $hienThi = "Tên hình: " . $hinhVuong->getTen() . "\n"
                            . "Độ dài: " . $hinhVuong->getDoDai() . "\n"
                            . "Chu vi: " . $hinhVuong->TinhChuVi(). "\n"
                            . "Diện tích: " . $hinhVuong->TinhDienTich(); 
                    break;
                    
                case 'hình tròn':
                    $hinhTron = new HinhTron();
                    $hinhTron->setTen($ten);
                    $hinhTron->setDoDai($doDai);
                    $hienThi = "Tên hình: " . $hinhTron->getTen() . "\n"
                            . "Độ dài: " . $hinhTron->getDoDai() . "\n"
                            . "Chu vi: " . $hinhTron->TinhChuVi(). "\n"
                            . "Diện tích: " . $hinhTron->TinhDienTich();
                    break;

                case 'tam giác đều':
                    $tamGiacDeu = new TamGiacDeu();
                    $tamGiacDeu->setTen($ten);
                    $tamGiacDeu->setDoDai($doDai);
                    $hienThi = "Tên hình: " . $tamGiacDeu->getTen() . "\n"
                            . "Độ dài: " . $tamGiacDeu->getDoDai() . "\n"
                            . "Chu vi: " . $tamGiacDeu->TinhChuVi(). "\n"
                            . "Diện tích: " . $tamGiacDeu->TinhDienTich();
                    break;

                default:
                    # code...
                    break;
            }
        }
    ?>


    <form action="" method="post">
    <fieldset>
        <legend>Tính chu vi và diện tích các hình cơ bản</legend>
        <table>
            <tr>
                <td>Chọn hình: </td>
                <td>
                    <input type="radio" name="hinh" value="hình vuông"
                        <?php if (isset($_POST['hinh']) && $_POST['hinh'] == "hình vuông") echo "checked"; ?>> Hình vuông
                    <input type="radio" name="hinh" value="hình tròn"
                        <?php if (isset($_POST['hinh']) && $_POST['hinh'] == "hình tròn") echo "checked"; ?>> Hình tròn
                    <input type="radio" name="hinh" value="tam giác đều" 
                        <?php if (isset($_POST['hinh']) && $_POST['hinh'] == 'tam giác đều') echo "checked"; ?>> Tam giác đều
                    <input type="radio" name="hinh" value="tam giác thường" 
                        <?php if (isset($_POST['hinh']) && $_POST['hinh'] == 'tam giác thường') echo "checked"; ?>> Tam giác thường
                    <input type="radio" name="hinh" value="hình chữ nhật" 
                        <?php if (isset($_POST['hinh']) && $_POST['hinh'] == 'hình chữ nhật') echo "checked"; ?>> Hình chữ nhật

                </td>
                <td>
                    <span class="error">
                        <?php echo $hinhErr; ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td>Nhập tên: </td>
                <td>
                    <input type="text" name="ten" value="<?php echo $ten; ?>">
                </td>
            </tr>
            <tr>
                <td>Nhập độ dài: </td>
                <td>
                    <input type="text" name="doDai" value="<?php echo $doDai; ?>">
                    <span class="error">
                        <?php
                            echo $doDaiErr;
                            echo $tamGiacThuongErr;
                        ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <em>(*Đối với các hình tam giác thường và hình chữ nhật độ dài các cạnh cách nhau bằng dấu phẩy ",")</em>
                </td>
            </tr>
            <tr>
                <td>Kết quả: </td>
                <td colspan="2">
                    <textarea cols="70" rows="10" disabled><?php
                        echo $hienThi;
                    ?></textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tính"></td>
            </tr>
        </table>
    </fieldset>
    </form>
</body>
</html>