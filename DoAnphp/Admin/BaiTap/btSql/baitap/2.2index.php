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
    $query= "select Ma_khach_hang,Ten_khach_hang,Phai,Dia_chi,Dien_thoai from khach_hang";
    $result= mysqli_query($conn, $query);
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
        if (mysqli_num_rows($result) != 0) {
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                for ($i = 0; $i < mysqli_num_fields($result); $i++) {                            
                        echo "<td>";
                        echo   $row[$i] . " ";
                        echo  "</td>";
                 
                  
                }
                echo  "</tr>";
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