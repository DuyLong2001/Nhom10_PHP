<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
<?php

   
require('./connect.php');
include('./Function/Function.php');
include('XuLy.php');

$queryall="SELECT * FROM loai_nhac_cu";
$nowpage_layout='lnc';
$query='';
$totalRows=mysqli_num_rows(mysqli_query($conn,$queryall));
$listPage=paginationdata($queryall,$totalRows,$nowpage_layout,$query);

  if(isset($_POST['searchbtn'])){
    if(isset($_POST['searchbox'])){
      $searchdata = trim($_POST['searchbox']);
    }

    $query="SELECT * FROM loai_nhac_cu WHERE TenLoaiNC LIKE '%$searchdata%'";
  }
  if(isset($_POST['reset'])){
    header('?page_layout=lnc');
  }

  $result = mysqli_query($conn,$query);

?>
<!------------------------------------------------------->
<!-- Modal add loai nhac cu -->
<div class="modal fade" id="loainhaccuaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm loại nhạc cụ </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="" method="POST">

                    <div class="modal-body">
                        <div class="form-group">
                            <label> Loại nhạc cụ </label>
                            <input type="text" name="TenLoaiNC" class="form-control" placeholder="Tên loại nhạc cụ">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="insertlnc" class="btn btn-primary">Save Data</button>
                    </div>
                </form>

            </div>
        </div>
  </div>

<div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Quản lý thông tin nhạc cụ </h4>
                    <h4>Loại nhạc cụ </h4>


                    
                   <button type="button" class="btn btn-gradient-danger btn-icon-text" 
                   data-toggle="modal" data-target="#loainhaccuaddmodal">
                     Add <i class="mdi mdi-file-check btn-icon-append"></i>
                    </button>

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
                            <th> Quyền </th>
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
                              
                              <a><?php echo $rows['TenLoaiNC'] ?></a>
                            </td>

                            <td>

                            <!-- Button trigger modal -->
                              <button type="button" class="btn btn-gradient-primary btn-sm" data-toggle="modal" data-target="#editlnc<?php echo $rows['MaLoaiNC']?>">
                                Edit
                              </button>



                                                       <!-- Modal Edit loại nhạc cụ-->
                          <div class="modal fade" id="editlnc<?php echo $rows['MaLoaiNC']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form action="" method="post">
                                    <div class="modal-body">
                                      
                                      <input type="hidden" name="MaLoaiNC" id="MaLoaiNC" value="<?php echo $rows['MaLoaiNC']; ?>">


                                        <div class="form-group">
                                            <label> Loại nhạc cụ </label>
                                            <input required value="<?php echo $rows['TenLoaiNC']; ?>" required type="text" name="TenLoaiNC" class="form-control" id="TenLoaiNC" placeholder="Nhập loại nhạc cụ">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary" name="submiteditlnc">Save changes</button>
                                    </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                                <!---------------------------END-------------------------->
                                <form action="" method="post">
                                <a onclick="return delete_advance();" href="./ChiTietNhacCu/XuLy.php?id_lnc=<?php echo $rows['MaLoaiNC']?>" type="button" class="btn btn-gradient-success btn-sm" name="deletelnc">Delete</a>
                                
                                </form>

                                
                
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


