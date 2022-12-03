<!DOCTYPE HTML >
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title></title>
</head>
<body>
<?php
require('ketnoi.php');

$rowsPerPage=2;
if ( ! isset($_GET['page']))
    $_GET['page'] = 1;
$offset =($_GET['page']-1)*$rowsPerPage;
$query = "SELECT* from sua join hang_sua on sua.ma_hang_sua = hang_sua.ma_hang_sua join loai_sua on sua.ma_loai_sua = loai_sua.ma_loai_sua LIMIT $offset, $rowsPerPage";
if(isset($_POST["submit"])) {
      
    $search = $_POST["search"];
    $query = "SELECT * from sua join hang_sua on sua.ma_hang_sua = hang_sua.ma_hang_sua join loai_sua on sua.ma_loai_sua = loai_sua.ma_loai_sua where sua.Ten_Sua  like '%$search%' OR sua.Don_Gia like '$search'   ";
}
$result = mysqli_query($conn,$query);
$numRows= mysqli_num_rows($result);
$maxPage = ceil($numRows / $rowsPerPage);

if($numRows<>0)
{   
    ?>

<div class="search">
            <h1>Tìm kiếm thông tin sữa</h1>
        </div>

        <div class="search">
            <form  method="post">
 
                <label >Tên sữa</label>
                <input type="text" name="search"  value="<?php if(isset($search)) echo $search ?>">
                <button type="submit" name="submit">Tìm kiếm</button>
            </form>
        </div>
        <div>
            <h3>
            <?php if(isset($_POST["submit"])) { 
                    if($search == "") {
                        echo "";
                    }
                    else {
                        if(mysqli_num_rows($result) > 0 ) {
                            echo "Có tất cả" .mysqli_num_rows($result) ." sản phẩm";
                    }
                    
                    else {
                        echo "Không có sản phẩm nào được tìm thâý";
                    }
                    }
                  
                }  ?>
            </h3>
        </div>
        <table bgcolor="#FEFEFE">
            <?php 
               if (mysqli_num_rows($result) != 0) {
                while ($row = mysqli_fetch_array($result)) {
        
             ?>
            <tr bgcolor="#FFEEE6">
                <td colspan="3" align="center">
                    <h1> <?php echo $row["Ten_sua"] ." - " .$row["Ten_loai"] ?></h1>
                </td>
            </tr>

            <tr>
                <td colspan="1">
                    <img src="BaiTap/btSql/Hinh/<?php echo $row['Hinh']?>" alt='<?php echo $row['Hinh'] ?>'>

                </td>
                <td>
                    <h4> Thành phần dinh dưỡng</h4>
                    <p>
                        <?php echo $row["TP_Dinh_Duong"]  ?>
                    </p>
                    <h4>Lợi ích</h4>
                    <p>
                        <?php echo $row["Loi_ich"]  ?>
                    </p>
                    <p id="sub">
                    <h4> Trọng lượng: </h4> <span><?php  echo $row["Trong_luong"] ."gr"?></span>  - <h4>Đơn giá:</h4>
                    <span><?php  echo $row["Don_gia"] ." VNĐ"?></span>
                    </p>
                </td>

            </tr>

            <?php                            
                    }
                }
            ?>


        </table>


    <?php
    $re = mysqli_query($conn, 'select * from sua');
    $numRows = mysqli_num_rows($re);
    $maxPage = floor($numRows/$rowsPerPage) + 1;
    echo "<div class='center'>";
    for ($i=1 ; $i<=$maxPage ; $i++)
    {
        if ($i == $_GET['page'])
        {
            echo '<b class="center"> '.$i.'</b> ';
        }
        else {
            echo "<a  href=" .'?page_layout=baitap&baiSQL=9'. "&page=" . $i . "> " . $i . "</a> ";
        }
    }

    echo"</div>";

}
mysqli_close($conn);
?>
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
    * {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }

    .container {

        background: #FDFEF0;

    }

    .search {
        background: #fff;
        text-align: center;
        padding: 3px 0px;
        margin-top: 3px;
    }

    h1 {
        color: #FB6700;
    }
    .container span{
        color: red;
    }

    h4 {
        display: inline;
    }

    h3 {
        text-align: center;
    }

    img {
        height: 150px;
    }

    td {
        border: 1px solid black;
        padding: 20px;
    }
    </style>
</body>
</html>