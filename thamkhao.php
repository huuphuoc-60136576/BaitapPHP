<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <!-- <link rel="stylesheet" href="../bootstrap-5.1.0-dist/bootstrap-5.1.0-dist/css/bootstrap.min.css"> -->
    <title>SỔ XỐ KHÁNH HÒA</title>
</head>

<body>
    <?php
    if(isset($_POST['n'])) $n=$_POST['n'];
	else $n=0;
    // if(isset($_POST['hthi'])) 
	// {	//Tạo mảng có n phần tử
    //     $arr=array();
    //     for($i=0;$i<=$ngaunhien;$i++){
    //         $arr[$i]=$ngaunhien;
    //     }
    // }
    $arrXoSo = array();


    ?>
    <div class="form">
        <div class="container">
            <form class="signup" action="" method="post">
                <div class="header">
                    <?php
                        date_default_timezone_set("Asia/Ho_Chi_Minh");
                        $time = date("d-m-Y");
                        echo "<h3 align='center'> Kết quả xổ số kiến thiết tỉnh Khánh Hòa ngày $time</h3>";
                    ?>
                </div>
                <div>
                        Nhập số vé:<input type="text" name="n" value= <?php echo $n?>>
                        <input type="submit" name="hthi" value="Hiển thị"/><br>
                        Kết quả: 
                </div>
                <div class="inputs">
                    <table>
                        <tr>
                            <td>Giải 8</td>
                            <td style='color:red'>
                                <?php
                                $ngaunhien = rand(0, 99);
                                if ($ngaunhien < 10)
                                {
                                    $arrXoSo[] = "0" . $ngaunhien;
                                    echo "0" . $ngaunhien;
                                }
                                else
                                {
                                    $arrXoSo[] = $ngaunhien;
                                    echo $ngaunhien;
                                }
                                

                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Giải 7</td>
                            <td>
                                <?php
                                $ngaunhien = rand(0, 999);
                                if ($ngaunhien < 10)
                                {
                                    $arrXoSo[] = "00" . $ngaunhien;
                                    echo "00" . $ngaunhien;
                                }
                                else if ($ngaunhien < 100)
                                {
                                    $arrXoSo[] = "0" . $ngaunhien;
                                    echo "0" . $ngaunhien;
                                }
                                else
                                {
                                    $arrXoSo[] = $ngaunhien;
                                    echo $ngaunhien;
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Giải 6</td>
                            <td>
                                <?php
                                $tam = 2;
                                for ($i = 0; $i < 3; $i++) {
                                    $ngaunhien = rand(0, 9999);
                                    if ($ngaunhien < 10){
                                        $arrXoSo[$tam] = "000" . $ngaunhien;
                                        echo "000" . $ngaunhien;
                                    }
                                    else if ($ngaunhien < 100)
                                    {
                                        $arrXoSo[$tam] = "00" . $ngaunhien;
                                        echo "---";
                                        echo "00" . $ngaunhien;
                                        
                                    }
                                    else if ($ngaunhien < 1000)
                                    {
                                        $arrXoSo[$tam] = "0" . $ngaunhien;
                                        echo "---";
                                        echo "0" . $ngaunhien;
                                    
                                    }
                                    else
                                    {
                                        $arrXoSo[$tam] = $ngaunhien;
                                        echo "---";
                                        echo $ngaunhien;
                                    }
                                    $tam++;
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Giải 5</td>
                            <td>
                                <?php
                                $ngaunhien = rand(0, 9999);
                                if ($ngaunhien < 10)
                                {
                                    $arrXoSo[] = "000" . $ngaunhien;
                                    echo "000" . $ngaunhien;
                                }
                                else if ($ngaunhien < 100)
                                    {
                                        $arrXoSo[] = "00" . $ngaunhien;
                                        echo "00" . $ngaunhien;
                                    }
                                else if ($ngaunhien < 1000)
                                {
                                    $arrXoSo[] = "0" . $ngaunhien;
                                    echo "0" . $ngaunhien;
                                }
                                else
                                {
                                    $arrXoSo[] = $ngaunhien;
                                    echo $ngaunhien;
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Giải 4</td>
                            <td>
                                <?php
                                $tam = 6;
                                for ($i = 0; $i < 7; $i++) {
                                    $ngaunhien = rand(0, 99999);
                                    if ($ngaunhien < 10)
                                    {
                                        $arrXoSo[$tam] = "0000" . $ngaunhien;
                                        echo "0000" . $ngaunhien;
                                    
                                    }
                                    else if ($ngaunhien < 100)
                                    {
                                        $arrXoSo[$tam] = "000" . $ngaunhien;
                                        echo "---";
                                        echo "000" . $ngaunhien;
                                        
                                    }
                                    else if ($ngaunhien < 1000)
                                    {
                                        $arrXoSo[$tam] = "00" . $ngaunhien;
                                        echo "---";
                                        echo "00" . $ngaunhien;
                                    
                                    }
                                    else if ($ngaunhien < 10000)
                                    {
                                        $arrXoSo[$tam] = "0" . $ngaunhien;
                                        echo "---";
                                        echo "0" . $ngaunhien;
                                    
                                    }
                                    else
                                    {
                                        $arrXoSo[$tam] = $ngaunhien;
                                        echo "---";
                                        echo $ngaunhien;
                                    }

                                    $tam++;
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Giải 3</td>
                            <td>
                                <?php
                                $tam = 13;
                                for ($i = 0; $i < 2; $i++) {
                                    $ngaunhien = rand(0, 99999);
                                    if ($ngaunhien < 10)
                                    {
                                        $arrXoSo[$tam] = "0000" . $ngaunhien;
                                        echo "0000" . $ngaunhien;
                                    
                                    }
                                    else if ($ngaunhien < 100)
                                    {
                                        $arrXoSo[$tam] = "000" . $ngaunhien;
                                        echo "---";
                                        echo "000" . $ngaunhien;
                                    
                                    }
                                    else if ($ngaunhien < 1000)
                                    {
                                        $arrXoSo[$tam] = "00" . $ngaunhien;
                                        echo "---";
                                        echo "00" . $ngaunhien;
                                    
                                    }
                                    else if ($ngaunhien < 10000)
                                    {
                                        $arrXoSo[$tam] = "0" . $ngaunhien;
                                        echo "---";
                                        echo "0" . $ngaunhien;
                                        
                                    }
                                    else
                                    {
                                        $arrXoSo[$tam] = $ngaunhien;
                                        echo "---";
                                        echo $ngaunhien;
                                    }

                                    $tam++;
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Giải 2</td>
                            <td>
                                <?php
                                $ngaunhien = rand(0, 99999);
                                if ($ngaunhien < 10)
                                {
                                    $arrXoSo[] = "0000" . $ngaunhien;
                                    echo "0000" . $ngaunhien;
                                }
                                else if ($ngaunhien < 100)
                                {
                                    $arrXoSo[] = "000" . $ngaunhien;
                                    echo "000" . $ngaunhien;
                                }
                                else if ($ngaunhien < 1000)
                                {
                                    $arrXoSo[] = "00" . $ngaunhien;
                                    echo "00" . $ngaunhien;
                                }
                                else if ($ngaunhien < 10000)
                                {
                                    $arrXoSo[] = "0" . $ngaunhien;
                                    echo "0" . $ngaunhien;
                                }
                                else
                                {
                                    $arrXoSo[] = $ngaunhien;
                                    echo $ngaunhien;
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Giải 1</td>
                            <td>
                                <?php
                                $ngaunhien = rand(0, 99999);
                                if ($ngaunhien < 10)
                                {
                                    $arrXoSo[] = "0000" . $ngaunhien;
                                    echo "0000" . $ngaunhien;
                                }
                                else if ($ngaunhien < 100)
                                {
                                    $arrXoSo[] = "000" . $ngaunhien;
                                    echo "000" . $ngaunhien;
                                }
                                else if ($ngaunhien < 1000)
                                {
                                    $arrXoSo[] = "00" . $ngaunhien;
                                    echo "00" . $ngaunhien;
                                }
                                else if ($ngaunhien < 10000)
                                {
                                    $arrXoSo[] = "0" . $ngaunhien;
                                    echo "0" . $ngaunhien;
                                }
                                else
                                {
                                    $arrXoSo[] = $ngaunhien;
                                    echo $ngaunhien;
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Giải ĐB</td>
                            <td  style='color:red'>
                                <?php
                                $ngaunhien = rand(0, 99999);
                                if ($ngaunhien < 10)
                                {
                                    $arrXoSo[] = "0000" . $ngaunhien;
                                    echo "0000" . $ngaunhien;
                                }
                                else if ($ngaunhien < 100)
                                {
                                    $arrXoSo[] = "000" . $ngaunhien;
                                    echo "000" . $ngaunhien;
                                }
                                else if ($ngaunhien < 1000)
                                {
                                    $arrXoSo[] = "00" . $ngaunhien;
                                    echo "00" . $ngaunhien;
                                }
                                else if ($ngaunhien < 10000)
                                {
                                    $arrXoSo[] = "0" . $ngaunhien;
                                    echo "0" . $ngaunhien;
                                }
                                else
                                {
                                    $arrXoSo[] = $ngaunhien;
                                    echo $ngaunhien;
                                }
                                ?>
                            </td>
                        </tr>
                </table>
            </div>
           
        </form>

        <?php
            foreach ($arrXoSo as $value) {
                if ($value == $n) {
                    echo "Bạn đã trúng độc đắt!";
                }
            }
        ?>
    </div>
</div>
</body>
</html>