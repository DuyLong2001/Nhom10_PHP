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

    if($_POST["gender"]=='cong'){
        $kq=$_POST['s1']+$_POST['s2'];
    }
    if($_POST["gender"]=='tru'){
        $kq=$_POST['s1']-$_POST['s2'];
    }
    if($_POST["gender"]=='nhan'){
        $kq=$_POST['s1']*$_POST['s2'];
    }
    if($_POST["gender"]=='chia'){
        $kq=$_POST['s1']/$_POST['s2'];
    }
    ?>
<form action="bai6.php" method="post">
    <table align="center">
        <tr>
            <td colspan="2"><h1>PHÉP TÍNH TRÊN HAI SỐ</h1></td>
        </tr>
        <tr>
            <td>Chọn phép tính: </td>
            <td> 
            <?php if($_POST["gender"]=='cong') echo "Cộng";?>
            <?php if($_POST["gender"]=='tru') echo "Trừ";?>
            <?php if($_POST["gender"]=='nhan') echo "Nhân";?>
            <?php if($_POST["gender"]=='chia') echo "Chia";?>
            </td>
        </tr>
        <tr>
            <td>Số 1: </td>
            <td> <input type="text" name="s1a"
                        value="<?php if(isset($_POST["s1"])) echo $_POST["s1"]; else echo 'Chưa nhập số';?>" size="35">
            </td>
        </tr>
        <tr>
            <td>Số 2: </td>
            <td> <input type="text" name="s2a"
                        value="<?php if(isset($_POST["s2"])) echo $_POST["s2"]; else echo 'Chưa nhập số';?>" size="35">
            </td>
        </tr>
        <tr>
            <td>Kết quả: </td>
            <td> <input type="text" name="kq"
                        value="<?php if(isset($kq)) echo $kq;?>" size="35">
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
            <a href="javascript:window.history.back(-1);">Trở về trang trước</a>
            </td>
        </tr>
    </table>
</form>

</body>
</html>

