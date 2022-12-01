


<?php

require('./connect.php');

    if(isset($_POST['submit'])){
      $thongbao='';
      if(empty($_POST['ht']) and empty($_POST['tdn']) and empty($_POST['mk']) and empty($_POST['sdt']) and empty($_POST['email'])
      and empty($_POST['dc'])){
        $thongbao='Vui lòng điền đầy đủ thông tin';
      }else{
        $hoten=$_POST['ht'];
        $tendn=$_POST['tdn'];
        $matkhau=md5($_POST['mk']);
        $sdt=$_POST['sdt'];
        $email=$_POST['email'];
        $diachi=$_POST['dc'];

        $query="INSERT INTO `nhan_vien`(`MaNV`, `HoTenNV`, `TenDN`, `MatKhau`, `SDT`, `Email`, `DiaChi`, `NVQuanLy`) 
        VALUES ('','$hoten','$tendn','$matkhau','$sdt','$email','$diachi','0')";
        $result = mysqli_query($conn,$query);
        if(!$result){
          $thongbao="Tạo mới thất bại vui lòng thực hiện lại";
        }else $thongbao="Tạo mới thành công";
      }

    }
?>

<div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Quản lý nhân viên</h4>
                    <p class="card-description"> Tạo mới </p>
                    <form class="forms-sample" method="post">
                      <div class="form-group">
                        <label >Họ Tên</label>
                        <input type="text" class="form-control"  name="ht" placeholder="Họ và tên">
                      </div>
                      <div class="form-group">
                        <label >Tên đăng nhập</label>
                        <input type="text" class="form-control"  name="tdn" placeholder="Username">
                      </div>
                      <div class="form-group">
                        <label >Mật khẩu</label>
                        <input type="password" class="form-control"  name="mk" placeholder="Password">
                      </div>
                      <div class="form-group">
                      <label >Số điện thoại</label>
                      <input type="text" class="form-control"  name="sdt" placeholder="số diện thoại">
                      </div>
                      <div class="form-group">
                        <label >Email</label>
                        <input type="email" class="form-control"  name="email" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label >Địa chỉ</label>
                        <input type="text" class="form-control"  name="dc" placeholder="Địa chỉ">
                      </div>

                      <button type="submit" class="btn btn-gradient-primary me-2" name="submit">Thêm</button>
                      <a href="./index.php?page_layout=nhanvien" class="btn btn-dark" type="button" name="exit">Thoát</a>

                      
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