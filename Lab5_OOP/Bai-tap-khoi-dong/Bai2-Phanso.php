<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Untitled Document</title>
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

            function set_tuso()
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
                $ps->tuso = ($this->tuso);
            }
        }
    ?>

    <form action="" method="post">
        <p><label><strong><font color="#6600FF">Chọn phép tính trên phân số</font></strong></label>&nbsp;</p>
        <p>Nhập phân số thứ 1: Tử số: 
        <input type="text" name="tuso_1" id="tuso_1" size="10" maxlength="10" value="">
        Mẫu số:
        <input type="text" name="mauso_1" id="tuso_1" size="10" maxlength="10" value="">
        </p>
        <p>Nhập phân số thứ 2: Tử số:
        <input type="text" name="tuso_2" id="tuso_2" size="10" maxlength="10" value="">
        Mẫu số:
        <input type="text" name="mauso_2" id="mauso_2" size="10" maxlength="10" value="">
        </p>
        <fieldset>
            <legend>Chọn phép tính</legend>
            <p>
                <label>
                    <input type="radio" name="pheptinh" value="cộng"> Cộng
                </label>

                <label>
                    <input type="radio" name="pheptinh" value="trừ"> Trừ
                </label>
            </p>
        </fieldset>
        <p>
            <input type="submit" name="Chon_pheptinh" value="Kết quả">
        </p>
    </form>
</body>
</html>