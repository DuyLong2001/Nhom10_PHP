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
    // ob_start();
    // session_start();
    // if(isset($_POST['submit'])){
    //     if(isset($_POST['s1']) and isset($_POST['s2']) and is_numeric($_POST['s1']) and is_numeric($_POST['s2']) and $_POST['s2']!=0)
    //     {
    //         $_SESSION['so1']=$_POST['s1'];
    //         $_SESSION['so2']=$_POST['s2'];
    //         $_SESSION['gd']=$_POST['gender'];
    //         header('location:bai7a.php');
    //     }
    // }
    
    
    
    // ?>

<form  action="?page_layout=baitap&baiForm=7a" method="post">
    <table align="center">
        <tr>
            <td colspan="2"><h1>PHÉP TÍNH TRÊN HAI SỐ</h1></td>
        </tr>
        <tr>
            <td>Chọn phép tính: </td>
            <td> 

<input type="radio" name="gender"

value="cong" checked>Cộng
<input type="radio" name="gender"

value="tru">Trừ
<input type="radio" name="gender"

value="nhan">Nhân
<input type="radio" name="gender"

value="chia">Chia
            </td>
        </tr>
        <tr>
            <td>Số thứ nhất: </td>
            <td> <input type="text" name="s1"
                        value="" size="35">
            </td>
        </tr>
        <tr>
            <td>Số thứ nhì: </td>
            <td> <input type="text" name="s2"
                        value="" size="35">
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="submit" value="Tính">
            </td>
        </tr>
    </table>
</form>

</body>
</html>
