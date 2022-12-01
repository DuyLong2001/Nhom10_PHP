
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
<!------------------------------------------------------------------------------>

</head>
<body>
  
<script>
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#MaLoaiNC').val(data[0]);
                $('#TenLoaiNC').val(data[1]);
            });
        });
    </script>
    <script>
      $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
    </script>
</body>
</html>
<?php

require('./connect.php');
include('./Function/Function.php');
include('Editdata.php');

  // Truy vấn loại nhạc cụ
    $query="SELECT * FROM `loai_nhac_cu`";
    $result = mysqli_query($conn,$query);
  // Truy vấn hãng sản xuất
    $query1="SELECT * FROM `hang_san_xuat`";
    $result1 = mysqli_query($conn,$query1);
  // Truy vẫn nhà cung cấp  
    $query2="SELECT * FROM nha_cung_cap";
    $result2 = mysqli_query($conn,$query2);



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

                    
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> STT </th>
                            <th> Tên nhạc cụ </th>
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
                              
                              <a><?php echo $rows['TenLoaiNC'] ?></a>
                            </td>

                            <td>
                            <a href="" type="button" class="btn btn-gradient-primary btn-sm editbtn" >Edit</a>
                            <button type="button" class="btn btn-success editbtn"> EDIT </button>
                            <!-- Button trigger modal -->
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $rows['MaLoaiNC']?>">
                                Launch demo modal
                              </button>



                                                       <!-- Modal -->
                          <div class="modal fade" id="exampleModal<?php echo $rows['MaLoaiNC']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                      <button type="submit" class="btn btn-primary" name="submitedit">Save changes</button>
                                    </div>
                                    </form>
                                  </div>
                                </div>
                              </div>

                
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
   <!------------------------------------------------------------------------------>
   <!------------------------------------------------------->
<!-- Modal add hãng sản xuất -->
<div class="modal fade" id="hangsxaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm hãng sản xuất </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="" method="POST">

                    <div class="modal-body">
                        <div class="form-group">
                            <label> Hãng sản xuất </label>
                            <input type="text" name="tenhsx" class="form-control" placeholder="Tên Hãng">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label> Địa chỉ </label>
                            <input type="text" name="dc" class="form-control" placeholder="Địa chỉ">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label> Số điện thoại </label>
                            <input type="text" name="sdt" class="form-control" placeholder="Số điện thoại">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="inserthsx" class="btn btn-primary">Save Data</button>
                    </div>
                </form>

            </div>
        </div>
  </div>


<div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4>Hãng sản xuất </h4>
                    <button type="button" class="btn btn-gradient-danger btn-icon-text" 
                   data-toggle="modal" data-target="#hangsxaddmodal">
                     Add <i class="mdi mdi-file-check btn-icon-append"></i>
                    </button>

                    
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> STT </th>
                            <th> Tên Hãng sản xuất </th>
                            <th> Địa chỉ </th>
                            <th> Số điện thoại </th>
                            <th> # </th>
                          </tr>
                        </thead>
                        <?php 
    $stt=1;
   while($rows1=mysqli_fetch_array($result1)){
    
        ?>    
                        <tbody>
                          <tr>
                            <td> <?php echo $stt++?></td>
                            <td><a><?php inchuoi($rows1['TenHSX'])  ?></a></td>
                            <td><?php inchuoi($rows1['DiaChi']) ?></td>
                            <td><?php echo $rows1['SDT'] ?></td>
                            <td>
                            <a href="" type="button" class="btn btn-gradient-primary btn-sm" name="detelenv">Edit</a>
                
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
 <!------------------------------------------------------------------------------>
    <!------------------------------------------------------->
<!-- Modal add Nhà cung cấp -->
<div class="modal fade" id="nhaccaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm nhà cung cấp </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="" method="POST">

                    <div class="modal-body">
                        <div class="form-group">
                            <label> Nhà cung cấp </label>
                            <input type="text" name="tenncc" class="form-control" placeholder="Tên nhà cung cấp">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label> Số điện thoại </label>
                            <input type="text" name="sdtncc" class="form-control" placeholder="Số điện thoại">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label> Địa chỉ </label>
                            <input type="text" name="dcncc" class="form-control" placeholder="Địa chỉ">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label> Email </label>
                            <input type="email" name="emailncc" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="insertncc" class="btn btn-primary">Save Data</button>
                    </div>
                </form>

            </div>
        </div>
  </div>


 <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4>Nhà cung cấp </h4>
                    <button type="button" class="btn btn-gradient-danger btn-icon-text" 
                   data-toggle="modal" data-target="#nhaccaddmodal">
                     Add <i class="mdi mdi-file-check btn-icon-append"></i>
                    </button>

                    
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> STT </th>
                            <th> Tên Nhà cung cấp </th>
                            <th> Số điện thoại </th>
                            <th> Địa chỉ </th>
                            <th> Email </th>
                            <th> # </th>
                          </tr>
                        </thead>
                        <?php 
    $stt=1;
   while($rows2=mysqli_fetch_array($result2)){
    
        ?>    
                        <tbody>
                          <tr>
                            <td> <?php echo $stt++?></td>
                            <td><a><?php inchuoi($rows2['TenNCC'])  ?></a></td>
                            <td><?php echo $rows2['SDT'] ?></td>
                            <td><?php inchuoi($rows2['DiaChi']) ?></td>
                            <td><?php echo $rows2['Email'] ?></td>
                            <td>
                            <a href="" type="button" class="btn btn-gradient-primary btn-sm" name="detelenv">Edit</a>
                
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
         