<?php
require('./connect.php');
$idnc=$_GET['id_nc'];
$query="SELECT nc.MaNC, nc.TenNC, nc.MoTa, nc.HinhNC, nc.DonGia, lnc.TenLoaiNC, hcc.TenHSX, ncc.TenNCC FROM nhac_cu AS nc 
JOIN nha_cung_cap AS ncc ON nc.MaNCC=ncc.MaNCC JOIN loai_nhac_cu AS lnc ON lnc.MaLoaiNC=nc.MaLoaiNC 
JOIN hang_san_xuat as hcc ON hcc.MaHSX=nc.MaHSX WHERE nc.MaNC=$idnc";
  $result = mysqli_query($conn,$query);
  $rows=mysqli_fetch_assoc($result);
?>
        <h3 class="card-title text-danger">Thông tin nhạc cụ</h3>
                      <div class="container" style="margin: auto; width: auto;">
        <table align="center" bgcolor="#CFF5F5">
            <tr bgcolor="#BCADEB">
                <td colspan="3" align="center"><h1> <?php echo $rows['TenNC'] ?></h1></td>
            </tr>
            <tr>
                <td colspan="1"><img src="./assets/images/musical/<?php echo ''.$rows['HinhNC'].''?>" alt='' width="250px" height="350px"></td>
                <td>
                    <p>Giá: <?php echo $rows['DonGia'].' VND'?></p>
                    <p>Loại nhạc cụ : <?php echo $rows['TenLoaiNC']?></p>
                    <p>Nhà cung cấp: <?php echo $rows['TenNCC']?></p>
                    <p>Hãng sản xuất : <?php echo $rows['TenHSX']?></p>
                    <p>Mô tả : <?php echo $rows['MoTa']?></p>
                 </td>
            </tr>
        </table>
    </div>
    <style>

    td {
        padding: 2px 10px;
        border: 1px solid #222;
    }
    p{
        color:  #F08002;
        font-style: bold;
        font-size: 20px;
    }
    </style>                      