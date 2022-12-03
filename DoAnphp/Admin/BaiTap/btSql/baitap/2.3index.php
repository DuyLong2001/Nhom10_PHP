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
    $truyvanxem = "select Ma_khach_hang,Ten_khach_hang,Phai,Dia_chi,Dien_thoai from khach_hang";
    $ketqua = mysqli_query($conn, $truyvanxem);
    ?>
    <h2>Thông tin khách hàng</h2>
    <table style="width:100%">
        <tr>
            <th>Mã KH</th>
            <th>Tên khách hàng</th>
            <th>Giới tính</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>

        </tr>
        <?php
        if($ketqua == true)
        {
            $count = mysqli_num_rows($ketqua);
            if($count >=1)
            {
                while($rows = mysqli_fetch_assoc($ketqua))
                {
                    $nam="<img src='Hinh/boy.png'>";
                    $nu="<img src='Hinh/girl.png'>";
                    $gt=$nam;
                    if($rows['Phai'] == 1)
                    {
                        $gt=$nu;
                    }
                    echo "<tr>";
                    echo "<td>".$rows['Ma_khach_hang']."</td>";
                    echo "<td>".$rows['Ten_khach_hang']."</td>";
                    echo "<td style='text-align:center'>".$gt."</td>";
                    echo "<td>".$rows['Dia_chi']."</td>";
                    echo "<td>".$rows['Dien_thoai']."</td>";
                    echo "</tr>";
                }
            }
        }
        ?>
    

    </table>
    <!-- <style>
        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 1.1em;
        }

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
        tr:nth-child(even){background-color: #f2f2f2}
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
        
    </style> -->


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
