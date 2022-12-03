
<link rel="stylesheet" href="./assets/css/style.css">
<?php

require('./connect.php');
require('./Function/Function.php');
    $queryall="SELECT nc.MaNC, nc.TenNC, nc.MoTa, nc.HinhNC, nc.DonGia, lnc.TenLoaiNC, hcc.TenHSX, ncc.TenNCC FROM nhac_cu AS nc 
    JOIN nha_cung_cap AS ncc ON nc.MaNCC=ncc.MaNCC JOIN loai_nhac_cu AS lnc ON lnc.MaLoaiNC=nc.MaLoaiNC 
    JOIN hang_san_xuat as hcc ON hcc.MaHSX=nc.MaHSX";
    $nowpage_layout='nhaccu';
    $query='';
    $totalRows=mysqli_num_rows(mysqli_query($conn,$queryall));
    $listPage=paginationdata($queryall,$totalRows,$nowpage_layout,$query);

  if(isset($_POST['searchbtn'])){
    if(isset($_POST['searchbox'])){
      $searchdata = trim($_POST['searchbox']);
      $query="$queryall WHERE nc.TenNC LIKE '%$searchdata%' OR nc.DonGia LIKE '%$searchdata%' OR lnc.TenLoaiNC LIKE '%$searchdata%' 
      OR ncc.TenNCC LIKE '%$searchdata%' OR hcc.TenHSX LIKE '%$searchdata%'";
    }
  }
  if(isset($_POST['reset'])){
    header('?page_layout=nhaccu');
  }

  $result = mysqli_query($conn,$query);
    


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

                    <div class="searchbox">
                    <form id="form" method="post"> 
                      <input type="search" id="query" name="searchbox" placeholder="Search...">
                      <button style="submit" name="searchbtn">Search</button>
                      <button style="submit" name="reset">Reset</button>
                    </form>
                    </div>

                    
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
                            <th> Quyền </th>
                          </tr>
                        </thead>
                        <?php 
    $stt=1;
   while($rows=mysqli_fetch_array($result)){


      $Anh=' <div class="row mt-3"> <img src="./assets/images/musical/'.$rows['HinhNC'].'" class="mb-2 mw-100 w-100 rounded" alt="image" style="height: 100px;"></div>'
        ?>    
                        <tbody>
                          <tr>
                            <td> <?php echo $stt++?></td>
                            <td>
                              
                              <a><?php echo $rows['TenNC'] ?></a>
                            </td>

          
                            <td> <?php echo $Anh?></td>

                            <td> <?php echo $rows['DonGia'].' VND'?></td>
                            <td> <?php echo $rows['TenLoaiNC']?></td>
                            <td> <?php echo $rows['TenNCC']?></td>
                            <td> <?php echo $rows['TenHSX']?></td>
                            
                            <td>
                            <a href="index.php?page_layout=detailnc&id_nc=<?php echo $rows['MaNC'] ?>" type="button" class="btn btn-gradient-info btn-sm" name="detailnc">Detail</a>
                            <a href="index.php?page_layout=editnc&id_dm=<?php echo $rows['MaNC'] ?>" type="button" class="btn btn-gradient-primary btn-sm" name="detelenc">Edit</a>
                
                            <a onclick="return delete_normal();" href="./NhacCu/DeleteNC.php?id_dm=<?php echo $rows['MaNC']?>" type="button" class="btn btn-gradient-success btn-sm" name="detelenc">Delete</a>
                            </td>
                            
                          </tr>
                        
                        </tbody>
                        <?php
   }
?>     
                      </table>
                    <?php paginationnav($listPage,$totalRows)?>

                    </div>
                  </div>
                </div>
              </div>
            </div>
         