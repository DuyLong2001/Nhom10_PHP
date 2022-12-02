
	<body>
		<!-- HEADER -->
		<?php
 include('./H.php');?>
		<!-- /HEADER -->
<?php

use LDAP\Result;
use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;


    require './PHPMailer/src/Exception.php';
    require './PHPMailer/src/PHPMailer.php';
    require './PHPMailer/src/SMTP.php';

?>
	
		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Thanh toán</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Home</a></li>
							<li class="active">Giỏ hàng</li>
                            <li class="active">Thanh toán</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->
<?php
    include("connect.php");
    if(isset($_SESSION['giohang'])){
        $arrId=array();
        foreach($_SESSION['giohang'] as $id=>$sl){
            $arrId[]=$id;
        }
        $strId=implode(',', $arrId);
        $query="SELECT * FROM nhac_cu WHERE MaNC IN($strId) ORDER BY MaNC DESC";
        $result = mysqli_query($conn, $query);
    }          
?>
<form id="giohang" method="post">
<table align='center' width='100%' >
<tr>
    <th>Mã</th>
    <th>Tên nhạc cụ</th>
    <th>Đơn giá</th>
    <th>Số lượng</th>
    <th>Thành tiền</th>
</tr>
<?php
    $tongtiensp=0;
    while($rows = mysqli_fetch_array($result)){
        $tong1=$rows['DonGia']*$_SESSION['giohang'][$rows['MaNC']];
        echo "<tr>";
        echo "<td>".$rows['MaNC']."</td>";
        echo "<td>".$rows['TenNC']."</td>";
        echo "<td>".$rows['DonGia']."</td>";
        echo "<td>".$_SESSION['giohang'][$rows['MaNC']]."</td>";
        echo "<td>".$tong1 ."VNĐ"."</td>";
        echo "</tr>";
        $tongtiensp+=$tong1; 
        
    }
    echo "<td>"."<input type='text' name='tongtien' value='".$tongtiensp." VNĐ"."'/></td>";
?>


</table>
 
<br>
<div align="right">
    <td colspan="5">
        <font size="3" class="indent1"><b>Tổng giá trị hóa đơn: </font><span style="color: red;" class="indent"><?php echo $tongtiensp." VNĐ"?></span></b>
    </td>
</div>   
<br>
<font size="3"><b>&nbsp;&nbsp;&nbsp;Thông tin người đặt hàng</b></font>
<?php 
    if(isset($_SESSION["m"])){
        $name=$_SESSION["m"];
        $query="SELECT * FROM khach_hang WHERE TaiKhoan='$name'";
        $result=mysqli_query($conn,$query);
    }
?>                            

<table align='center' width='100%' >
    <br>
<tr>
    <th>Họ tên khách hàng</th>
    <th>Số điện thoại</th>
    <th>Email</th>
    <th>Địa chỉ</th>
</tr>
<?php
    while($rows = mysqli_fetch_array($result)){
        echo "<tr>";
        echo "<td>"."<input type='text' name='hoten' value='".$rows['HoTenKH']."'/>"."</td>";
        echo "<td>"."<input type='text' name='sdt' value='".$rows['SDT']."'/>"."</td>";
        echo "<td>"."<input type='text' name='email' value='".$rows['Email']."'/>"."</td>";
        echo "<td>"."<input type='text' name='dc' value='".$rows['DiaChi']."'/>"."</td>";
        echo "</tr>"; 
    }
?>
<div align="right">
    <br><input class="btn btn-success"  name="submit" type="submit" value="Thanh toán"/>
</div>
</table>
</form>   


<br>
<?php

