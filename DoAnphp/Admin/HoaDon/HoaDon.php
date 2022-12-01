<script>
  function xoa(){
    var conf=confirm("Bạn có chắc chắn muốn xóa");
    return conf;
  }
</script>
<?php

require('./connect.php');

    
    $query="SELECT hdb.SoHD, hdb.NgayDH, hdb.NgayGH, hdb.MaKH, hdb.MaNV, hdb.TinhTrangDuyet, hdb.TinhTrangDonHang, nc.TenNC, kh.HoTenKH, cthd.SoLuong, cthd.DonGia FROM hoa_don_ban as hdb JOIN chi_tiet_hoa_don_ban as cthd ON hdb.SoHD=cthd.SoHD JOIN nhac_cu AS nc ON cthd.MaNC=nc.MaNC JOIN khach_hang AS kh ON kh.MaKH=hdb.MaKH WHERE 1
    ";
    $result = mysqli_query($conn,$query);


  
?>                          


<div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Quản Lý Nhân Viên</h4>
                    <?php
                    echo'<a href="index.php?page_layout=createnv"><button type="button" class="btn btn-gradient-danger btn-icon-text"> Add <i class="mdi mdi-file-check btn-icon-append"></i>
                    </button></a>';
                    ?>
                    
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> STT </th>
                            <th> Họ Tên </th>
                            <th> Nhạc cụ</th>
                            <th> Ngàu đặt hàng</th>
                            <th> Số lượng </th>
                            <th>Đơn Giá</th>
                            <th>Nhân viên</th>
                            <th>Ngày giao hàng</th>
                            <th> Tình trạng </th>
                            <th> # </th>
                          </tr>
                        </thead>
                        <?php 
    $stt=1;
   while($rows=mysqli_fetch_array($result)){

    
        ?>    
                        <tbody>
                          <tr>
                            <td> <?php echo $stt++?></td>
                            <td>
                              <a><?php echo $rows['HoTenKH'] ?></a>
                            </td>
                            <td> <?php echo $rows['TenNC']?></td>
                            <td> <?php echo $rows['NgayDH']?></td>
                            <td> <?php echo $rows['SoLuong']?></td>
                            <td> <?php echo $rows['DonGia']?></td>
                            <td> <?php echo $rows['MaNV']?></td>
                            <td> <?php echo $rows['NgayGH']?></td>
                            <td> <?php echo $rows['TinhTrangDuyet']?></td>
                            
 
                            <td>
                            <a href="index.php?page_layout=editnv&id_dm=<?php echo $rows['MaNV'] ?>" type="button" class="btn btn-gradient-primary btn-sm" name="detelenv">Edit</a>
                
                            <a onclick="return xoa();" href="./Nhanvien/DeleteNV.php?id_dm=<?php echo $rows['MaNV']?>" type="button" class="btn btn-gradient-success btn-sm" name="detelenv">Delete</a>
                            </td>
                            
                          </tr>
                        
                        </tbody>
                        <?php
   }
?>     
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
         