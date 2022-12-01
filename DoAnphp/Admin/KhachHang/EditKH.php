


<?php

require('./connect.php');
$id_dm=$_GET['id_dm'];
$query1="SELECT * FROM khach_hang WHERE MaKH=$id_dm ";
        $result1 = mysqli_query($conn,$query1);
        $rows=mysqli_fetch_assoc($result1);

    if(isset($_POST['submit'])){
      $thongbao='';
      if(empty($_POST['ht']) and empty($_POST['tdn']) and empty($_POST['mk']) and empty($_POST['sdt']) and empty($_POST['email'])
      and empty($_POST['dc'])){
        $thongbao='Vui lòng điền đầy đủ thông tin';
      }else{
        $hoten=$_POST['ht'];
        $tendn=$_POST['tdn'];
        $sdt=$_POST['sdt'];
        $email=$_POST['email'];
        $diachi=$_POST['dc'];
        $query="UPDATE khach_hang SET HoTenKH='$hoten',TaiKhoan='$tendn'
        ,SDT='$sdt',Email='$email',DiaChi='$diachi' WHERE MaKH=$id_dm";
        $result = mysqli_query($conn,$query);
        if(!$result){
          $thongbao="Cập nhật thất bại vui lòng thực hiện lại";
        }else {
        $thongbao="Cập nhật mới thành công";
        };
      }

    }
?>

<div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Quản lý Khách Hàng</h4>
                    <p class="card-description"> Cập nhật </p>
                    <form class="forms-sample" method="post">
                      <div class="form-group">
                        <label >Họ Tên</label>
                        <input type="text" class="form-control"  name="ht" placeholder="Họ và tên" value="<?php  if(isset($hoten)) echo $hoten; else echo $rows['HoTenKH']?>">
                      </div>
                      <div class="form-group">
                        <label >Tên đăng nhập</label>
                        <input type="text" class="form-control"  name="tdn" placeholder="Username" value="<?php if(isset($tendn)) echo $tendn; else echo $rows['TaiKhoan']?>">
                      </div>

                      <div class="form-group">
                      <label >Số điện thoại</label>
                      <input type="text" class="form-control"  name="sdt" placeholder="số diện thoại" value="<?php if(isset($sdt)) echo $sdt; else echo $rows['SDT']?>">
                      </div>
                      <div class="form-group">
                        <label >Email</label>
                        <input type="email" class="form-control"  name="email" placeholder="Email" value="<?php if(isset($email)) echo $email; else echo $rows['Email']?>">
                      </div>
                      <div class="form-group">
                        <label >Địa chỉ</label>
                        <input type="text" class="form-control"  name="dc" placeholder="Địa chỉ" value="<?php if(isset($diachi)) echo $diachi; else echo $rows['DiaChi']?>">
                      </div>

                      <button type="submit" class="btn btn-gradient-primary me-2" name="submit">Cập nhật</button>
                      <a href="./index.php?page_layout=khachhang" class="btn btn-dark" type="button" name="exit">Thoát</a>

                      
                      <div class="form-group">
                        <?php if(isset($thongbao))
                        echo '<a style="color: red;">'.$thongbao.'</a>'
                        ?>
                        
                      </div>
                    </form>
                  </div>
                </div>
              </div>
</div>              