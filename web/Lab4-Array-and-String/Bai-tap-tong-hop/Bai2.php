<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 2</title>

    <style>
        caption {
            background-color: lightskyblue;
            border: 1px solid black;
            border-bottom: none;
            color: white;
        }

        table {
            background-color: lightgrey;
            border: 1px solid black;
        }

        .error {
            color: red;
        }

        .yeuCau {
            text-align: center;
        }
    </style>
</head>
<body>
    
    <?php
        $daySo = "";
        $ketQua = "";

        $err = array();

        $daySoErr = "";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $daySo = $_POST['daySo'];

            if (empty($daySo)) {
                $daySoErr = "Vui lòng nhập dãy số!";
                $err[] = $daySoErr;
            }

            $mang = explode(",", $daySo);

            foreach ($mang as $giaTri) {
                if (!is_numeric($giaTri)) {
                    $daySoErr = "Xuất hiện ký tự lạ trong dãy!";
                    $err[] = $daySoErr;
                }
            }

            if (empty($err)) {
                $tong = array_sum($mang);
                $ketQua = $tong;
            }
        }
    
    ?>

    <form action="" name="tinhTrenDaySo" method="post">
        <table>
            <caption>NHẬP VÀ TÍNH TRÊN DÃY SỐ</caption>
            <tr>
                <td>Nhập dãy số: </td>
                <td>
                    <input type="text" name="daySo" value="<?php echo $daySo; ?>">
                </td>
                <td>
                    <span class="error">(*)</span>
                    <span class="error"><?php echo $daySoErr; ?></span>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Tổng dãy số">
                </td>
            </tr>
            <tr>
                <td>Tổng dãy số: </td>
                <td>
                    <input type="text" disabled value="<?php echo $ketQua; ?>">
                </td>
            </tr>
            <tr>
                <td colspan="3" class="yeuCau">
                    <span class="error">(*)</span> Các số được nhập cách nhau bằng dấu ","
                </td>
            </tr>
        </table>
    </form>

</body>
</html>