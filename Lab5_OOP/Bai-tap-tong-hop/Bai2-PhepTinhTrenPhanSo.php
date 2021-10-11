<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phép tính trên phân số</title>
    
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <?php
        class PhanSo
        {
            public $tuSo, $mauSo;

            // get, set
            public function getTuSo()
            {
                return $this->tuSo;
            }

            public function setTuSo($tuSo)
            {
                $this->tuSo = $tuSo;
            }

            public function getMauSo()
            {
                return $this->mauSo;
            }

            public function setMauSo($mauSo)
            {
                $this->mauSo = $mauSo;
            }
            // ---

            public function khoiTao($tuSo, $mauSo)
            {
                $this->tuSo = $tuSo;
                $this->mauSo = $mauSo;
            }

            // Tìm ước chung lớn nhất của hai số
            public function UCLN($a, $b)
            {
                // đổi dấu tử số
                if ($a < 0) $a = (-1) * ($a);
                $soNho = ($a < $b) ? $a : $b;
                for ($i=$soNho; $i > 0; $i--) { 
                    if ($a % $i == 0 && $b % $i == 0) {
                        break;
                    }
                }

                return $i;
            }

            // Tối giản phân số
            public function toiGianPhanSo()
            {
                $ucln = $this->UCLN($this->tuSo, $this->mauSo);
                $this->tuSo = $this->tuSo / $ucln;
                $this->mauSo = $this->mauSo / $ucln;
            }

            // Tính tổng 2 phân số
            public function tinhTong($tuSo, $mauSo)
            {
                $phanSo = new PhanSo();
                $phanSo->khoiTao($tuSo, $mauSo);
                $phanSo->tuSo = ($this->tuSo * $phanSo->mauSo) + ($phanSo->tuSo * $this->mauSo);
                $phanSo->mauSo = $this->mauSo * $phanSo->mauSo;

                return $phanSo;
            }

            // Tính hiệu 2 phân số
            public function tinhHieu($tuSo, $mauSo)
            {
                $phanSo = new PhanSo();
                $phanSo->khoiTao($tuSo, $mauSo);
                $phanSo->tuSo = ($this->tuSo * $phanSo->mauSo) - ($phanSo->tuSo * $this->mauSo);
                $phanSo->mauSo = $this->mauSo * $phanSo->mauSo;

                return $phanSo;
            }

            // Tính nhân 2 phân số
            public function tinhNhan($tuSo, $mauSo)
            {
                $phanSo = new PhanSo();
                $phanSo->khoiTao($tuSo, $mauSo);
                $phanSo->tuSo = $this->tuSo * $phanSo->tuSo;
                $phanSo->mauSo = $this->mauSo * $phanSo->mauSo;

                return $phanSo;
            }

            // Tính chia 2 phân số
            public function tinhChia($tuSo, $mauSo)
            {
                $phanSo = new PhanSo();
                $phanSo->tuSo = $this->tuSo * $mauSo;
                $phanSo->mauSo = $this->mauSo * $tuSo;
                $phanSo->toiGianPhanSo();
                return $phanSo;
            }
        }
    ?>

    <!-- Xử lý giá trị post lên -->
    <?php
        $tuSo1 = $mauSo1 = "";
        $tuSo2 = $mauSo2 = "";
        $hienThi = "";

        $phepTinhErr = "";
        $soErr = "";

        $error = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $phepTinh = isset($_POST['phepTinh']) ? $phepTinh = $_POST['phepTinh'] : "";

            $tuSo1 = $_POST['tuSo1'];
            $mauSo1 = $_POST['mauSo1'];
            $tuSo2 = $_POST['tuSo2'];
            $mauSo2 = $_POST['mauSo2'];

            if (empty($phepTinh)) {
                $phepTinhErr = "Vui lòng chọn phép tính!";
                $error[] = $phepTinhErr;
            }

            if (!is_numeric($tuSo1) || !is_numeric($mauSo1) || !is_numeric($tuSo2) || !is_numeric($mauSo2)) {
                $soErr = "Vui lòng nhập số!";
                $error[] = $soErr;
            }
            

            if (empty($error)) {
                $phanSo1 = new PhanSo();
                $phanSo1->setTuSo($tuSo1);
                $phanSo1->setMauSo($mauSo1);

                $phanSo2 = new PhanSo();
                $phanSo2->khoiTao($tuSo2, $mauSo2);

                switch ($phepTinh) {
                    case 'cộng':
                        $ketQua = $phanSo1->tinhTong($phanSo2->tuSo, $phanSo2->mauSo);                        
                        $hienThi = "Phép $phepTinh: " 
                                . $phanSo1->tuSo . "/" . $phanSo1->mauSo . " + " 
                                . $phanSo2->tuSo . "/" . $phanSo2->mauSo . " = " 
                                . $ketQua->tuSo . "/" . $ketQua->mauSo;
                        break;

                    case 'trừ':
                        $ketQua = $phanSo1->tinhHieu($phanSo2->tuSo, $phanSo2->mauSo);                        
                        $hienThi = "Phép $phepTinh: " 
                                . $phanSo1->tuSo . "/" . $phanSo1->mauSo . " - " 
                                . $phanSo2->tuSo . "/" . $phanSo2->mauSo . " = " 
                                . $ketQua->tuSo . "/" . $ketQua->mauSo;
                        break;

                    case 'nhân':
                        $ketQua = $phanSo1->tinhNhan($phanSo2->tuSo, $phanSo2->mauSo);                        
                        $hienThi = "Phép $phepTinh: " 
                                . $phanSo1->tuSo . "/" . $phanSo1->mauSo . " * " 
                                . $phanSo2->tuSo . "/" . $phanSo2->mauSo . " = " 
                                . $ketQua->tuSo . "/" . $ketQua->mauSo;
                        break;

                    case 'chia':
                        $ketQua = $phanSo1->tinhChia($phanSo2->tuSo, $phanSo2->mauSo);                        
                        $hienThi = "Phép $phepTinh: " 
                                . $phanSo1->tuSo . "/" . $phanSo1->mauSo . " / " 
                                . $phanSo2->tuSo . "/" . $phanSo2->mauSo . " = " 
                                . $ketQua->tuSo . "/" . $ketQua->mauSo;
                        break;
                        
                    default:
                        # code...
                        break;
                }
            }
            
            
        }
    ?>

    <form action="" method="post">
        <table>
            <tr>
                <td>Nhập phân số thứ 1: </td>
                <td>Từ số: </td>
                <td>
                    <input type="text" name="tuSo1" value="<?php echo $tuSo1; ?>">
                </td>
                <td>Mẫu số: </td>
                <td>
                    <input type="text" name="mauSo1" value="<?php echo $mauSo1; ?>">
                </td>
            </tr>
            <tr>
                <td>Nhập phân số thứ 2: </td>
                <td>Tử số: </td>
                <td>
                    <input type="text" name="tuSo2" value="<?php echo $tuSo2; ?>">
                </td>
                <td>Mẫu số: </td>
                <td>
                    <input type="text" name="mauSo2" value="<?php echo $mauSo2; ?>">
                </td>
            </tr>
        </table>
        <fieldset>
            <legend>Chọn phép tính</legend>
            <p>
                <input type="radio" name="phepTinh" value="cộng"
                    <?php if (isset($_POST['phepTinh']) && $_POST['phepTinh'] == "cộng") echo "checked"; ?>> Cộng
                <input type="radio" name="phepTinh" value="trừ" 
                    <?php if (isset($_POST['phepTinh']) && $_POST['phepTinh'] == "trừ") echo "checked"; ?>> Trừ
                <input type="radio" name="phepTinh" value="nhân" 
                    <?php if (isset($_POST['phepTinh']) && $_POST['phepTinh'] == "nhân") echo "checked"; ?>> Nhân
                <input type="radio" name="phepTinh" value="chia" 
                    <?php if (isset($_POST['phepTinh']) && $_POST['phepTinh'] == "chia") echo "checked"; ?>> Chia
                <span class="error">
                    <?php 
                        echo $phepTinhErr;
                    ?>
                </span>
            </p>
        </fieldset>
        <br>
        <input type="submit" value="Kết quả">
    </form>
    
    <span class="error">
        <?php echo $soErr; ?>
    </span>

    <p>
        <?php
            echo $hienThi;
        ?>
    </p>

</body>
</html>