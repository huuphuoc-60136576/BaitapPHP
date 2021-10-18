<!DOCTYPE html>
<html>
<head>
    <title>Xác nhận giới tính</title>
</head>
<body>
    
    <form action="" method="post">
        <input type="radio" name="gioiTinh" value="Nam" 
            <?php if (isset($_POST['gioiTinh']) && $_POST['gioiTinh'] == "Nam") echo "checked"; ?>> Nam
        <input type="radio" name="gioiTinh" value="Nữ" 
            <?php if (isset($_POST['gioiTinh']) && $_POST['gioiTinh'] == "Nữ") echo "checked"; ?>> Nữ
        <br>
        <input type="submit" value="Xác nhận">
    </form>

    <?php
        if (isset($_POST['gioiTinh'])) echo "Giới tính: " . $_POST['gioiTinh'];
    ?>
</body>
</html>