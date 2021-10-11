<?php
    $str = "191 17 108 12 -33 -43 39 81";

    $arr = explode(" ", $str);
    $vitri = 4;
    $n = 7;

    function sapxetuyy(&$arr,$vitri,$n)
    {
        //tang dan
        for($i=0;$i<$vitri-1;$i++)
        {
            for($j=$vitri-1;$j>$i;$j--)
            {
                if($arr[$j]<$arr[$i])
                {
                    $arr[$i]=$arr[$i]+$arr[$j];
                    $arr[$j]=$arr[$i]-$arr[$j];
                    $arr[$i]=$arr[$i]-$arr[$j];
                }
            }
        }
        //giam dan
        for($i=$vitri+1;$i<$n;$i++)
        {
            for($j=$n;$j>$i;$j--)
            {
                if($arr[$j]>$arr[$i])
                {
                    $arr[$i]=$arr[$i]+$arr[$j];
                    $arr[$j]=$arr[$i]-$arr[$j];
                    $arr[$i]=$arr[$i]-$arr[$j];
                }
            }
        }
    }

    sapxetuyy($arr, $vitri, $n);

    echo implode(", ", $arr);
?>