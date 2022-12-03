<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php


?>
    <h1>Bạn đã đăng nhập thành công, dưới đây là những thông tin bạn đã nhập</h1>
    <p>Họ tên :<?php echo $_POST['fullname'] ?></p>
    <p>Địa chỉ :<?php echo $_POST['address'] ?></p>
    <p>Phone :<?php echo $_POST['phone'] ?></p>
    <p>Gender :<?php echo $_POST['gender'] ?></p>
    <p>Country :<?php echo $_POST['country']  ?></p>
    <p>Note :<?php echo $_POST['note'] ?></p>



</body>
</html>