if(isset($_POST['submit'])){  
    $now = date_create()->format('Y-m-d H:i:s');
    $query="SELECT * FROM khach_hang WHERE TaiKhoan='$name'";
    $result1=mysqli_query($conn,$query);
    $Makh=array();
    while($rows = mysqli_fetch_array($result1)){
        $makh1=$rows['MaKH'];
        $makh[]=$rows['MaKH'];
        foreach($makh as $maKH){
            $Makh[]=$maKH;
        }
        $hoadonban="INSERT INTO `hoa_don_ban`( `SoHD`, `NgayDH`, `NgayGH`, `MaKH`, `MaNV`, `TinhTrangDuyet`, `TinhTrangDonHang`) VALUES (null,'$now',null,'$makh1',null,'0','0')";
        mysqli_query($conn,$hoadonban);
    }
    $MaKH=implode(",",$Makh);
    $laymaddh = "select SoHD from hoa_don_ban order by SoHD desc limit 1";
    $result_laymaddh = mysqli_query($conn, $laymaddh);
    $run_laymaddh = mysqli_fetch_array($result_laymaddh);
    $donhangid = $run_laymaddh["SoHD"];

    if(isset($_SESSION['giohang'])){
        $arrId=array();
        foreach($_SESSION['giohang'] as $id=>$sl){
            $arrId[]=$id;
        }
        $strId=implode(',', $arrId);
        $query2="SELECT * FROM nhac_cu WHERE MaNC IN($strId) ORDER BY MaNC DESC";
        $result2=mysqli_query($conn, $query2);
    }
    while($rows = mysqli_fetch_array($result2)){
        $manc=$rows['MaNC'];
        $soluong=$_SESSION['giohang'][$rows['MaNC']];
        $dongia=$rows['DonGia'];   
        $query="INSERT INTO `gio_hang`(`id`, `MaKH`, `MaNC`, `TrangThai`, `SoLuong`, `DonGia`) VALUES (null,'$MaKH','$manc','1','$soluong','$dongia')";
        mysqli_query($conn, $query); 
    }
    $querygiohang = "SELECT * FROM gio_hang JOIN nhac_cu ON gio_hang.MaNC=nhac_cu.MaNC WHERE MaKH='$MaKH'";
    $result3 = mysqli_query($conn, $querygiohang);
    if (mysqli_num_rows($result3) != 0) {
    while($rows = mysqli_fetch_array($result3)){
        $manc=$rows['MaNC'];
        $soluong=$_SESSION['giohang'][$rows['MaNC']];
        $dongia=$rows['DonGia'];   
        $query="INSERT INTO `chi_tiet_hoa_don_ban` VALUE($donhangid,'$manc','$soluong','$dongia')";
        mysqli_query($conn, $query);  
        }
    }
    
        $query="SELECT * FROM khach_hang WHERE MaKH='$MaKH'";
        $result=mysqli_query($conn,$query);
        $rows = mysqli_fetch_array($result);
        $hoten=$rows['HoTenKH'];
        $email=$rows['Email'];
        $sdt=$rows['SDT'];
        $dc=$rows['DiaChi'];
        echo $hoten;
        $strBody = '';
        //Thông tin Khách hàng
        $strBody = '<p>
        <b>Khách hàng:</b> '.$hoten.'<br />
        <b>Email:</b> '.$email.'<br />
        <b>Điện thoại:</b> '.$sdt.'<br />
        <b>Địa chỉ:</b> '.$dc.'
        </p>';
        
        $arrId=array();
        foreach($_SESSION['giohang'] as $id=>$sl){
            $arrId[]=$id;
        }
        $strId=implode(',', $arrId);
        $query="SELECT * FROM nhac_cu WHERE MaNC IN($strId) ORDER BY MaNC DESC";
        $result=mysqli_query($conn, $query);
        
        // Danh sách Sản phẩm đã mua
        $strBody .= ' <table border="1px" cellpadding="10px" cellspacing="1px"
    width="100%">
    <tr>
    <td align="center" bgcolor="#3F3F3F" colspan="4"><font
    color="white"><b>XÁC NHẬN HÓA ĐƠN THANH TOÁN</b></font></td>
    </tr>
    <tr id="invoice-bar">
    <td width="45%"><b>Tên Sản phẩm</b></td>
    <td width="20%"><b>Giá</b></td>
    <td width="15%"><b>Số lượng</b></td>
    <td width="20%"><b>Thành tiền</b></td>
    </tr>';
    
    $tongtiensp = 0;
    while($rows = mysqli_fetch_array($result)){
    $tong = $rows['DonGia']*$_SESSION['giohang'][$rows['MaNC']];
    $strBody .= '<tr>
    <td class="prd-name">'.$rows['TenNC'].'</td>
    <td class="prd-price"><font color="#C40000">'.$rows['DonGia'].'
    VNĐ</font></td>
    <td class="prd-number">'.$_SESSION['giohang'][$rows['MaNC']].'</td>
    <td class="prd-total"><font color="#C40000">'.$tong.'
    VNĐ</font></td>
    </tr>';
    $tongtiensp += $tong;
    }
    $strBody .= '<tr>
    <td class="prd-name">Tổng giá trị hóa đơn là:</td>
    <td colspan="2"></td>
    <td class="prd-total"><b><font color="#C40000">'.$tongtiensp.'
    VNĐ</font></b></td>
    </tr>
    </table>';
    $strBody .= '<p align="justify">
    <b>Quý khách đã đặt hàng thành công!</b><br />
    • Sản phẩm của Quý khách sẽ được chuyển đến Địa chỉ có trong phần
    Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.<br
    />
    • Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước
    khi giao hàng 24 tiếng.<br />
    <b><br />Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng
    Tôi!</b>
    </p>';

        //Thiết lập cấu hình PHP mailer để gửi Email
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = 0;// Enable verbose debug output
            $mail->isSMTP();// gửi mail SMTP
            $mail->Host = 'smtp.gmail.com';// Set the SMTP server to send through
            $mail->SMTPAuth = true;// Enable SMTP authentication
            $mail->CharSet  = "utf-8";
            $mail->Username = 'long01229077706@gmail.com';// SMTP username
            $mail->Password = 'ggfaaystppdpwuto'; // SMTP password
            $mail->SMTPSecure = 'tls';// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port = 587; // TCP port to connect to 
            //Recipients
            $mail->addAddress($email); // Add a recipient
            // Content
            $mail->isHTML(true);   // Set email format to HTML
            $mail->Subject = 'Cửa hàng BlueMusic gửi hóa đơn đến bạn';
            $mail->Body = $strBody;
            $mail->send();
            echo 'Đã gửi mail';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        header("location: ./hoanthanh.php");
        unset($_SESSION['giohang']);
        
    }
    

    ?>

		<!-- FOOTER -->
		<?php include('./F.php'); ?>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>

	</body>
