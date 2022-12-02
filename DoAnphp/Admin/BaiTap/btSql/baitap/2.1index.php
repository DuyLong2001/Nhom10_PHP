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
    $query = "select * from hang_sua";
    $result = mysqli_query($conn, $query);
    ?>
    <h2>Thông tin hãng sữa</h2>
    <table style="width:100%">
        <tr>
            <th>Mã hãng sữa</th>
            <th>Tên</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Email</th>
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