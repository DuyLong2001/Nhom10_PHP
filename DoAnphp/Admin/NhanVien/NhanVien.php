<script>
  function xoa(){
    var conf=confirm("Bạn có chắc chắn muốn xóa");
    return conf;
  }
</script>
<?php

require('./connect.php');

    
    $query="SELECT * FROM `nhan_vien`";
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
                            <th> Email </th>
                            <th> Địa chỉ </th>
                            <th> SĐT </th>
                            <th>Tài khoản</th>
                            <th> Quyền </th>
                            <th> # </th>
                          </tr>
                        </thead>
                        <?php 
    $stt=1;
   while($rows=mysqli_fetch_array($result)){
    if($rows['NVQuanLy']==1){ $cv='Quản lý'; 
      $Anh='<img src="./images/faces/face1.jpg'.'" class="me-2" alt="image"';
    }
    else {$cv='Nhân viên';
      $Anh='<img src="./images/faces/face2.jpg'.'" class="me-2" alt="image"';}
    
        ?>    
                        <tbody>
                          <tr>
                            <td> <?php echo $stt++?></td>
                            <td>
                              <?php echo $Anh?>
                              <a><?php echo $rows['HoTenNV'] ?></a>
                            </td>
                            <td> <?php echo $rows['Email']?></td>
                            <td> <?php echo $rows['DiaChi']?></td>
                            <td> <?php echo $rows['SDT']?></td>
                            <td> <?php echo $rows['TenDN']?></td>
                            <td> <?php echo $cv?></td>
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
         