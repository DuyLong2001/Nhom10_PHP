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
            if(isset($_POST['gtln'])){
                $phantu=$_POST['gtln'];
            }
            function tao_mang($n){
                for($i=0;$i<$n;$i++){
                    $arr[$i]=rand(0,20);
                }
                return $arr;
            }
           
        if(isset($_POST['submit']) ) {
            $kq=0;
            $arr= tao_mang($phantu);
            $GTLN= max($arr);
            $GTNN= min($arr);
            foreach($arr as $value){
                $kq=$kq+$value;
            }
        }

    ?>
<form action="" method="post">
    <table align="center" bgcolor="#faebd7">
        <tr>
            <td colspan="2" bgcolor="orange"><h1>Tính toán </h1></td>
        </tr>
        <tr>
            <td>nhập số phần tử: </td>
            <td>
                <input type="text" name="gtln" value="<?php if(isset($phantu)) echo $phantu; else echo ""?>">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" value="Phát sinh và tính toán">
            </td>
        </tr>
        <tr>
            <td>Mảng</td>
            <td>
                <input type="text" name="mang" value="<?php if(isset($arr)) {
                    for($i=0;$i<$phantu;$i++){
                        echo $arr[$i]." ";
                    }
                } else echo "";

                
                ?>" >
            </td>
        </tr>
        <tr>
            <td>GTLN (MAX) trong mảng</td>
            <td>
                <input type="text" name="gtln1" value="<?php if(isset($GTLN)) echo $GTLN; else echo ""?>">
            </td>
        </tr>
        <tr>
            <td>GTNN (MIN) trong mảng</td>
            <td>
                <input type="text" name="gtnn" value="<?php if(isset($GTNN)) echo $GTNN; else echo ""?>">
            </td>
        </tr>

        <tr>
            <td>Tổng mảng</td>
            <td>
                <input type="text" name="ketqua" value="<?php if(isset($kq)) echo $kq; else echo "";  ?>" readonly>
            </td>
        </tr>
        <tr>
            <td  colspan="2">Ghi chú: các giá trị trong mảng có giá trị từ 0 đến 20</td>
        </tr>

    </table>
</form>
    
</body>
</html>