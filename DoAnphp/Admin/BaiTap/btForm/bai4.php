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
    
    $toan=$_POST['toan'];
    $ly=$_POST['ly'];
    $hoa=$_POST['hoa'];
    $diemchuan=$_POST['diemchuan'];
    $tongdiem=$_POST['tongdiem'];
    $kq=$_POST['kq'];

    if(empty($chuho)) $chuho="Không để trống";

    if (isset($toan) and isset($ly) and is_numeric($toan) and $toan>=0 and is_numeric($ly) and $ly >=0 
                and isset($hoa) and is_numeric($hoa) and $hoa>=0 and isset($diemchuan) and is_numeric($diemchuan) and $diemchuan>=0 ){
        $tongdiem=$toan+$ly+$hoa;
        if($tongdiem>=$diemchuan) $kq="Đậu"; else $kq="Không Đậu";
            
        
    }else{
        $toan="";
        $ly="";
        $hoa="";
        $diemchuan="";
        $tongdiem="";
        $kq="Nhập đúng thông số";
    
    }
}
if (isset($_POST['reset'])){
    $toan="";
    $ly="";
    $hoa="";
    $diemchuan="";
    $tongdiem="";
    $kq="";

}
?>
<form action="" method="post">
    <table align="center" bgcolor="#FFE1FF">
        <tr>
            <td colspan="3" bgcolor="#FF1493"><h1 style=" padding: 0px 20px;">KẾT QUẢ THI ĐẠI HỌC</h1></td>
        </tr>

        <tr>
            <td>Toán</td>
            <td> <input type="text" name="toan"
                        value="<?php if (isset($toan)) echo $toan; else echo "";?>" size="35" placeholder="Nhập số thực >0">
            </td>
        </tr>
        <tr>
            <td>Lý</td>
            <td> <input type="text" name="ly"
                        value="<?php if (isset($ly)) echo $ly; else echo "";?>" size="35" placeholder="Nhập số thực >0">
            </td>
        </tr>
        <tr>
            <td>Hóa</td>
            <td> <input type="text" name="hoa" size="35" 
            value="<?php if (isset($hoa)) echo $hoa; else echo "";?>" placeholder="Nhập số thực >0">
            </td>
        </tr>
        <tr>
            <td>Điểm chuẩn</td>
            <td> <input type="text" style="color: red;" placeholder="Nhập số thực >0" name="diemchuan" size="35" 
            value="<?php if (isset($diemchuan)) echo $diemchuan; else echo "";?>">
            </td>
        </tr>
        
        <tr>
            <td>Tổng điểm</td>
            <td> <input type="text" name="tongdiem" size="35" readonly
                        value="<?php if (isset($tongdiem)) echo $tongdiem;echo "";?>" >
            </td>
        </tr>
        <tr>
            <td>Kết quả thi</td>
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
1