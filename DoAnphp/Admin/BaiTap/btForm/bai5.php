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
if (isset($_POST['submit'])){
    
    $bd=$_POST['bd'];
    $kt=$_POST['kt'];
    if (isset($bd) and isset($kt) and is_numeric($bd) and $bd>=10 and is_numeric($kt) and $kt<=24 and $kt>=$bd ){

        if($bd>=10 and $bd<=17 and $kt>=10 and $kt<=17 ){
            $kq=($kt-$bd)*20000;
        }
        if($bd>=17 and $bd<=24 and $kt>=17 and $kt<=24){
            $kq=($kt-$bd)*45000;
        }
        if($bd>=10 and $bd<=24 and $kt>=10 and $kt<=24){
            $kq=(17-$bd)*20000+(24-$kt)*45000;
        }
            
        
    }else{
        $bd="";
        $kt="";
        $kq="Nhập thời gian kết thúc lớn hơn thời gian bắt đầu";
    }
}
if (isset($_POST['reset'])){
    $bd="";
    $kt="";
    $kq="";
}
?>
<form action="" method="post">
    <table align="center" bgcolor="#E0FFFF">
        <tr>
            <td colspan="3" bgcolor="#7AC5CD" style="text-align: center;"><h1 style="color: aliceblue; padding: 0px 20px;">TÍNH TIỀN KARAOKE</h1></td>
        </tr>

        <tr>
            <td>Giời bắt đầu</td>
            <td> <input type="text" name="bd"
                        value="<?php if (isset($bd)) echo $bd; else echo "";?>" size="35" placeholder="Thời gian bắt đầu sau 10h">
            </td>
        </tr>
        <tr>
            <td>Giời kết thúc</td>
            <td> <input type="text" name="kt"
                        value="<?php if (isset($kt)) echo $kt; else echo "";?>" size="35" placeholder="Thời gian kết thúc trước 24h">
            </td>
        </tr>
        <tr>
            <td>Tiền thanh toán</td>
            <td> <input type="text" name="kq" size="35" readonly
                        value="<?php if (isset($kq)) echo $kq;echo "";?>" >
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="submit" value="Xêm kết quả">
                <input type="submit" name="reset" value="Clear">
            </td>
        </tr>
    </table>
</form>


</body>
</html>
