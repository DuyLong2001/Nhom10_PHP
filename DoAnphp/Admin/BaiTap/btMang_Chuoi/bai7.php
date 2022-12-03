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
 
    $mang_can=array("Qúy","Gíap","Ất","Bính","Đinh","Mậu","Kỷ","Canh","Tân","Nhâm");
    $mang_chi=array("Hợi","Tý","Sửu","Dần","Mão","Thìn","Tỵ","Ngọ","Mùi","Thân","Dậu","Tuất");
    $mang_hinh = array("hoi.jpg","ti.jpg","suu.jpg","dan.jpg","mao.jpg","thin.jpg","ty.jpg","ngo.jpg","mui.jpg","than.jpg","dau.jpg","tuat.jpg");
    if(isset($_POST['nam'])){
        $nam=$_POST['nam'];
        $nam1=$_POST['nam'];
        $nam=$nam-3;
        $can=$nam%10;
        $chi=$nam%12;
        $nam_al=$mang_can[$can];
        $man_al=$nam_al." ".$mang_chi[$chi];
        $hinh=$mang_hinh[$chi];
        $hinh_anh="<img  style='width: 200px; height:200px;' src='BaiTap/btMang_Chuoi/12con_giap/$hinh'";
    }
    ?>
<form action="" method="post">
    <table align="center" bgcolor="#faebd7">
        <tr>
            <td><h1>Tính năm âm lịch </h1></td>
        </tr>
        <tr>
            <td>Năm dương lịch</td>
            <td>
            </td>
            <td>
            Năm âm lịch
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" name="nam" value="<?php if(isset($nam1)) echo $nam1; else echo ""?>">
            </td>
            <td>
                <input type="submit" name="submit" value="=>">
            </td>
            <td>
                <input type="text" name="canchi" value="<?php if(isset($man_al)) echo $man_al; else echo ""?>">
            </td>
        </tr>
        <tr>
       
        <td >
        <?php
                if(!empty($nam_al)) {
                    echo $hinh_anh; 
                }
                else {
                    echo "";
                }
           ?>
        </td>
         
            
        </tr>

    </table>
</form>

</body>
</html>