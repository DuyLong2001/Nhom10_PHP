<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bài tập php va form</title>
</head>
<body>
<?php
define('PI',3.14);
if (isset($_POST['submit'])){
    $r=$_POST['radius'];;
    if (isset($r) and is_numeric($r) and $r>0){
        $s=round(PI*$r*$r,1);
        $p=round(2*PI*$r,1);
    }else{
        $r="ban kinh phai la so hoac khong duoc de trong";
        $s="";
        $p="";
    }
}
if (isset($_POST['reset'])){
    $s="";
    $p="";
    $r="";
}
?>
<form action="" method="post">
    <table align="center" bgcolor="#faebd7">
        <tr>
            <td colspan="2" bgcolor="#FFA54F"><h1 style="padding: 0px 20px;">Diện tích và chu vi hình tròn</h1></td>
        </tr>
        <tr>
            <td>Bán Kính</td>
            <td> <input type="text" name="radius" value="<?php if (isset($r)) echo $r;?>" size="30"></td>
        </tr>
        <tr>
            <td>Diện tích</td>
            <td> <input type="text" name="area" style="background-color: lightpink;" readonly
                        value="<?php if (isset($s)) echo $s; else echo "";?>" size="30">
            </td>
        </tr>
        <tr>
            <td>Chu vi</td>
            <td> <input type="text" name="chuvi" size="30" style="background-color: lightpink;" readonly
                        value="<?php if (isset($p)) echo $p;echo "";?>" >
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