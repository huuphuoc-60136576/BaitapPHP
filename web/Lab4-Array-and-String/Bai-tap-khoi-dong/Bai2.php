<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 2</title>
</head>
<body>

    <?php
        $songList = array(
            "Có hẹn với thanh xuân" => 4,
            "Sau tất cả" => 1,
            "Cơn mưa cuối" => 2,
            "2 AM" => 3,
        );

        echo "Danh sách bài hát chưa sắp xếp: <br>";

        echo "<table>";
        foreach ($songList as $tenBaiHat => $thuTu) {
            echo "<tr><td>Tên bài hát: " . $tenBaiHat . " hạng: " . $thuTu . "</td></tr>"; 
        }
        echo "</table>";
        echo "<br>";

        asort($songList);
        echo "Danh sách bài hát sau khi sắp xếp: <br>";
        echo "<table>";
        foreach ($songList as $tenBaiHat => $thuTu) {
            echo "<tr><td>Tên bài hát: " . $tenBaiHat . " hạng: " . $thuTu . "</td></tr>"; 
        }
        echo "</table>";
    ?>

</body>
</html>