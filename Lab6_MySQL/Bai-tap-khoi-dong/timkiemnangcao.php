<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Tìm kiếm sữa</title>
</head>
<body>
    <?php
        require('connect.php');
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <table bgcolor="#eeeeee" align="center" width="60%" border="0">
            <tr bgcolor="#eeee10">
                <td colspan="2" align="center">
                    <font color="blue"><h2>THÊM SỮA MỚI</h2></font>
                </td>
            </tr>
            <tr>
                <td>Mã sữa: </td>
                <td>
                    <input type="text" name="ma_sua" size="20" value="<?php if(isset($_POST['ma_sua'])) echo $_POST['ma_sua']; ?>">
                </td>
            </tr>
            <tr>
                <td>Tên sữa: </td>
                <td>
                    <input type="text" name="ten_sua" size="50" value="<?php if(isset($_POST['ten_sua'])) echo $_POST['ten_sua'] ?>">
                </td>
            </tr>
            <tr>
                <td>Hãng sữa: </td>
                <td><select name="hang_sua">
                    <?php
                        $query="select * from Hang_sua"; // Hiển thị tên các hàng sữa
                        $result=mysqli_query($dbc, $query);
                        if (mysqli_num_rows($result) <> 0) {
                            while($row=mysqli_fetch_array($result)) {
                                $ma_loai_sua=$row['Ma_hang_sua'];
                                $ten_hang=$row['Ten_loai'];
                                echo "<option value='".$ma_loai_sua."'";
                                    if(isset($_REQUEST['loai_sua']) && ($_REQUEST['loai_sua']==$ma_loai_sua)) echo "selected='selected'";
                                echo ">".$ten_loai."</option>";
                            }
                        }
                        mysqli_free_result($result);
                    ?>
                </select>
            </td>
            </tr>
            <tr>
                <td>Trọng lượng: </td>
                <td>
                    <input type="text" name="trong_luong" size="20" value="<?php if(isset($_POST['trong_luong'])) echo $_POST['trong_luong']; ?>"> (gr hoặc ml)
                </td>
            </tr>
            <tr>
                <td>Đơn giá: </td>
                <td>
                    <input type="text" name="don_gia" size="20" value="<?php if(isset($_POST['don_gia'])) echo $_POST['don_gia']; ?>"> (VNĐ)
                </td>
            </tr>
            <tr>
                <td>Thành phần dinh dưỡng: </td>
                <td>
                    <textarea name="tp_dinh_duong" cols="50" rows="3"><?php
                        if (isset($_POST['tp_dinh_duong'])) echo $_POST['tp_dinh_duong'];
                    ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Lợi ích: </td>
                <td>
                    <textarea name="loi_ich" cols="50" rows="3"><?php
                        if(isset($_POST['loi_ich'])) echo $_POST['loi_ich'];
                    ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Hình ảnh: </td>
                <td>
                    <input type="file" name="hinh" size="80" value="<?php if(isset($_POST['hinh'])) echo $_POST['hinh'];?>">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="them" size="10" value="Thêm mới"></td>
            </tr>
        </table>
    </form>
    
    <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $errors = array(); // khởi tạo 1 mảng chứa lỗi
            // kiem tra ma sua
            if (empty($_POST['ma_sua'])) {
                $errors[] = "Bạn chưa nhập mã sữa";
            } else {
                $ma_sua=trim($_POST['ma_sua']);
            }
            // kiểm tra tên sản phẩm
            if (empty($_POST['ten_sua'])){
                $errors[] = "Bạn chưa nhập tên sữa";
            } else {
                $ten_sua = trim($_POST['ten_sua']);
            }
            // cap nhat ma hang sua va ma loai sua
            $ma_hang_sua=$_POST['hang_sua'];
            $ma_hang_sua=$_POST['loai_sua'];
            // kiem tra trong luong
            if (empty($_POST['trong_luong'])) {
                $errors[] = "Trọng lượng phải là kiểu số";
            } else {
                $trong_luong=trim($_POST['trong_luong']);
            }
            // kiem tra don gia
            if (empty($_POST['don_gia'])) {
                $errors[] = "Bạn chưa nhập đơn giá";
            } elseif(!is_numeric($_POST['don_gia'])){
                $errors[] = "Đơn giá phải trả là kiểu số";
            } else {
                $don_gia=trim($_POST['don_gia']);
            }
            // cap nhat thanh phan dinh duong va loi ich
            $tp_dinh_duong=$_POST['tp_dinh_duong'];
            $loi_ich=$_POST['loi_ich'];
            // kiểm tra hình sản phẩm và thực hiện upload file
            if ($_FILES['hinh']['name']!="") {
                $hinh=$_FILES['hinh'];
                $ten_hinh=$hinh['name'];
                $type=$hinh['type'];
                $size=$hinh['size'];
                $tmp=$hinh['tmp_name'];
                if(($type=='image/jpeg') || ($type=='image/bmp' || ($type=='image/gif') && $size < 8000)) {
                    move_uploaded_file($tmp, "Hinh_sua/".$ten_hinh);
                }
            }
            if(empty($errors)) // neu khong co loi xay ra
            {
                $query = "INSERT INTO sua VALUES ('$ma_sua', '$ten_sua', '$ma_hang_sua', '$ma_loai_sua', '$trong_luong', '$don_gia', '$tp_dinh_duong', '$loi_ich', '$ten_hinh')";
                $result = mysqli_query($dbc, $query);
                if (mysqli_affected_rows($dbc) == 1) {//neu them thanh cong
                    $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
                    echo '<table align="center" border="1" cellpadding="5" cellspacing="5" style="border-collapse:collapse;">
                            <tr bgcolor="#eeeeee"><td colspan="2" algin="center"><h3>'.$row['Ten_sua'].' - '.$row['Ten_hang_sua'].'</h3></td></tr>';
                        echo '<tr><td><img src="Hinh_sua/'.$row['Hinh'].'"/></td>';
                            echo '';

                }
            }
        }
    ?>
</body>
</html>