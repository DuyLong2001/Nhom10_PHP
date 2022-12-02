<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bài tập php và form</title>
</head>
<body>
<?php

if (isset($_POST['submit'])){
    
    $dongia=$_POST['dongia'];
    $chuho=$_POST['chuho'];
    $socu=$_POST['socu'];
    $somoi=$_POST['somoi'];
    if(empty($chuho)) $chuho="Không để trống";

    if (isset($socu) and isset($somoi) and is_numeric($socu) and $socu>0 and is_numeric($somoi) and $somoi >0 and $somoi>$socu){
        $tien=($somoi-$socu)*$dongia;
    }else{
        $socu="Nhập số nguyên dương bé hơn chỉ số mới";
        $somoi="Nhập số nguyên dương lớn hơn chỉ số cũ";
    }
}
if (isset($_POST['reset'])){
    $chuho="";
    $socu="";
    $somoi="";
    $tien="";
}
?>
<form action="" method="post">
    <table align="center" bgcolor="#faebd7">
        <tr>
            <td colspan="2" bgcolor="orange"><h1 style=" padding: 0px 20px;">THANH TOÁN TIỀN ĐIỆN</h1></td>
        </tr>
        <tr>
            <td>Tên chủ hộ</td>
            <td> <input type="text" name="chuho" value="<?php if (isset($chuho)) echo $chuho;?>" size="35"></td>
        </tr>
        <tr>
            <td>Chỉ số cũ</td>
            <td> <input type="text" name="socu"
                        value="<?php if (isset($socu)) echo $socu; else echo "";?>" size="35">
            </td>
        </tr>
        <tr>
            <td>Chỉ số mới</td>
            <td> <input type="text" name="somoi" size="35" 
            value="<?php if (isset($somoi)) echo $somoi; else echo "";?>">
            </td>
        </tr>
        <tr>
            <td>Đơn giá</td>
            <td> <input type="text" name="dongia" size="35" readonly
                        value="2000" >
            </td>
        </tr>
        <tr>
            <td>Số tiền thanh toán</td>
            <td> <input type="text" name="tien" size="35" style="background-color: lightpink;" readonly
                        value="<?php if (isset($tien)) echo $tien;echo "";?>" >
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="submit" value="Tính">
                <input type="submit" name="reset" value="Clear">
            </td>
        </tr>
    </table>
</form>

</body>
</html>
1