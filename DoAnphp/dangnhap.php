<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang đăng nhập</title>
    <link rel="stylesheet" href="./css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
</head>
<body>
   
    <?php
    include("connect.php");
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $Pass=($_POST['pass']);
        $pass=MD5($_POST['pass']);
        $query="SELECT * FROM khach_hang WHERE TaiKhoan='$name' and MatKhau='$pass'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 0) {
            echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
            exit;
        }
        $row = mysqli_fetch_array($result);
        if ($pass != $row['MatKhau']) {
            echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
            exit;
        }
        if(mysqli_num_rows($result)<>0){
            session_start();
            $_SESSION["m"] = "$name";
            if(isset($_POST['nhomk'])){
                setcookie('user',$name,time()+3600,'/','',0,0);
                setcookie('pass',$Pass,time()+3600,'/','',0,0);
            }
            header("location: ./index.php");
            exit;
            
        }
    }

?>
<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="data:image/jpeg;base64,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"
                     class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form method="post">
                   

                <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fw-bold mx-3 mb-0">Đăng nhập</p>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="text" name="name" id="form3Example3" class="form-control form-control-lg"
                               placeholder="Nhập tài khoản" value="<?php if(isset($_COOKIE['user'])) echo $_COOKIE['user'];?>"/>
                        <label class="form-label" for="form3Example3">Tài khoản</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <input type="password" name="pass" id="form3Example4" class="form-control form-control-lg"
                               placeholder="Nhập mật khẩu" value="<?php if(isset($_COOKIE['pass'])) echo $_COOKIE['pass'];?>"/>
                        <label class="form-label" for="form3Example4">Mật khẩu</label>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Checkbox -->
                        <div class="form-check mb-0">
                            <input class="form-check-input me-2" type="checkbox" name="nhomk" value="<?php if(isset($_COOKIE['user'])) echo "checked";?>" id="form2Example3" />
                            <label class="form-check-label" for="form2Example3">
                                Nhớ mật khẩu
                            </label>
                        </div>
                        <a href="./quenmatkhau.php" class="text-body">Quên mật khẩu?</a>
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <input type="submit" name="submit" value="Login" class="btn btn-primary btn-lg">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Chưa tạo tài khoản? <a href="dangki.php"
                                                                                          class="link-danger">Đăng kí</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div
        class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
        <!-- Copyright -->
        <div class="text-white mb-3 mb-md-0">
            Copyright © 2020. All rights reserved.
        </div>
        <!-- Copyright -->

        
    </div>
</section>
</body>
</html>
