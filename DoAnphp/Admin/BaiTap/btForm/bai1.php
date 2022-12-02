<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Baitap</title>
</head>
<body>
<?php

if (isset($_POST['submit'])){
    $cd=$_POST['cd'];
    $cr=$_POST['cr'];
    if (isset($cd) and is_numeric($cd) and $cd>0 and isset($cr) and is_numeric($cr) and $cr>0){
        $dt=$cd*$cr;
    }else{
        $dt="Nhập số dương";
        $cd="";
        $cr="";
    }
}
if (isset($_POST['reset'])){
    $cd="";
    $cr="";
    $dt="";
}
?>
<form action="" method="post">
    <table align="center" bgcolor="#faebd7">
        <tr>
            <td colspan="2" bgcolor="#FFA54F"><h1 style="padding: 0px 20px;">Diện tích hình chữ nhật</h1></td>
        </tr>
        <tr>
            <td>Chiều dài</td>
            <td> <input type="text" name="cd" value="<?php if (isset($cd)) echo $cd;?>" size="30"></td>
        </tr>
        <tr>
            <td>Chiều rộng</td>
            <td> <input type="text" name="cr" 
                        value="<?php if (isset($cr)) echo $cr; else echo "";?>" size="30">
            </td>
        </tr>
        <tr>
            <td>Diện tích</td>
            <td> <input type="text" name="dt" size="30" style="background-color: lightpink;" readonly
                        value="<?php if (isset($dt)) echo $dt;echo "";?>" >
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