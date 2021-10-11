<!DOCTYPE html>
<html>
<head>
    <title>Nhập thông tin</title>
    
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .error {
            color: red;
        }

        legend {
            background-color: #eeeeee;
            color: gray;
        }        
    </style>
</head>
<body>
    <?php
        class Nguoi
        {
            protected $hoTen;
            protected $diaChi;
            protected $gioiTinh;

            public function getHoten()
            {
                return $this->hoTen;
            }

            public function setHoten($hoTen)
            {
                $this->hoTen = $hoTen;
            }

            public function getDiaChi()
            {
                return $this->diaChi;
            }

            public function setDiaChi($diaChi)
            {
                $this->diaChi = $diaChi;
            }

            public function getGioiTinh()
            {
                return $this->gioiTinh;
            }

            public function setGioiTinh($gioiTinh)
            {
                $this->gioiTinh = $gioiTinh;
            }
        }

        class SinhVien extends Nguoi
        {
            private $lopHoc;
            private $nganhHoc;

            public function getLopHoc()
            {
                return $this->lopHoc;
            }

            public function setLopHoc($lopHoc)
            {
                $this->lopHoc = $lopHoc;
            }

            public function getNganhHoc()
            {
                return $this->nganhHoc;
            }

            public function setNganhHoc($nganhHoc)
            {
                $this->nganhHoc = $nganhHoc;
            }

            public function tinhDiemThuong()
            {
                if ($this->nganhHoc == "CNTT") {
                    return 1;
                } else if ($this->nganhHoc == "Kinh tế") {
                    return 1.5;
                } else {
                    return 0;
                }
            }

        }

        class GiangVien extends Nguoi
        {
            private $trinhDo;
            const luongCoBan = 1500000;

            public function getTrinhDo()
            {
                return $this->trinhDo;
            }

            public function setTrinhDo($trinhDo)
            {
                $this->trinhDo = $trinhDo;
            }

            public function tinhLuong()
            {
                if ($this->trinhDo == "Cử nhân") {
                    return self::luongCoBan * 2.34;
                } else if ($this->trinhDo == "Thạc sĩ") {
                    return self::luongCoBan * 3.67;
                } else if ($this->trinhDo == "Tiến sĩ") {
                    return self::luongCoBan * 5.66;
                } else {
                    return self::luongCoBan;
                }
            }
        }
    ?>

    <!-- Xử lý nhận thông tin -->
    <?php

        $displaySinhVien = $displayGiangVien = "none";

        $hoTen = $diaChi = $gioiTinh = $nganhHoc = $lopHoc = "";

        $doiTuongErr = "";
        $hoTenErr = $diaChiErr = $gioiTinhErr = "";
        $nganhHocErr = $lopHocErr = "";
        $trinhDoErr = "";

        $luuLaiLoi = array();

        $str = "";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $hoTen = $_POST['hoTen'];
            $diaChi = $_POST['diaChi'];
            $gioiTinh = $_POST['gioiTinh'] ?? "";
            $trinhDo = $_POST['trinhDo'] ?? "";
            $nganhHoc = $_POST['nganhHoc'] ?? "";
            $lopHoc = $_POST['lopHoc'];

            $doiTuong = $_POST['doiTuong'] ?? "";

            // Xác định lỗi
            if (empty($doiTuong)) {
                $doiTuongErr = "Vui lòng chọn đối tượng!";
                $luuLaiLoi[] = $doiTuongErr;
            }

            switch ($doiTuong) {
                case 'sinhVien':
                    $displaySinhVien = "table-row";
                    $displayGiangVien = "none";
                    break;
                case 'giangVien':
                    $displaySinhVien = "none";
                    $displayGiangVien = "table-row";
                default:
                    # code...
                    break;
            }

            if (empty($hoTen)) {
                $hoTenErr = "Vui lòng nhập họ tên!";
                $luuLaiLoi[] = $hoTenErr;
            }

            if (empty($diaChi)) {
                $diaChiErr = "Vui lòng nhập địa chỉ!";
                $luuLaiLoi[] = $diaChiErr;
            }

            if (empty($gioiTinh)) {
                $gioiTinhErr = "Vui lòng chọn giới tính!";
                $luuLaiLoi[] = $gioiTinhErr;
            }

            if ($doiTuong == 'sinhVien' && empty($lopHoc)) {
                $lopHocErr = "Vui lòng nhập lớp học!";
                $luuLaiLoi[] = $lopHocErr;
            }

            if ($doiTuong == 'sinhVien' && empty($nganhHoc)) {
                $nganhHocErr = "Vui lòng chọn ngành học!";
                $luuLaiLoi[] = $nganhHocErr;
            }

            if ($doiTuong == 'giangVien' && empty($trinhDo)) {
                $trinhDoErr = "Vui lòng chọn trình độ!";
            }      

            // Kết thúc xác định lỗi 

            if (empty($luuLaiLoi)) {
                if ($doiTuong == 'sinhVien') {                    
                    $sinhVien = new SinhVien();
                    $sinhVien->setHoten($hoTen);
                    $sinhVien->setDiaChi($diaChi);
                    $sinhVien->setGioiTinh($gioiTinh);
                    $sinhVien->setNganhHoc($nganhHoc);
                    $sinhVien->setLopHoc($lopHoc);

                    $str = "Họ tên sinh viên: " . $sinhVien->getHoten() . "<br>" .
                            "Địa chỉ: " . $sinhVien->getDiaChi() . "<br>" . 
                            "Giới tính: " . $sinhVien->getGioiTinh() . "<br>" .
                            "Lớp học: " . $sinhVien->getLopHoc() . "<br>" .
                            "Học ngành: " . $sinhVien->getNganhHoc() . "<br>" . 
                            "Điểm thưởng: " . $sinhVien->tinhDiemThuong();
                }

                if ($doiTuong == 'giangVien') {
                    $giangVien = new GiangVien();
                    $giangVien->setHoten($hoTen);
                    $giangVien->setDiaChi($diaChi);
                    $giangVien->setGioiTinh($gioiTinh);
                    $giangVien->setTrinhDo($trinhDo);

                    $str = "Họ tên giảng viên: " . $giangVien->getHoten() . "<br>" .
                            "Địa chỉ: " . $giangVien->getDiaChi() . "<br>" . 
                            "Giới tính: " . $giangVien->getGioiTinh() . "<br>" . 
                            "Trình độ: " . $giangVien->getTrinhDo() . "<br>" . 
                            "Lương cơ bản: " . $giangVien->tinhLuong();
                }
            }
        }
    ?>

    <!-- Form nhập thông tin -->
    <form action="" method="post">
        <fieldset>
        <legend>Nhập thông tin</legend>
        <table>
            <tr>
                <td>
                    Chọn đối tượng để nhập thông tin: 
                </td>
                <td>
                    <input type="radio" name="doiTuong" value="sinhVien" id = "sinhVien" onclick="chonDoiTuong()"
                        <?php if (isset($_POST['doiTuong']) && $_POST['doiTuong'] == 'sinhVien') echo "checked" ?>> Sinh viên
                    <input type="radio" name="doiTuong" value="giangVien" id = "giangVien" onclick="chonDoiTuong()"
                        <?php if (isset($_POST['doiTuong']) && $_POST['doiTuong'] == 'giangVien') echo "checked" ?>> Giảng viên
                </td>
                <td>
                    <span class="error"><?php echo $doiTuongErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>Nhập họ tên: </td>
                <td><input type="text" name="hoTen" value="<?php echo $hoTen; ?>"></td>
                <td>
                    <span class="error"><?php echo $hoTenErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>Nhập địa chỉ: </td>
                <td><input type="text" name="diaChi" value="<?php echo $diaChi; ?>"></td>
                <td>
                    <span class="error"><?php echo $diaChiErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>Chọn giới tính: </td>
                <td>
                    <input type="radio" name="gioiTinh" value="Nam" 
                        <?php if (isset($_POST['gioiTinh']) && $_POST['gioiTinh'] == 'Nam') echo "checked" ?>> Nam
                    <input type="radio" name="gioiTinh" value="Nữ"
                        <?php if (isset($_POST['gioiTinh']) && $_POST['gioiTinh'] == 'Nữ') echo "checked" ?>> Nữ
                </td>
                <td>
                    <span class="error"><?php echo $gioiTinhErr; ?></span>
                </td>
            </tr>
            <tr id='nhapLopHoc' style="display: <?php echo $displaySinhVien; ?>;">
                <td>Nhập lớp học: </td>
                <td><input type="text" name="lopHoc" value="<?php echo $lopHoc; ?>"></td>
                <td>
                    <span class="error"><?php echo $lopHocErr; ?></span>
                </td>
            </tr>
            <tr id='chonNganh' style="display: <?php echo $displaySinhVien; ?>">
                <td>Chọn ngành: </td>
                <td>
                    <input type="radio" name="nganhHoc" value="CNTT" 
                        <?php if (isset($_POST['nganhHoc']) && $_POST['nganhHoc'] == 'CNTT') echo "checked" ?>> CNTT
                    <input type="radio" name="nganhHoc" value="Kinh tế" 
                        <?php if (isset($_POST['nganhHoc']) && $_POST['nganhHoc'] == 'Kinh tế') echo "checked" ?>> Kinh tế
                    <input type="radio" name="nganhHoc" value="Các ngành khác" 
                        <?php if (isset($_POST['nganhHoc']) && $_POST['nganhHoc'] == 'Các ngành khác') echo "checked" ?>> Các ngành khác
                </td>
                <td>
                    <span class="error"><?php echo $nganhHocErr; ?></span>
                </td>
            </tr>

            <tr id='chonTrinhDo' style="display: <?php echo $displayGiangVien; ?>;">
                <td>Chọn trình độ: </td>
                <td>
                    <input type="radio" name="trinhDo" value="Cử nhân" 
                        <?php if (isset($_POST['trinhDo']) && $_POST['trinhDo'] == 'Cử nhân') echo "checked" ?>> Cử nhân
                    <input type="radio" name="trinhDo" value="Thạc sĩ" 
                        <?php if (isset($_POST['trinhDo']) && $_POST['trinhDo'] == 'Thạc sĩ') echo "checked" ?>> Thạc sĩ
                    <input type="radio" name="trinhDo" value="Tiến sĩ" 
                        <?php if (isset($_POST['trinhDo']) && $_POST['trinhDo'] == 'Tiến sĩ') echo "checked" ?>> Tiến sĩ
                </td>
                <td>
                    <span class="error"><?php echo $trinhDoErr; ?></span>
                </td>
            </tr>

            <tr>
                <td>
                    <input type="submit" value="Hiển thị thông tin">
                </td>
            </tr>
        </table>
        <?php
            echo $str;
        ?>
        </fieldset>
    </form>

    <!-- Script -->
    <script>
        function chonDoiTuong() {
            var radioChonDoiTuong = document.getElementById("sinhVien");
            
            var chonNganh = document.getElementById('chonNganh');
            var nhapLopHoc = document.getElementById('nhapLopHoc');
            var chonTrinhDo = document.getElementById('chonTrinhDo');

            if (radioChonDoiTuong.checked == true) {
                chonNganh.style.display = "table-row";
                nhapLopHoc.style.display = "table-row";
                chonTrinhDo.style.display = "none";
            } else {
                chonNganh.style.display = "none";
                nhapLopHoc.style.display = "none";
                chonTrinhDo.style.display = "table-row";
            }
        }
    </script>

</body>
</html>