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
                function tim_kiem($mang,$giatri){
                    $vitri=-1;
                    for($i=0;$i<count($mang);$i++){
                        if($mang[$i]==$giatri) {
                            $vitri=$i+1;
                            break;
                        }
                    }
                    return $vitri;
                }
       
        if(isset($_POST['submit']) and isset($_POST['mang'])) {
            $so=$_POST['so'];
            $x=$_POST['mang'];
            $arr= explode(",",$x);
            $kq=tim_kiem($arr,$so);

        }

    
    ?>
<form action="" method="post">
    <table align="center" bgcolor="#faebd7">
        <tr>
            <td colspan="2" bgcolor="orange"><h1>Tìm kiếm </h1></td>
        </tr>
        <tr>
            <td>Nhập mảng</td>
            <td>
                <input type="text" name="mang" value="<?php if(isset($x)) echo $x; else echo ""?>">
            </td>
        </tr>
        <tr>
            <td>Số cần tìm</td>
            <td>
                <input type="text" name="so" value="<?php if(isset($so)) echo $so; else echo ""?>">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" value="Tìm kiếm">
            </td>
        </tr>
        <tr>
            <td>Mảng</td>
            <td>
                <input type="text" name="mang1" value="<?php 
                if(isset($x)) {
                    echo $x;
                } else echo "";
                
                ?>">
            </td>
        </tr>
        <tr>
            <td>Kết quả tìm kiếm</td>
            <td>
                <input type="text" name="ketqua" value="<?php if(isset($kq)) echo $kq; else echo "";  ?>" readonly>
            </td>
        </tr>

    </table>
</form>
    
</body>
</html>