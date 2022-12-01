<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script>
  function chooseFile(fileInput){
    var reader = new FileReader();

    reader.onload = function(e){
      $('#image').attr('src',e.target.result);
    }
    reader.readAsDataURL(fileInput.files[0]);
  }
  </script>


  </head>
  <body>

  <?php

require('./connect.php');
    $id_dm=$_GET['id_dm'];
    $query1="SELECT * FROM nhac_cu WHERE MaNC=$id_dm ";
        $result1 = mysqli_query($conn,$query1);
        $rows=mysqli_fetch_assoc($result1);

    if(isset($_POST['submit'])){
      $thongbao='';
      if(empty($_POST['tnc']) || empty($_POST['gia']) || empty($_POST['lnc']) || empty($_POST['ncc']) || empty($_POST['hsx'])
      ){
        $thongbao='Vui lòng điền đầy đủ thông tin';
      }else{
        $tennc=$_POST['tnc'];
        $gia=$_POST['gia'];
        $loainc=$_POST['lnc'];
        $nhacc=$_POST['ncc'];
        $hangsx=$_POST['hsx'];
        $mota=$_POST['mota'];
        //////////////////////////////
        $target_dir = "./images/";
        $target_file = $target_dir . basename($_FILES["imgselect"]["name"]);
        $hinhnc=basename($_FILES["imgselect"]["name"]);
        


        $query="UPDATE nhac_cu SET TenNC='$tennc',MoTa='$mota',
        HinhNC='$hinhnc',DonGia='$gia',MaLoaiNC='$loainc',MaNCC='$nhacc',MaHSX='$hangsx' WHERE MaNC=$id_dm";
        $result = mysqli_query($conn,$query);
        if(!$result){
          $thongbao="Cập nhật thất bại vui lòng thực hiện lại";
        }else{ $thongbao="Cập nhật thành công";
          move_uploaded_file($_FILES["imgselect"]["tmp_name"], $target_file);
        }
      }

    }

   
?>


<div class="row">
<div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Quản lý nhạc cụ</h4>
                    <p class="card-description"> Cập nhật </p>
                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label >Tên Nhạc cụ</label>
                        <input type="text" class="form-control"  name="tnc" placeholder="Tên nhạc cụ" 
                        value="<?php if(isset($tennc)) echo $tennc;else echo $rows['TenNC'];?>">
                      </div>
                      <div class="form-group">
                        <label >Đơn giá</label>
                        <input type="text" class="form-control"  name="gia" placeholder="Giá sản phẩm"
                        value="<?php if(isset($gia)) echo $tennc;else echo $rows['DonGia'];?>">
                      </div>
                      
                      <div class="form-group">
                      <label for="exampleFormControlSelect3">Loại nhạc cụ</label>
                      <select class="form-control form-control-sm"  name="lnc">
                        <?php
                        $K=$rows['MaLoaiNC'];
                        $querylnc1="SELECT * FROM loai_nhac_cu WHERE MaLoaiNC=$K";
                        $resultlnc1=mysqli_query($conn,$querylnc1);
                        $row12=mysqli_fetch_array($resultlnc1)
                        ?>
                        <option value="<?php echo $row12['MaLoaiNC']?>"><?php echo $row12['TenLoaiNC'] ?></option>
                      <?php
                                    
                                    $querylnc='SELECT * FROM `loai_nhac_cu` WHERE 1';
                                    $resultlnc=mysqli_query($conn,$querylnc);

                                    while($row1=mysqli_fetch_array($resultlnc)):;?>
                                     <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>
                                     
                                     <?php endwhile;?>
                      </select>
                    </div>

                      <div class="form-group">
                      <label for="exampleFormControlSelect3">Nhà cung cấp</label>
                      <select class="form-control form-control-sm" name="ncc">
                      <?php
                        $K1=$rows['MaNCC'];
                        $queryncc1="SELECT * FROM nha_cung_cap WHERE MaNCC=$K1";
                        $resultncc1=mysqli_query($conn,$queryncc1);
                        $row123=mysqli_fetch_array($resultncc1)
                        ?>
                        <option value="<?php echo $row123['MaNCC']?>"><?php echo $row123['TenNCC'] ?></option>
                      <?php
                                    $queryncc='SELECT * FROM `nha_cung_cap` WHERE 1';
                                    $resultncc=mysqli_query($conn,$queryncc);
                                    while($row1=mysqli_fetch_array($resultncc)):;?>
                                     <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>
                                     <?php endwhile;?>
                      </select>
                    </div>
                      <div class="form-group">
                      <label for="exampleFormControlSelect3">Hãng sản xuất</label>
                      <select class="form-control form-control-sm" name="hsx">
                      <?php
                        $K2=$rows['MaHSX'];
                        $queryhsx1="SELECT * FROM hang_san_xuat WHERE MaHSX=$K2";
                        $resulthsx1=mysqli_query($conn,$queryhsx1);
                        $row123=mysqli_fetch_array($resulthsx1)
                        ?>
                        <option value="<?php echo $row123['MaHSX']?>"><?php echo $row123['TenHSX'] ?></option>
                      <?php
                                    $queryhsx='SELECT * FROM `hang_san_xuat` WHERE 1';
                                    $resulthsx=mysqli_query($conn,$queryhsx);
                                    while($row1=mysqli_fetch_array($resulthsx)):;?>
                                     <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>
                                     <?php endwhile;?>
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Mô tả</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4" name="mota"><?php if(isset($mota)) 
                        echo $mota;else echo $rows['MoTa'];?></textarea>
                      </div>
                    <div class="row mt-3">
                        <img src="<?php if(isset($hinhnc)) echo './images/'.$hinhnc; else echo './images/'.$rows['HinhNC'];?>" 
                        class="mb-2 mw-100 w-100 rounded" alt="image" id="image" width="400" height="300" style="border: 2px solid black;">
                    </div>
                    <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="imgselect" class="file-upload-default" onchange="chooseFile(this)"
                        accept="image/gif, image/jpeg , image/png">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>



                    <button type="submit" class="btn btn-gradient-primary me-2" name="submit">Cập nhật</button>
                      <a href="./index.php?page_layout=nhaccu" class="btn btn-dark" type="button" name="exit">Thoát</a>
                      <?php if(isset($thongbao))
                        echo '<a style="color: red;">'.$thongbao.'</a>';
                        ?>
                      <div class="form-group">

                        
                      </div>
                    </form>
                  </div>
                </div>
              </div>
</div>


    <script src="./assets/vendors/js/vendor.bundle.base.js"></script>

    <script src="./assets/js/off-canvas.js"></script>
    <script src="./assets/js/hoverable-collapse.js"></script>
    <script src="./assets/js/misc.js"></script>
    <script src="./assets/js/file-upload.js"></script>

  </body>
</html>
