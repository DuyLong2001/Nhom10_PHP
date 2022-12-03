<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
<?php
    $n = "" ;
 
    function TaoMang($n) {     
        $arr = array();
        for($i = 0;$i<$n;$i++) {
           $arr[$i] = random_int(-50,150);
        }
        return $arr;
    }
    function DemSoChan($arr) {
        $a =0;
        foreach($arr as $value) {
            if($value % 2 == 0) {
                $a++;
            }
        }
        return $a;
    }
    function NhoHon100($arr) {
        $a =0;
        foreach($arr as $value) {
            if($value <  100) {
                $a++;
            }
        }
        return $a;
    }
    function TongSoAm($arr) {
        $S =0;
        foreach($arr as $value) {
            if($value <  0) {
               $S = $S + $value;
            }
        }
        return $S;
    }
    function ViTriZeRo($arr) {
        $vt=array();
        $vt1= array();
        $dem=0;
        foreach($arr as $vitri=>$value) {
            if($value ==  0) {
              $vt[]=$vitri;
              $dem++;
            }
        }
        if($dem!=0){
            $vt1= implode(' ',$vt);
            echo "<br>Vị trí số 0 là".$vt1;
        }
        else{
            echo "<br>Không có số 0";
        }
    }
    function SapXepTang(&$arr) {
        for($i=0;$i<(count($arr)-1);$i++) {
        for($j=$i+1;$j<count($arr);$j++) {
            if($arr[$i] > $arr[$j]) {
                $tam = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $tam;
            }
        }

        }
        foreach($arr as $value) {
            echo $value," ";
        }
    }




?>
    <h1>Bài tập 1</h1>
<form action="" method="post">
    <h3>Nhập sô phần tử: </h3>
<input type="text" name="n" value="<?php  echo $n ?>">
        <input type="submit" value="Thực hiện" name="submit">
        <div>
<?php 
    if(isset($_POST['submit'])) {
        if(isset($_POST["n"]) and $_POST["n"]==(int) $_POST["n"] and $_POST['n']>0) {
            $n=$_POST['n'];
                 
               $mang =  TaoMang($n);
               echo "Mảng: ";
               $Mang1 = implode(' ',$mang);
               echo $Mang1;
               $c = DemSoChan($mang);
               echo "<br>Số phần tử chẵn là ", $c;
               $d = NhoHon100($mang);
               echo "<br>Số phần tử nhỏ hơn 100 là ", $d;
               $e = TongSoAm($mang);
               echo "<br>Tổng số âm là ", $e;
               ViTriZeRo($mang);
               echo "<br>Sắp xếp tăng ";
               SapXepTang($mang);
            

        }
        else {
            echo "N không phải là số nguyên dương ";
        }
    }

    
 
?>
</form>

</body>
</html>
