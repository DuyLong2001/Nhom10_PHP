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
                function thay_the($mang,$socu,$somoi){
                    for($i=0;$i<count($mang);$i++){
                        if($mang[$i]==$socu) {
                            $mang[$i]=$somoi;
                        }
                    }
                    return $mang;
                }
       
        if(isset($_POST['submit']) and isset($_POST['mang1'])) {
            $gtctt=$_POST['gt1'];
            $gttt=$_POST['gt2'];
            $x=$_POST['mang1'];
            $arr= explode(",",$x);
            $kq=thay_the($arr,$gtctt,$gttt);

        }

    
    ?>
<form action="" method="post">
    <table align="center" bgcolor="#faebd7">
        <tr>
            <td colspan="2" bgcolor="orange"><h1>Thay thế </h1></td>
        </tr>
        <tr>
            <td>Nhập các phần tử</td>
            <td>
                <input type="text" name="mang1" value="<?php if(isset($x)) echo $x; else echo ""?>">
            </td>
        </tr>
        <tr>
            <td>Gía trị cần thay thế</td>
            <td>
                <input type="text" name="gt1" value="<?php if(isset($gtctt)) echo $gtctt; else echo ""?>">
            </td>
        </tr>
        <tr>
            <td>Gía trị thay thế</td>
            <td>
                <input type="text" name="gt2" value="<?php if(isset($gttt)) echo $gttt; else echo ""?>">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" value="Thay thế">
            </td>
        </tr>
        <tr>
            <td>Mảng cũ</td>
            <td>
                <input type="text" name="mang2" value="<?php 
                if(isset($arr)) {
                    for($i=0;$i<count($arr);$i++){
                        echo $arr[$i]." ";
                    }
                } else echo "";
                
                ?>" readonly>
            </td>
        </tr>
        <tr>
            <td>Mảng sau khi thay thế</td>
            <td>
                <input type="text" name="mang3" value="<?php 
                if(isset($kq)) {
                    for($i=0;$i<count($kq);$i++){
                        echo $kq[$i]." ";
                    }
                } else echo "";
                ?>"readonly>
            </td>
        </tr>

    </table>
</form>
    
</body>
</html>