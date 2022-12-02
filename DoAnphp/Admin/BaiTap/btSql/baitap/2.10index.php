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
$queryloaisua = "SELECT * from loai_sua";
$queryhangsua = "SELECT * from hang_sua";
$query = "SELECT* from sua s join hang_sua hs on s.ma_hang_sua = hs.ma_hang_sua join loai_sua ls on s.ma_loai_sua = ls.ma_loai_sua LIMIT $offset, $rowsPerPage";
if(isset($_POST["submit"])) {

    $search = $_POST["search"];
    $loaisua  = $_POST["loaisua"];
    $hangsua  = $_POST["hangsua"];
    if($loaisua=='' || $hangsua=''){
        header('location:2.10index.php');
    };

    if (!empty(trim($loaisua)) and empty(trim($hangsua)) and empty(trim($search))) {
        $query = "SELECT * from sua s join hang_sua hs on s.ma_hang_sua = hs.ma_hang_sua join loai_sua ls on s.ma_loai_sua = ls.ma_loai_sua where ls.Ma_loai_sua  like '%$loaisua%' ";
    } else if (empty(trim($loaisua)) and !empty(trim($hangsua)) and empty(trim($search))) {
        $query = "SELECT * from sua s join hang_sua hs on s.ma_hang_sua = hs.ma_hang_sua join loai_sua ls on s.ma_loai_sua = ls.ma_loai_sua where hs.Ma_hang_sua  like '%$hangsua%' ";
    } else if (empty(trim($loaisua)) and empty(trim($hangsua)) and !empty(trim($search))) {
        $query = "SELECT * from sua s join hang_sua hs on s.ma_hang_sua = hs.ma_hang_sua join loai_sua ls on s.ma_loai_sua = ls.ma_loai_sua where s.Ten_Sua  like '%$search%' ";
    } else if (!empty(trim($loaisua)) and !empty(trim($hangsua)) and empty(trim($search))) {
        $query = "SELECT * from sua s join hang_sua hs on s.ma_hang_sua = hs.ma_hang_sua join loai_sua ls on s.ma_loai_sua = ls.ma_loai_sua where ls.Ma_loai_sua  like '%$loaisua%'  and hs.Ma_hang_sua  like '%$hangsua%' ";
    } else if (!empty(trim($loaisua)) and empty(trim($hangsua)) and !empty(trim($search))) {
        $query = "SELECT * from sua s join hang_sua hs on s.ma_hang_sua = hs.ma_hang_sua join loai_sua ls on s.ma_loai_sua = ls.ma_loai_sua where ls.Ma_loai_sua  like '%$loaisua%'  and s.Ten_Sua  like '%$search%' ";
    } else if (empty(trim($loaisua)) and !empty(trim($hangsua)) and !empty(trim($search))) {
        $query = "SELECT * from sua s join hang_sua hs on s.ma_hang_sua = hs.ma_hang_sua join loai_sua ls on s.ma_loai_sua = ls.ma_loai_sua where hs.Ma_hang_sua  like '%$hangsua%'  and s.Ten_Sua  like '%$search%' ";
    } else {
        $query = "SELECT * from sua s join hang_sua hs on s.ma_hang_sua = hs.ma_hang_sua join loai_sua ls on s.ma_loai_sua = ls.ma_loai_sua where ls.Ma_loai_sua  like '%$loaisua%' and hs.Ma_hang_sua  like '%$hangsua%'  and s.Ten_Sua  like '%$search%' ";
    }
}
$result_loaisua = mysqli_query($conn, $queryloaisua);
$result_hangsua = mysqli_query($conn, $queryhangsua);
$result = mysqli_query($conn,$query);
$numRows= mysqli_num_rows($result);

$maxPage = ceil($numRows / $rowsPerPage);

if($numRows<>0)
{   
    ?>

<div class="search">
            <h1 style="color: #FF8FB1;">Tìm kiếm thông tin sữa</h1>
        </div>

        <div style="text-align: center; margin-bottom: 10px;">
            <form method="post">
                <div class="tk">
                    <label>Loại sữa:</label>

                    <SELECT name="loaisua" >

                        <option value="">All</option>
                        <?php

                        if (mysqli_num_rows($result_loaisua) != 0) {
                            while ($row = mysqli_fetch_array($result_loaisua)) {

                        ?>
                                <option <?php if (isset($loaisua) and $row["Ma_loai_sua"] == $loaisua)  ?> value="<?php echo $row["Ma_loai_sua"] ?>"> <?php echo $row["Ten_loai"] ?>
                                </option>
                        <?php
                            }
                        } ?>

                    </SELECT>
                    <label>Hãng sữa</label>
                    <SELECT name="hangsua" >
                        <option value="">All</option>
                        <?php
                        if (mysqli_num_rows($result_hangsua) != 
                        
                        0) {
                            while ($row = mysqli_fetch_array($result_hangsua)) {

                        ?>
                                <option <?php if (isset($hangsua) and $row["Ma_hang_sua"] == $hangsua); ?> value="<?php echo $row["Ma_hang_sua"] ?>"><?php echo $row["Ten_hang_sua"] ?>
                                </option>
                        <?php
                            }
                        } ?>
                    </SELECT>

                </div>
                <div class="bottom">
                    <label>Tên sữa</label>
                    <input type="text" name="search" value="<?php if (isset($search)) echo $search ?>">
                    <button id="submit" type="submit" name="submit">Tìm kiếm</button>
                </div>

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
                    <p>
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
    $re = mysqli_query($conn, 'SELECT * from sua');
    $numRows = mysqli_num_rows($re);
    $maxPage = floor($numRows/$rowsPerPage) + 1;
    echo "<div class='center'>";
    for ($i=1 ; $i<=$maxPage ; $i++)
    {
        if ($i == $_GET['page'])
        {
            echo '<b class="center">'.$i.'</b> ';
        }
        else {
            echo "<a  href=" .'?page_layout=baitap&baiSQL=10' . "&page=" . $i . "> " . $i . "</a> ";
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


    .search {
        background: #F0E3ED;
        text-align: center;
        padding: 4px 0px;
        margin-top: 4px;
    }
    .container span{
        color: red;
    }
    h1 {
            color: #FB6700;
            text-align: center;
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

    .tk {
        margin-bottom: 10px;
    }
    span {
            color: red;
        }
    </style>
</body>
</html>