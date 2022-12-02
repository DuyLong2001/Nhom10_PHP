<?php
    $thamso = $_GET["thamso"];
    $qr = "select * from loai_nhac_cu where MaLoaiNC = '$thamso'";
    
?>
 <?php include('./H.php');
    include('./connect.php'); ?>
    <!-- NAVIGATION -->
    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <?php 
                  $tv = " select * from loai_nhac_cu";
                  $run = mysqli_query($conn,$tv);
                ?>
                <ul class="main-nav nav navbar-nav">
                    <li class="active"><a href="?thamso='trangchu'">Trang chủ</a></li>
                    <?php 
                        while($r = mysqli_fetch_array($run)) { ?>
                    <li><a href="loai.php?thamso=<?php echo $r["MaLoaiNC"] ?>"><?php echo $r["TenLoaiNC"] ?></a></li>

<?php   }
                    
                    ?>
                    
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick1" data-nav="#slick-nav-1">

                                    <!-- product -->
                                    <?php 
                                    //phân trang
                   



                                    $limit = 9;
                                    if (!isset($_GET['trang'])) {
                                        $_GET['trang'] = 1;
                                    }
                                    $tv = "select count(MaLoaiNC) as total from nhac_cu";
                                    $tv_1 = mysqli_query($conn, $tv);
                                    $tv_2 = mysqli_fetch_array($tv_1);
                                    $total_records = $tv_2['total'];
                                    $so_trang = ceil($total_records  / $limit);
                                    $start = ($_GET['trang'] - 1) * $limit;
                                    $current_page = isset($_GET['trang']) ? $_GET['trang'] : 1;
                                    if ($current_page > $so_trang) {
                                        $current_page = $so_trang;
                                    } else if ($current_page < 1) {
                                        $current_page = 1;
                                    }
                                    $query = "select * from loai_nhac_cu  join nhac_cu  on loai_nhac_cu.MaLoaiNC = nhac_cu.MaLoaiNC where nhac_cu.MaLoaiNC = '$thamso' limit $start, $limit";                                
                                    $result = mysqli_query($conn, $query);
                                    ?>

                                    <?php
                                    if (mysqli_num_rows($result) != 0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                            <div class="product">
                                                <div class="product-img">
                                                    <img src="./img/<?php echo $row['HinhNC'] ?>" alt='<?php echo $row['HinhNC'] ?>'>
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category"><?php echo $row["TenLoaiNC"] ?></p>
                                                    <h3 class="product-name"><a href='./Detail.php?id=<?php echo $row["MaNC"] ?>'>
                                                            <?php echo $row["TenNC"]  ?>
                                                        </a></h3>
                                                    <h4 class="product-price"><?php echo $row["DonGia"] ?> VNĐ</h4>
                                                </div>
                                                <div class="add-to-cart">
                                                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                                </div>
                                            </div>
                                            <!-- /product -->
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <!-- /product-slick -->
                            </div>
                            <!-- /tab -->
                        </div>
                        <!-- /product-tabs -->
                    </div>
                    <!-- /row -->
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
        <div class="pagination">
        <ul class="pagination justify-content-center">
        <?php
            if ($current_page > 1 && $so_trang > 1) {
                echo '<a  class="page-link" href="?trang=' . ($current_page - 1) . '">Trước</a>';
            }
            for ($i = 1; $i <= $so_trang; $i++) {
                $link_phan_trang = "?trang=" . $i;
                if ($i == $current_page) {
                    echo '<span class="page-link active">' . $i . '</span> ';
                } else {
                    echo "<a class='page-link' href='$link_phan_trang' >";
                    echo $i;
                    echo "</a> ";
                }
            }
            if ($current_page < $so_trang && $so_trang > 1) {
                echo '<a class="page-link" href="?trang=' . ($current_page + 1) . '">Sau</a>';
            }
            ?>
 </ul>
        </div>
    
<style>
    .filter {
        position: relative;
        overflow: hidden;
        margin: 15px 0px;
    }


    .main-nav>li+li {
        margin-left: 15px
    }

    .product .product-img>img {
        height: 250px;
        width: 100%;
    }

    .pagination {
        display: flex;
        justify-content: center;
        text-align: center;
    }
    .pagination > ul {
        display: flex;
        column-gap: 15px;
    }
    .pagination > ul >  a {
        border: 1px black solid;
        cursor: pointer;
        padding: 10px 15px;
    }
    .pagination span.active {
        border: 1px black solid;
        cursor: pointer;
        padding: 10px 15px;
        background: lightcoral;
    }
</style>

</html>

<style>
    .tab1 {}

    .products-slick1 {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
    }
</style>