<?php
    // Start the session
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kết quả phép tính</title>
</head>
<body>
    
    <?php
        $phepTinh = $_SESSION['phepTinh'];
        $so1 = $_SESSION['soThuNhat'];
        $so2 = $_SESSION['soThuHai'];
    

        switch ($phepTinh) {
            case 'Cộng':
                $ketQua = $so1 + $so2;
                break;
            case 'Trừ':
                $ketQua = $so1 - $so2;
                break;
            
            case 'Nhân':
                $ketQua = $so1 * $so2;
                break;
            
            case 'Chia':
                $ketQua = $so1 / $so2;
                break;
                        
            default:
                # code...
                break;
        }

        // remove all session variables
        session_unset();

        // destroy the session
        session_destroy();
    ?>


    <table>
        <caption>PHÉP TÍNH TRÊN HAI SỐ</caption>
        <tr>
            <td>Chọn phép tính: </td>
            <td>
                <?php echo $phepTinh; ?>
            </td>
        </tr>
        <tr>
            <td>Số 1: </td>
            <td><input type="text" value="<?php echo $so1; ?>"></td>
        </tr>
        <tr>
            <td>Số 2: </td>
            <td><input type="text" value="<?php echo $so2; ?>"></td>
        </tr>
        <tr>
            <td>Kết quả: </td>
            <td><input type="text" value="<?php echo $ketQua; ?>"></td>
        </tr>
        <tr>
            <td></td>
            <td><a href="javascript:window.history.back(-1);">Trở về trang trước</a></td>
        </tr>
    </table>

</body>
</html>