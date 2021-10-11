<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Untitled Document</title>

    <style>
        fieldset {
            width: 30rem;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>

    <?php
        class PHAN_SO
        {
            var $tuso, $mauso;

            function get_tuso()
            {
                return $this->tuso;
            }

            function set_tuso($tuso)
            {
                $this->tuso = $tuso;
            }

            function get_mauso()
            {
                return $this->mauso;
            }

            function set_mauso($mauso)
            {
                $this->mauso = $mauso;
            }

            function khoitao_ps($p_ts, $p_ms)
            {
                $this->tuso = $p_ts;
                $this->mauso = $p_ms;
            }

            // tim USCLN cua 2 so
            function USCLN($a, $b)
            {
                // neu phan so am thi doi dau cua tu so
                if($a<0) $a=(-1)*$a;
                $sonho = ($a < $b) ? $a : $b;
                for($i = $sonho; $i > 0; $i--) {
                    if (($a%$i==0) && ($b%$i==0)) {
                        break;
                    }
                }

                return $i;
            }

            // toi gian phan so
            function toigian_ps()
            {
                $uscln = $this->USCLN($this->tuso, $this->mauso);
                $this->tuso = $this->tuso/$uscln;
                $this->mauso = $this->mauso/$uscln;
            }

            // tinh tong hai phan so
            function tong($p_tuso, $p_mauso)
            {
                $ps = new PHAN_SO();
                $ps->khoitao_ps($p_tuso, $p_mauso);
                $ps->tuso = ($this->tuso*$ps->mauso) + ($ps->tuso*$this->mauso);
                $ps->mauso = $this->mauso * $ps->mauso;
                // $ps->toigian_ps();
                return $ps;
            }

            // tinh hieu 2 phan so
            function hieu($p_tuso, $p_mauso)
            {
                $ps = new PHAN_SO();
                $ps->khoitao_ps($p_tuso, $p_mauso);
                $ps->tuso = ($this->tuso*$ps->mauso) - ($ps->tuso*$this->mauso);
                $ps->mauso = $this->mauso*$ps->mauso;
                // $ps->toigian_ps();
                return $ps;
            }
        }
    ?>

    <!-- Xử lý dữ liệu post lên  -->
    <?php
        $tuso_1 = isset($_POST['tuso_1']) ? $_POST['tuso_1'] : '';
        $mauso_1 = isset($_POST['mauso_1']) ? $_POST['mauso_1'] : '';
        $tuso_2 = isset($_POST['tuso_2']) ? $_POST['tuso_2'] : '';
        $mauso_2 = isset($_POST['mauso_2']) ? $_POST['mauso_2'] : '';
        $loiNhapSo = "";


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $error = array();


            if (empty($tuso_1) || empty($mauso_1) || empty($tuso_2) || empty($mauso_2)) {
                $loiNhapSo = "Hãy nhập đầy đủ thông tin để thực hiện phép tính!";
                $error[] = $loiNhapSo;
            } else {
                if (!is_numeric($tuso_1) || !is_numeric($mauso_1) || !is_numeric($tuso_2) || !is_numeric($mauso_2)) {
                    $loiNhapSo = "Hãy nhập số!";
                    $error[] = $loiNhapSo;
                } 
            }
        }
    ?>

    <form action="" method="post">
        <p><label><strong><font color="#6600FF">Chọn phép tính trên phân số</font></strong></label>&nbsp;</p>
        <p>Nhập phân số thứ 1: Tử số: 
        <input type="text" name="tuso_1" id="tuso_1" size="10" maxlength="10" value="<?php echo $tuso_1; ?>">
        Mẫu số:
        <input type="text" name="mauso_1" id="tuso_1" size="10" maxlength="10" value="<?php echo $mauso_1; ?>">
        </p>
        <p>Nhập phân số thứ 2: Tử số:
        <input type="text" name="tuso_2" id="tuso_2" size="10" maxlength="10" value="<?php echo $tuso_2; ?>">
        Mẫu số:
        <input type="text" name="mauso_2" id="mauso_2" size="10" maxlength="10" value="<?php echo $mauso_2; ?>">
        </p>
        <fieldset>
            <legend>Chọn phép tính</legend>
            <p>
                <label>
                    <input type="radio" name="pheptinh" value="cộng" 
                        <?php if (isset($_POST['pheptinh']) && $_POST['pheptinh'] == "cộng") echo "checked";?>> Cộng
                </label>

                <label>
                    <input type="radio" name="pheptinh" value="trừ"
                        <?php if (isset($_POST['pheptinh']) && $_POST['pheptinh'] == "trừ") echo "checked"; ?>> Trừ
                </label>
            </p>
        </fieldset>
        <p>
            <input type="submit" name="Chon_pheptinh" value="Kết quả">
        </p>
    </form>

    <p>
        <span class="error"><?php echo $loiNhapSo; ?></span>
    </p>

    <?php
        if (empty($error)) {
            $ps_1 = new PHAN_SO();
            $ps_1->set_tuso($tuso_1);
            $ps_1->set_mauso($mauso_1);
            $ps_2 = new PHAN_SO();
            $ps_2->khoitao_ps($tuso_2, $mauso_2);
            $ketqua = "";
            
            if (isset($_POST['Chon_pheptinh'])) {
                $pheptinh = $_POST['pheptinh'];
                switch($pheptinh)
                {
                    case "cộng":
                        $ps = new PHAN_SO();
                        $ps = $ps_1->tong($ps_2->tuso, $ps_2->mauso);
                        $ketqua = $ps_1->tuso . "/" . $ps_1->mauso . " + " . $ps_2->tuso . "/" . $ps_2->mauso . " = " . $ps->tuso . "/" . $ps->mauso;
                        break;
                    case "trừ":
                        $ps = new PHAN_SO();
                        $ps = $ps_1->hieu($ps_2->tuso, $ps_2->mauso);
                        $ketqua = $ps_1->tuso . "/" . $ps_1->mauso . " - " . $ps_2->tuso . "/" . $ps_2->mauso . " = " . $ps->tuso . "/" . $ps->mauso;
                        break;

                }

                echo "Phép " . $pheptinh . " là: " . $ketqua;
            }
        }
    ?>

</body>
</html>