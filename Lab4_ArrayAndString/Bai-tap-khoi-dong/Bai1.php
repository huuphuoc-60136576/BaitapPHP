<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Xử lý n</title>
</head>
<body>
<?php
    if (isset($_POST['n'])) $n=$_POST['n'];
    else $n=0;

    $ketqua="";
    if(isset($_POST['hthi']))
    {   // Tạo mảng có n phần tử, các phần tử có giá trị [-200, 200]
        $arr = array();
        for ($i=0; $i < $n; $i++) { 
            $x = rand(-200, 200);
            $arr[$i] = $x;
        }

        //
    }
?>
</body>
</html>