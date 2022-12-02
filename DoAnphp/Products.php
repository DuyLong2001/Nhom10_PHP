<?php include('./connect.php') ?>
<?php
$limit = 9;
if (!isset($_GET['trang'])) {
    $_GET['trang'] = 1;
}
$result = mysqli_query($conn, 'select count(MaNC) as total from nhac_cu');
$row = mysqli_fetch_assoc($result);
$query_1 = mysqli_query($conn, 'select count(MaNC) as total from nhac_cu');
$query_2 = mysqli_fetch_array($query_1);
$total_records = $query_2['total'];
$so_trang = ceil($total_records  / $limit);
$start = ($_GET['trang'] - 1) * $limit;
$current_page = isset($_GET['trang']) ? $_GET['trang'] : 1;
if ($current_page > $so_trang) {
    $current_page = $so_trang;
} else if ($current_page < 1) {
    $current_page = 1;
}
$query = "";
$queryloainhaccu = "select * from loai_nhac_cu";

$query = "select * from nhac_cu join loai_nhac_cu on nhac_cu.MaLoaiNC = loai_nhac_cu.MaLoaiNC LIMIT $start, $limit";

if (isset($_POST["search-btn"])) {

    $input = $_POST["input"];
    $loainc  = $_POST["input-select"];

    if (!empty(trim($loainc)) and empty(trim($input))) {
        $query = "select * from nhac_cu join loai_nhac_cu on nhac_cu.MaLoaiNC = loai_nhac_cu.MaLoaiNC where loai_nhac_cu.MaLoaiNC  like '%$loainc%' ";
    } else if (empty(trim($loainc)) and !empty(trim($input))) {
        $query = "select * from nhac_cu join loai_nhac_cu on nhac_cu.MaLoaiNC = loai_nhac_cu.MaLoaiNC where nhac_cu.TenNC like '%$input%' ";
    } else {
        $query = "select * from nhac_cu join loai_nhac_cu on nhac_cu.MaLoaiNC = loai_nhac_cu.MaLoaiNC where loai_nhac_cu.MaLoaiNC  like '%$loainc%'  and nhac_cu.TenNC  like '%$input%' ";
    }
}

$resultloainhaccu = mysqli_query($conn, $queryloainhaccu);
$result = mysqli_query($conn, $query);
?>