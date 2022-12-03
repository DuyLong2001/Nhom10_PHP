<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
                function sap_tang($mang){
                     $tg=0;
                    for($i = 0; $i < count($mang)-1 ;$i++){
                        for($j = $i + 1; $j < count($mang); $j++){
                            if($mang[$i] < $mang[$j]){
                                // Hoan vi 2 so a[i] va a[j]
                                $tg = $mang[$i];
                                $mang[$i] = $mang[$j];
                                $mang[$j] = $tg;        
                            }
                        }
                       
                    }
                    return $mang;
                }
                function sap_giam($mang){
                    $tg=0;
                   for($i = 0; $i < count($mang)-1 ;$i++){
                       for($j = $i + 1; $j < count($mang); $j++){
                           if($mang[$i] > $mang[$j]){
                               // Hoan vi 2 so a[i] va a[j]
                               $tg = $mang[$i];
                               $mang[$i] = $mang[$j];
                               $mang[$j] = $tg;        
                           }
                       }
                      
                   }
                   return $mang;
               }
       
        if(isset($_POST['submit']) and isset($_POST['mang'])) {
            $x=$_POST['mang'];
            $arr= explode(",",$x);
            $kq=sap_giam($arr);
            $kq1=sap_tang($arr);

        }

    
    ?>
<form action="" method="post">
    <table align="center" bgcolor="#faebd7">
        <tr>
            <td colspan="2" bgcolor="orange"><h1>SẮP XẾP MẢNG</h1></td>
        </tr>
        <tr>
            <td>Nhập mảng</td>
            <td>
                <input type="text" name="mang" value="<?php if(isset($x)) echo $x; else echo ""?>">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" value="Sắp sếp tăng giảm">
            </td>
            
        </tr>
        <tr>
        <td>Sau khi sắp xếp</td>
        </tr>
    
        <tr>
            <td>Tăng dần</td>
            <td>
                <input type="text" name="mang2" value="<?php 
                if(isset($kq)) {
                    for($i=0;$i<count($kq);$i++){
                        if($i==count($kq1)-1){
                            echo $kq[$i];
                        }else{
                            echo $kq[$i].",";
                        }
                    }
                } else echo "";
                
                ?>" readonly>
            </td>
        </tr>
        <tr>
            <td>Gỉam dần</td>
            <td>
                <input type="text" name="mang3" value="<?php 
                if(isset($kq1)) {
                    for($i=0;$i<count($kq1);$i++){
                        if($i==count($kq1)-1){
                            echo $kq1[$i];
                        }else{
                            echo $kq1[$i].",";
                        }
                       
                    }
                } else echo "";
                ?>"readonly>
            </td>
        </tr>

    </table>
</form>
    
</body>
</html>