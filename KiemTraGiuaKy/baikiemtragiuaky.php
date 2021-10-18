<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài kiểm tra giữa kỳ</title>

    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    
    <?php
        abstract class Nguoi
        {
            protected $maSo;
            protected $hoTen;
            protected $ngaySinh;
            protected $gioiTinh;

            // Ma so
            public function getMaSo()
            {
                return $this->maSo;
            }

            public function setMaSo($maSo)
            {
                $this->maSo = $maSo;
            }

            // Ho ten
            public function getHoTen()
            {
                return $this->hoTen;
            }

            public function setHoTen($hoTen)
            {
                $this->hoTen = $hoTen;
            }

            // Ngay sinh
            public function getNgaySinh()
            {
                return $this->ngaySinh;
            }

            public function setNgaySinh($ngaySinh)
            {
                $this->ngaySinh = $ngaySinh;
            }

            // Gioi tinh
            public function getGioiTinh()
            {
                return $this->gioiTinh;
            }

            public function setGioiTinh($gioiTinh)
            {
                $this->gioiTinh = $gioiTinh;
            }

            // Tính thưởng
            abstract public function tinhThuong();
        }

        class NhanVienVanPhong extends Nguoi
        {
            const luongCoBan = 1500000;
            private $soNamCongTac;

            public function getSoNamCongTac()
            {
                return $this->soNamCongTac;
            }

            public function setSoNamCongTac($soNamCongTac)
            {
                $this->soNamCongTac = $soNamCongTac;
            }

            public function tinhThuong()
            {
            
                $mang = explode("/", $this->ngaySinh);
                $tuoi = 2021 - $mang[2];

                if ($tuoi >= 22 && $tuoi <= 25) {
                    return self::luongCoBan * $this->soNamCongTac * 1.1;
                } else if ($tuoi >= 26 && $tuoi <= 30) {
                    return self::luongCoBan * $this->soNamCongTac * 1.2;
                } else if ($tuoi > 30) {
                    return self::luongCoBan * $this->soNamCongTac;
                }
            }
        }

        class NhanVienPhucVu extends Nguoi
        {
            private $chucVu;
            private $soNgayCong;

            public function getChucVu()
            {
                return $this->chucVu;
            }

            public function setChucVu($chucVu)
            {
                $this->chucVu = $chucVu;
            }

            public function getSoNgayCong()
            {
                return $this->soNgayCong;
            }

            public function setSoNgayCong($soNgayCong)
            {
                $this->soNgayCong = $soNgayCong;
            }

            public function tinhThuong()
            {
                if ($this->soNgayCong == 28) {
                    return 50000 * 28;
                } else if ($this->soNgayCong < 28) {
                    return 40000 * $this->soNgayCong;
                }
            }
        }
    ?>

    <!-- Xử lý dữ liệu post lên -->
    <?php
        $displayNhanVienVanPhong = $displayNhanVienPhucVu = "none";

        $doiTuong = "";
        $maSo = $hoTen = $ngaySinh = $gioiTinh = "";
        
        $soNamCongTac = "";
        
        $chucVu = $soNgayCong = "";

        $hienThi = "";
        $err = array();
        $doiTuongErr = "";
        $deTrongErr = "";

        $soNgayCongTacErr = "";
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $doiTuong = $_POST['doiTuong'] ?? "";
            $maSo = $_POST['maSo'];
            $hoTen = $_POST['hoTen'];
            $ngaySinh = $_POST['ngaySinh'];
            $gioiTinh = $_POST['gioiTinh'] ?? "";

            $soNamCongTac = $_POST['soNamCongTac'];

            // Nhan vien phuc vu
            $chucVu = $_POST['chucVu'];
            $soNgayCong = $_POST['soNgayCong'];


            if (empty($doiTuong)) {
                $doiTuongErr = "Vui lòng chọn đối tượng!";
                $err[] = $doiTuongErr;
            }

            if (empty($maSo) || empty($hoTen) || empty($ngaySinh) || empty($gioiTinh)) {
                $deTrongErr  = "Vui lòng nhập đầy đủ thông tin!";
                $err[] = $deTrongErr;
            }

            if ($doiTuong == "nvvp" && (empty($soNamCongTac))) {
               $deTrongErr  = "Vui lòng nhập đầy đủ thông tin!";
                $err[] = $deTrongErr;
            }
          

            if ($doiTuong == "nvpv" && (empty($chucVu) || empty($soNgayCong))) {
                $deTrongErr  = "Vui lòng nhập đầy đủ thông tin!";
                $err[] = $deTrongErr;
            }
            
            if (empty($err)) {
                if ($doiTuong == 'nvvp') {
                    $nhanVienVanPhong = new NhanVienVanPhong();
                    $nhanVienVanPhong->setMaSo($maSo);
                    $nhanVienVanPhong->setHoTen($hoTen);
                    $nhanVienVanPhong->setNgaySinh($ngaySinh);
                    $nhanVienVanPhong->setGioiTinh($gioiTinh);
                    $nhanVienVanPhong->setSoNamCongTac($soNamCongTac);

                    $hienThi = "Mã số nhân viên: " . $nhanVienVanPhong->getMaSo() . "<br>"
                            . "Họ tên: " . $nhanVienVanPhong->getHoTen() . "<br>"
                            . "Ngày sinh: " . $nhanVienVanPhong->getNgaySinh() . "<br>"
                            . "Giới tính: " . $nhanVienVanPhong->getGioiTinh() . "<br>"
                            . "Số năm công tác: " . $nhanVienVanPhong->getSoNamCongTac() ."<br>"
                            . "Tiền thưởng: " . $nhanVienVanPhong->tinhThuong();
                }

                if ($doiTuong == 'nvpv') {
                    $nhanVienPhucVu = new NhanVienPhucVu();
                    $nhanVienPhucVu->setMaSo($maSo);
                    $nhanVienPhucVu->setHoTen($hoTen);
                    $nhanVienPhucVu->setNgaySinh($ngaySinh);
                    $nhanVienPhucVu->setGioiTinh($gioiTinh);
                    $nhanVienPhucVu->setChucVu($chucVu);
                    $nhanVienPhucVu->setSoNgayCong($soNgayCong);

                    $hienThi = "Mã số nhân viên: " . $nhanVienPhucVu->getMaSo() . "<br>"
                            . "Họ tên: " . $nhanVienPhucVu->getHoTen() . "<br>"
                            . "Ngày sinh: " . $nhanVienPhucVu->getNgaySinh() . "<br>"
                            . "Giới tính: " . $nhanVienPhucVu->getGioiTinh() . "<br>"
                            . "Chức vụ: " . $nhanVienPhucVu->getChucVu() . "<br>"
                            . "Số ngày công: " . $nhanVienPhucVu->getSoNgayCong() ."<br>"
                            . "Tiền thưởng: " . $nhanVienPhucVu->tinhThuong();
                }
            }
        }
    ?>


    <form action="" method="post">
        <table>
            <caption>Quản lý nhân viên</caption>
            <tr>
                <td>Chọn đối tượng: </td>
                <td>
                    <input type="radio" name="doiTuong" value="nvvp" id = "nvvp" onclick="chonDoiTuong()"
                        <?php if (isset($_POST['doiTuong']) && $_POST['doiTuong'] == "nvvp") echo "checked"; ?>> Nhân viên văn phòng
                    <input type="radio" name="doiTuong" value="nvpv" id = "nvpv" onclick="chonDoiTuong()"
                        <?php if (isset($_POST['doiTuong']) && $_POST['doiTuong'] == "nvpv") echo "checked"; ?>> Nhân viên phục vụ
                </td>
                <td>
                    <span class="error">
                        <?php
                            echo $doiTuongErr;
                        ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td>Mã số: </td>
                <td>
                    <input type="text" name="maSo" value="<?php echo $maSo; ?>">
                </td>
            </tr>
            <tr>
                <td>Họ tên: </td>
                <td>
                    <input type="text" name="hoTen" value="<?php echo $hoTen; ?>">
                </td>
            </tr>
            <tr>
                <td>Ngày sinh</td>
                <td>
                    <input type="text" name="ngaySinh" value="<?php echo $ngaySinh; ?>">
                </td>
            </tr>
            <tr>
                <td>Giới tính: </td>
                <td>
                    <input type="radio" name="gioiTinh" value="Nam" 
                        <?php if (isset($_POST['gioiTinh']) && $_POST['gioiTinh'] == "Nam") echo "checked"; ?>> Nam
                    <input type="radio" name="gioiTinh" value="Nữ" 
                        <?php if (isset($_POST['gioiTinh']) && $_POST['gioiTinh'] == "Nữ") echo "checked"; ?>> Nữ
                </td>
            </tr>
            <tr id="soNamCongTac">
                <td>Số năm công tác: </td>
                <td>
                    <input type="text" name="soNamCongTac" value="<?php echo $soNamCongTac; ?>">
                </td>
            </tr>
            <tr id="chucVu">
                <td>Chức vụ: </td>
                <td>
                    <input type="text" name="chucVu" value="<?php echo $chucVu; ?>">
                </td>
            </tr>
            <tr id="soNgayCong">
                <td>Số ngày công: </td>
                <td>
                    <input type="text" name="soNgayCong" value="<?php echo $soNgayCong; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Nhập thông tin">
                </td>
            </tr>

        </table>
    </form>
    
    <span class="error">
        <?php
            echo $deTrongErr;
        ?>
    </span>

    <?php
        echo $hienThi;
    ?>
    

    <!-- Script -->
    <script>
        function chonDoiTuong() {
            var radioChonDoiTuong = document.getElementById("nvvp");
            
            var soNamCongTac = document.getElementById('soNamCongTac');
            var chucVu = document.getElementById('chucVu');
            var soNgayCong = document.getElementById('soNgayCong');

            if (radioChonDoiTuong.checked == true) {
                soNamCongTac.style.display = "table-row";
                chucVu.style.display = "table-row";
                soNgayCong.style.display = "none";
            } else {
                soNamCongTac.style.display = "none";
                chucVu.style.display = "none";
                soNgayCong.style.display = "table-row";
            }
        }
    </script>
</body>
</html>