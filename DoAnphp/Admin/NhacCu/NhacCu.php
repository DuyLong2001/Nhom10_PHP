<script>
  function xoa(){
    var conf=confirm("Bạn có chắc chắn muốn xóa");
    return conf;
  }
</script>
<?php

require('./connect.php');

    
    $query="SELECT nc.MaNC, nc.TenNC, nc.MoTa, nc.HinhNC, nc.DonGia, lnc.TenLoaiNC, hcc.TenHSX, ncc.TenNCC 
    FROM nhac_cu AS nc JOIN nha_cung_cap AS ncc ON nc.MaNCC=ncc.MaNCC 
    JOIN loai_nhac_cu AS lnc ON lnc.MaLoaiNC=nc.MaLoaiNC JOIN hang_san_xuat as hcc ON hcc.MaHSX=nc.MaHSX WHERE 1";
    $result = mysqli_query($conn,$query);

    include('./Function/Function.php');

?>                          


<div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Quản Lý nhạc cụ</h4>
                    <?php
                    echo'<a href="index.php?page_layout=createnc"><button type="button" class="btn btn-gradient-danger btn-icon-text"> Add <i class="mdi mdi-file-check btn-icon-append"></i>
                    </button></a>';
                    ?>

                    
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> STT </th>
                            <th> Tên nhạc cụ </th>
                            <th> Hình ảnh </th>
                            <th> Đơn Giá </th>
                            <th> Loại nhạc cụ</th>
                            <th> Nhà cung cấp </th>
                            <th> Hãng sản xuất</th>
                            <th> # </th>
                          </tr>
                        </thead>
                        <?php 
    $stt=1;
   while($rows=mysqli_fetch_array($result)){

      //$Anh='<img src="./images/'.$rows['HinhNC'].'" class="me-10" alt="image"';
      $Anh=' <div class="row mt-3"> <img src="./images/'.$rows['HinhNC'].'" class="mb-2 mw-100 w-100 rounded" alt="image" style="height: 100px; min-width: 150px;"></div>'
        ?>    
                        <tbody>
                          <tr>
                            <td> <?php echo $stt++?></td>
                            <td>
                              
                              <a><?php echo $rows['TenNC'] ?></a>
                            </td>
                            <td> <?php echo $Anh?></td>

                            <td> <?php echo $rows['DonGia'].' VND'?></td>
                            <td> <?php inchuoi( $rows['TenLoaiNC'])?></td>
                            <td> <?php inchuoi( $rows['TenNCC'])?></td>
                            <td> <?php inchuoi( $rows['TenHSX'])?></td>
                            
                            <td>
                            <a href="index.php?page_layout=editnc&id_dm=<?php echo $rows['MaNC'] ?>" type="button" class="btn btn-gradient-primary btn-sm" name="detelenv">Edit</a>
                
                            <a onclick="return xoa();" href="./NhacCu/DeleteNC.php?id_dm=<?php echo $rows['MaNC']?>" type="button" class="btn btn-gradient-success btn-sm" name="detelenv">Delete</a>
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
         