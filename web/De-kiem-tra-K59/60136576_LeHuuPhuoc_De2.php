<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài kiểm tra giữa kỳ - Đề 2</title>
    
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    
    <?php
        class Sach
        {
            var $maSach;
            var $tenSach;
            var $tacGia;
            var $donGia;
            var $theLoai;

            public function __construct($maSach, $tenSach, $tacGia, $donGia, $theLoai)
            {
                $this->maSach = $maSach;
                $this->tenSach = $tenSach;
                $this->tacGia = $tacGia;
                $this->donGia = $donGia;
                $this->theLoai = $theLoai;
            }

            public function getMaSach()
            {
                return $this->maSach;
            }

            public function getTenSach()
            {
                return $this->tenSach;
            }

            public function getTacGia()
            {
                return $this->tacGia;
            }

            public function getDonGia()
            {
                return $this->donGia;
            }

            public function getTheLoai()
            {
                return $this->theLoai;
            }   
        }
    ?>

    <!-- Xử lý dữ liệu post lên -->
    <?php
        
        // Lưu sách vào một dánh sách
        $dsSach = array();
        $path = '60136576_LeHuuPhuoc_De2.txt';
        $fp = @fopen($path, "r");
        if (!$fp) {
            echo "Mở file thất bại!";
        } else {
            if (filesize($path) != 0) {
                while (!feof($fp)) {
                    $data = fgets($fp);
                    $temp = explode(", ", $data);
                    if (!empty($temp)) {
                        $dsSach[$temp[0]] = array($temp[1], $temp[2], $temp[3], $temp[4]);
                    }
                }

                // đóng file
                fclose($fp);
            } 
        }

    
        $maSach = $tenSach = $tacGia = $donGia = $theLoai = "";
        
        $err = array();
        
        $maSachErr = $tenSachErr = $tacGiaErr = $donGiaErr = "";

        if (isset($_POST['themSach'])) {
            $maSach = $_POST['maSach'];
            $tenSach = $_POST['tenSach'];
            $tacGia = $_POST['tacGia'];
            $donGia = $_POST['donGia'];
            $theLoai = $_POST['theLoai'];

            if (empty($maSach)) {
                $maSachErr = "Vui lòng nhập mã sách!";
                $err[] = $maSachErr;
            }

            foreach ($dsSach as $key => $value) {
                if ($maSach == $key) {
                    $maSachErr = "Mã sách này đã tồn tại!";
                    $err[] = $maSachErr;
                    break;
                }
            }

            if (empty($tenSach)) {
                $tenSachErr = "Vui lòng nhập tên sách!";
                $err[] = $tenSachErr;
            }

            if (empty($tacGia)) {
                $tacGiaErr = "Vui lòng nhập tác giả!";
                $err[] = $tacGiaErr;
            }

            if (!is_numeric($donGia)) {
                $donGiaErr = "Vui lòng nhập đơn giá!";
                $err[] = $donGiaErr;
            }

            if (empty($err)) {
                $sach = array($maSach, $tenSach, $tacGia, $donGia, $theLoai);

                $path = '60136576_LeHuuPhuoc_De2.txt';
                $fp = @fopen($path, "a+");

                if (!$fp) {
                    echo "Mở file thất bại!";
                } else {
                    if (filesize($path) == 0) {
                        $data = implode(", ", $sach);
                    } else {
                        $data = "\n" . implode(", ", $sach);
                    }

                    // ghi vào file
                    fwrite($fp, $data);

                    // đóng file
                    fclose($fp);
                }
            }
        }


    ?>

    <form action="" method="post">
        <table>
            <tr>
                <td>Mã sách: </td>
                <td>
                    <input type="text" name="maSach" value="<?php echo $maSach; ?>">
                </td>
                <td>
                    <span class="error"><?php echo $maSachErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>Tên sách: </td>
                <td>
                    <input type="text" name="tenSach" value="<?php echo $tenSach; ?>">
                </td>
                <td>
                    <span class="error"><?php echo $tenSachErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>Tác giả: </td>
                <td>
                    <input type="text" name="tacGia" value="<?php echo $tacGia; ?>">
                </td>
                <td>
                    <span class="error"><?php echo $tacGiaErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>Đơn giá: </td>
                <td>
                    <input type="text" name="donGia" value="<?php echo $donGia; ?>">
                </td>
                <td>
                    <span class="error"><?php echo $donGiaErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>Thể loại: </td>
                <td>
                    <select name="theLoai">
                        <option value="Trinh thám" 
                            <?php if (isset($_POST['theLoai']) && $_POST['theLoai'] == "Trinh thám") echo "selected"; ?>>Trinh thám</option>
                        <option value="Lãng mạn" 
                            <?php if (isset($_POST['theLoai']) && $_POST['theLoai'] == "Lãng mạn") echo "selected"; ?>>Lãng mạn</option>
                        <option value="Văn học" 
                            <?php if (isset($_POST['theLoai']) && $_POST['theLoai'] == "Văn học") echo "selected"; ?>>Văn học</option>                    
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="themSach" value="Thêm sách">
                    <input type="submit" name="xemSachTruyen" value="Xem danh sách truyện">
                </td>
            </tr>
        </table>
    </form>

    <?php
        // Xem danh sách truyện
        if (isset($_POST['xemSachTruyen'])) {
            echo "<table>";
            echo "<tr>";
            echo "<th>Mã sách</th>";
            echo "<th>Tên sách</th>";
            echo "<th>Tác giả</th>";
            echo "<th>Dơn giá</th>";
            echo "<th>Thể loại</th>";
            echo "</tr>";

            foreach ($dsSach as $key => $sach) {
                echo "<tr>";
                echo "<td>$key</td>";
                foreach ($sach as $thongTin) {
                    echo "<td>$thongTin</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
    ?>
</body>
</html>