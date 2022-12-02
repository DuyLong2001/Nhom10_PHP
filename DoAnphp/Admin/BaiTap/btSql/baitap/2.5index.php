<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2.1</title>
</head>

<body>
    <?php
    include('ketnoi.php');
    $conn = mysqli_connect($servername, $username, $pass, $dbname);
    $truyvanxem = "select * from sua s join hang_sua h on s.Ma_hang_sua=h.Ma_hang_sua";
    $ketqua = mysqli_query($conn, $truyvanxem);
    ?>
    <h2>Thông tin các sản phẩm</h2>
    <table align="center" style="width:50%">
        <?php
               
        if($ketqua == true)
        {
            $count = mysqli_num_rows($ketqua);
            if($count >=1)
            {
                while($rows = mysqli_fetch_assoc($ketqua))
                {
                    if($rows['Ma_loai_sua']=='SB'){
                        $ls='Sữa bột';
                    }
                    else $ls='Sữa đặt';
                    $tl=$rows['Trong_luong'];
                    $dg=$rows['Don_gia'];
                    $ten=$rows['Hinh'];
                    $Hinhanh="<img src='BaiTap/btSql/Hinh/$ten'>";
                    $nsx=$rows['Ten_hang_sua'];
                    echo "<tr>";
                    echo "<td style='text-align:center'>".$Hinhanh."</td>";
                    echo "<td>".$rows['Ten_sua']."<br>"."Nhà sản xuất: ".$nsx."<br>"."$ls - $tl gr - $dg VND"."</td>";
                    echo "</tr>";
                }
            }
        }


        ?>

    </table>
  


<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #FEDFC2}
th,
        td {
            text-align: center;
            padding: 8px;
        }

        th {
            border: 2px solid black;
            text-align: center;
            width: 12.5%;
            padding-left: 20px;
        }
td {
            border: 1px solid black;
            text-align: center;
            width: 12.5%;
            padding-left: 20px;
        }

        h2 {
            text-align: center;
            color: #2A7FAA;
        }
</style>


</body>

</html>
