<!DOCTYPE HTML >
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title></title>
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



$rowsPerPage=2;
if ( ! isset($_GET['page']))
    $_GET['page'] = 1;
$offset =($_GET['page']-1)*$rowsPerPage;

$query="SELECT * from sua join hang_sua on sua.ma_hang_sua = hang_sua.ma_hang_sua join loai_sua on sua.ma_loai_sua = loai_sua.ma_loai_sua LIMIT $offset, $rowsPerPage;";
$result = mysqli_query($conn,$query);
if (!$result ) die ('<br> <b>Query failed</b>');
$numRows= mysqli_num_rows($result);
$maxPage = ceil($numRows / $rowsPerPage);
if($numRows<>0)
{
    echo "<div>
         <table>
            <tr ><h2 class='center' style='color: pink;'>THÔNG TIN SỮA</h2></th></tr>";

    $temp=$_GET['page']*$rowsPerPage;
    if($temp<=$rowsPerPage) $num=0;
    else $num=$temp-$rowsPerPage;
    $chia =0;
    while($rows=mysqli_fetch_array($result))
    {
        
        echo " <tr style='background-color:aquamarine;'>";
        echo "<td colspan='3' align='center'>".
            "<h1 style='color: #FB6700;'>" .$rows["Ten_sua"] ." - " .$rows["Ten_loai"] ."</h1>"
        ."</td>";
         echo"</tr>";
        echo"
        <tr>";
        echo "<td colspan='1'>";
            echo"<img src='BaiTap/btSql/Hinh/".$rows['Hinh']."'>";

        echo"</td>";
        echo "<td>
            <h4> Thành phần dinh dưỡng</h4>
            <p>
                ".$rows['TP_Dinh_Duong'].".
            </p>
            <h4>Lợi ích</h4>
            <p>
                ".$rows["Loi_ich"].".
            </p>
            <p id='sub'>
            <h4> Trọng lượng: </h4> <span>".$rows["Trong_luong"]." gr</span>  - <h4>Đơn giá:</h4>
            <span>". $rows["Don_gia"]." VNĐ</span>
            </p>
        </td>";

    echo "</tr>";

                

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
            echo '<b class="center">Trang'.$i.'</b> ';
        }
        else {
            echo "<a  href=".'?page_layout=baitap&baiSQL=8'."&page=" . $i . ">Trang " . $i . "</a> ";
        }
    }

    echo"</div>";

}
mysqli_close($conn);
?>
 <style>
    * {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }


    h4 {
        display: inline;
    }

    img {
        height: 150px;
    }

    td {
        border: 1px solid black;
        padding: 20px;
    }

    .top {
        margin-bottom: 10px;
    }
    </style>
</body>
</html>