<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Thông tin khách hàng</title>
    <style>
        table {
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;
            width: 50%;
        }

        th, td {
            border: solid 0.5px;
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even) {background-color: #f2f2f2;}
        .center {
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }
    </style>
</head>
<body>
<?php
require('ketnoi.php');



$conn = mysqli_connect($servername, $username, $pass, $dbname) or die ('Không thể kết nối tới database'. mysqli_connect_error());

//phan trang
$rowsPerPage=10;
if ( ! isset($_GET['page']))
    $_GET['page'] = 1;
$offset =($_GET['page']-1)*$rowsPerPage;
//$query="Select * from sua LIMIT $offset, $rowsPerPage";
$query="SELECT * from sua s join hang_sua h on s.Ma_hang_sua=h.Ma_hang_sua LIMIT $offset, $rowsPerPage;";
$result = mysqli_query($conn,$query);
if (!$result ) die ('<br> <b>Query failed</b>');
$numRows= mysqli_num_rows($result);
$maxPage = ceil($numRows / $rowsPerPage);
if($numRows<>0)
{
    echo "<div style='overflow-x: auto;'>
         <table>
            <tr style='background:pink;'><th colspan='6'><p class='center'>THÔNG TIN SỮA</p></th></tr>";

    $temp=$_GET['page']*$rowsPerPage;// danh so thu tu
    if($temp<=$rowsPerPage) $num=0;
    else $num=$temp-$rowsPerPage;
    $chia =0;
    while($rows=mysqli_fetch_array($result))
    {
        $num++;


        if($rows['Ma_loai_sua']=='SB'){
            $ls='Sữa bột';
        }
        else $ls='Sữa đặt';
        $tl=$rows['Trong_luong'];
        $dg=$rows['Don_gia'];
        $ten=$rows['Hinh'];
        $Hinhanh="<img src='BaiTap/btSql/Hinh/$ten'>";
        $nsx=$rows['Ten_hang_sua'];
        
        $chia++;
        echo "<td style='text-align:center'>".$Hinhanh.'<br>'.$rows['Ten_sua']."<br>"."Nhà sản xuất: ".$nsx."<br>"."$ls - $tl gr - $dg VND"."</td>";
        if($chia==5){
            echo "<tr>";
        
            }
                
            
               
       


    }
    echo"</table> </div>";
    $re = mysqli_query($conn, 'select * from sua');
    $numRows = mysqli_num_rows($re);
    $maxPage = floor($numRows/$rowsPerPage) + 1;
    echo "<div class='center'>";

    for ($i=1 ; $i<=$maxPage ; $i++)
    {
        if ($i == $_GET['page'])
        {
            echo '<b class="center">Trang'.$i.'</b> '; //trang hiện tại sẽ được bôi đậm
        }
        else {
            echo "<a  href=".'?page_layout=baitap&baiSQL=6'."&page=" . $i . ">Trang " . $i . "</a> ";
        }
    }

    echo"</div>";
//    echo 'Tong so trang la: '.$maxPage;
}
mysqli_close($conn);
?>
</body>
</html>
1