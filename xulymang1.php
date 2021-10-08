<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Xử lý n</title>
</head>
<body>
<?php

	$soMuonChen = "";
	$ketqua="";


	if(isset($_POST['n']) && isset($_POST['soMuonChen'])) 
	{
		$soMuonChen = $_POST['soMuonChen'];
		$n = $_POST['n'];
		
		if(is_numeric($n) && $n >= 0) {		
			if(isset($_POST['hthi'])) 
			{	//Tạo mảng có n phần tử, các phần tử có giá trị [-100,100]
				$arr=array();
				for($i=0;$i<$n;$i++)
				{
					$x=rand(-200,200);
					$arr[$i]=$x;
				}
				//In ra mảng vừa tạo
				$ketqua="Mảng được tạo là:" .implode(" ",$arr)."&#13;&#10;";

				// Sắp xếp mảng tăng dần theo giá trị
				asort($arr);
				$ketqua .="Mảng sau khi được sắp xếp là:" . "&#13;&#10;" .implode(" ",$arr) . "&#13;&#10;"; 					

				// Chèn một số vào một vị trí bất kỳ
				$viTriBatKy = rand(0, $n - 1);
				ksort($arr);
				for ($i=$n; $i > $viTriBatKy; $i--) { 
					$arr[$i] = $arr[$i-1]; 
				}
				echo $viTriBatKy . "<br>";
				echo "<pre>";
				var_dump($arr);
				echo "</pre>";
			}
		} else {
			$ketqua = "Vui lòng nhập lại, n là một số tự nhiên!";
		}
	}
	else
	{
		$n = 0;
		$soMuonChen = 0;
	}

?>
<form action="" method="post">
	Nhập n: <input type="text" name="n" value="<?php echo $n?>"/> <br>
	Nhập số muốn chèn: <input type="text" name="soMuonChen" value="<?php echo $soMuonChen?>"/> <br>
	<input type="submit" name="hthi" value="Hiển thị"/> <br>
	Kết quả: <br>
	<textarea cols="70" rows="10" name="ketqua"> <?php echo $ketqua?></textarea>
</form>
</body>
</html>
