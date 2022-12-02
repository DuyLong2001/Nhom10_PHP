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
        $ketqua=0;
        if(isset($_POST["submit"]) and isset($_POST["so"])){
            $txt_dayso=$_POST["so"];
            $a=explode(",",$txt_dayso);
            foreach($a as $value){
                if(!is_numeric($value)){
                    $txt_dayso="không được chứa ký tự";
                    break;
                }
                $ketqua +=$value;
            }
        }
    ?>
    <form action="" method="post">
        <table align="center" bgcolor="#faebd7">
            <tr><td colspan=2>NHẬP VÀ TÍNH TRÊN DÃY SỐ</td></tr>
            <tr><td>Dãy Số</td>
            <td><input type="text" name="so" value="<?php if(isset($txt_dayso)) echo $txt_dayso;?>"></td></tr>
            <tr><td></td><td><input type="submit" name="submit" value="Tổng dãy số"></td></tr>
            <tr><td>Kết quả</td><td><input type="text" name="ketqua" value="<?php if(isset($ketqua)) echo $ketqua; ?>" readonly style = "background-color: lightpink;"></td></tr>
        </table>
</body>
</html>