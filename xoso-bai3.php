<html>
<head>
    
</head>
<body>    
    <?php
        $giaiTam = rand(0, 99);       
        if ($giaiTam < 10) {
            $giaiTam = "0" . $giaiTam;
        } else {
            $giaiTam = $giaiTam;
        }

        $giaiBay = rand(0, 999);
        if ($giaiBay < 10) {
            $giaiBay = "00" . $giaiBay;
        } else if ($giaiBay < 100) {
            $giaiBay = "0" . $giaiBay;
        } else {
            $giaiBay = $giaiBay;
        }

        $giaiSau = array();
        for ($i=0; $i <= 2; $i++) {
            $temp = rand(0, 9999);

            if ($temp < 10) {
            $giaiSau[$i] = "000" . $temp;
            } else if ($temp < 100) {
                $giaiSau[$i] = "00" . $temp;
            } else if ($temp < 1000) {
                $giaiSau[$i] = "0" . $temp;
            } else {
                $giaiSau[$i] = $temp;
            }
        }
           
        $giaiNam = rand(0, 9999);
        if ($giaiNam < 10) {
            $giaiNam = "000" . $giaiNam;
        } else if ($giaiNam < 100) {
            $giaiNam = "00" . $giaiNam;
        } else if ($giaiNam < 1000) {
            $giaiNam = "0" . $giaiNam;
        } else {
            $giaiNam = $giaiNam;
        }

        // Khai báo một mảng giải tư
        $giaiTu = array();
        for ($i=0; $i < 7; $i++) { 
            $tam = rand(0, 99999);

            // Có một chữ số
            if ($tam < 10) {
                $giaiTu[$i] = "0000" . $tam;
            } else if ($tam < 100) {
                $giaiTu[$i] = "000" . $tam;
            } else if ($tam < 1000) {
                $giaiTu[$i] = "00" . $tam;
            } else if ($tam < 10000) {
                $giaiTu[$i] = "0" . $tam;
            } else {
                $giaiTu[$i] = $tam;
            }
        }

        $giaiBa = array();
        for ($i=0; $i < 2; $i++) { 
            $tam = rand(0, 99999);

            // Có một chữ số
            if ($tam < 10) {
                $giaiBa[$i] = "0000" . $tam;
            } else if ($tam < 100) {
                $giaiBa[$i] = "000" . $tam;
            } else if ($tam < 1000) {
                $giaiBa[$i] = "00" . $tam;
            } else if ($tam < 10000) {
                $giaiBa[$i] = "0" . $tam;
            } else {
                $giaiBa[$i] = $tam;
            }
        }

        $giaiHai = rand(0, 99999);
        // Có một chữ số
        if ($giaiHai < 10) {
            $giaiHai = "0000" . $giaiHai;
        } else if ($giaiHai < 100) {
            $giaiHai = "000" . $giaiHai;
        } else if ($giaiHai < 1000) {
            $giaiHai = "00" . $giaiHai;
        } else if ($giaiHai < 10000) {
            $giaiHai = "0" . $giaiHai;
        } else {
            $giaiHai = $giaiHai;
        }
        
        $giaiNhat = rand(0, 99999);
        // Có một chữ số
        if ($giaiNhat < 10) {
            $giaiNhat = "0000" . $giaiNhat;
        } else if ($giaiNhat < 100) {
            $giaiNhat = "000" . $giaiNhat;
        } else if ($giaiNhat < 1000) {
            $giaiNhat = "00" . $giaiNhat;
        } else if ($giaiNhat < 10000) {
            $giaiNhat = "0" . $giaiNhat;
        } else {
            $giaiNhat = $giaiNhat;
        }

        $giaiDB = rand(0, 999999);
        // Có một chữ số
        if ($giaiDB < 10) {
            $giaiDB = "00000" . $giaiDB;
        } else if ($giaiDB < 100) {
            $giaiDB = "0000" . $giaiDB;
        } else if ($giaiDB < 1000) {
            $giaiDB = "000" . $giaiDB;
        } else if ($giaiDB < 10000) {
            $giaiDB = "00" . $giaiDB;
        } else if ($giaiDB < 100000) {
            $giaiDB = "0" . $giaiDB;
        }  else {
            $giaiDB = $giaiDB;
        }
        

        $thongBao = "";
        if(isset($_POST['veSo'])) {
            $veSo = $_POST['veSo'];

            if ($veSo % 100 == $giaiTam) {
                $thongBao = "Trúng giải tám";
            }

            if ($veSo % 1000 == $giaiBay) {
                $thongBao = "Trúng giải bảy";
            }

            for ($i = 0; $i < 3; $i++) {
                if ($veSo % 10000 == $giaiSau[$i]) {
                    $thongBao = "Trúng giải sáu";
                    break;
                }
            }

            if ($veSo % 10000 == $giaiNam) {
                $thongBao = "Trúng giải năm";
            }

            for ($i = 0; $i < 7; $i++) {
                if ($veSo % 100000 == $giaiTu[$i]) {
                    $thongBao = "Trúng giải tư";
                    break;
                }
            }

            for ($i = 0; $i < 2; $i++) {
                if ($veSo % 100000 == $giaiBa[$i]) {
                    $thongBao = "Trúng giải ba";
                    break;
                }
            }
            
            if ($veSo % 100000 == $giaiHai) {
                $thongBao = "Trúng giải hai";
            }

            if ($veSo % 100000 == $giaiNhat) {
                $thongBao = "Trúng giải nhất";
            }

            if ($veSo == $giaiDB) {
                $thongBao = "Trúng giải đặc biệt!";
            }

            
        } else {
            $veSo = "";
        }

    ?>

    <table>
        <tr>
            <td>Giải 8 </td>
            <td><?php echo $giaiTam; ?></td>
        </tr>
        <tr>
            <td>Giải 7 </td>
            <td><?php echo $giaiBay; ?></td>
        </tr>
        <tr>
            <td>Giải 6 </td>
            <td><?php echo $giaiSau[0] . " " . $giaiSau[1] . " " . $giaiSau[2] ?></td>
        </tr>
        <tr>
            <td>Giải 5 </td>
            <td><?php echo $giaiNam; ?></td>
        </tr>
        <tr>
            <td>Giải 4 </td>
            <td>
                <?php
                    for ($i = 0; $i < 7; $i++) {
                        echo $giaiTu[$i] . " ";
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td>Giải 3 </td>
            <td><?php echo $giaiBa[0] . " " . $giaiBa[1] ?></td>
        </tr>
        <tr>
            <td>Giải 2 </td>
            <td><?php echo $giaiHai; ?></td>
        </tr>
        <tr>
            <td>Giải 1 </td>
            <td><?php echo $giaiNhat; ?></td>
        </tr>
        <tr>
            <td>ĐB</td>
            <td><?php echo $giaiDB; ?></td>
        </tr>
    </table>
    
    <form action="xoso-bai3.php" method="post">
        <table>
            <tr>
                <td>Nhập vé số để kiểm: </td>
                <td><input type="text" name="veSo" value="<?php echo $veSo; ?>" /></td>
                <td><input type="submit" value="Kiểm tra" /></td>
            </tr>
            <tr>
                <td>Thông báo: </td>
                <td><?php echo $thongBao; ?></td>
            </tr>
        </table>
    </form>
</body>
</html>