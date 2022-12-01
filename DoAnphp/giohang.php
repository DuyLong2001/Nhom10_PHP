<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Electro - HTML Ecommerce Template</title>

 		<!-- Google font -->
 		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

 		<!-- Bootstrap -->
 		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

 		<!-- Slick -->
 		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
 		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

 		<!-- nouislider -->
 		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

 		<!-- Font Awesome Icon -->
 		<link rel="stylesheet" href="css/font-awesome.min.css">

 		<!-- Custom stlylesheet -->
 		<link type="text/css" rel="stylesheet" href="css/style.css"/>

	<style>
        
    </style>	
    </head>
	<body>
		<!-- HEADER -->
		<?php include('./H.php');?>
		<!-- /HEADER -->

		

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Giỏ hàng</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Home</a></li>
							<li class="active">Giỏ hàng</li>
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
			if(isset($_POST['sl'])){
				foreach($_POST['sl'] as $id=>$sl){
					if($sl==0){
						unset($_SESSION['giohang'][$id]);
					}
					else if($sl>0){
						$_SESSION['giohang'][$id]=$sl;
					}
				}
			}
			$arrId=array();
			foreach($_SESSION['giohang'] as $id=>$soluong){
				$arrId[]=$id;
			}
			$strId= implode(',', $arrId);
			$query= "SELECT * FROM nhac_cu WHERE MaNC IN($strId) ORDER BY MaNC DESC";
			$result = mysqli_query($conn, $query);
			?>
			<form id="giohang" method='post'>
			<table align='center' width='100%' >
			<tr>
				<th>Hình</th>
				<th>Tên nhạc cụ</th>
				<th>Đơn giá</th>
				<th>Số lượng</th>
				<th>Thành tiền</th>
				<th>Hủy đơn hàng</th>
			</tr>
			<?php
			$tongtiensp=0;
			while($rows = mysqli_fetch_array($result)){
				$tong=$rows['DonGia']*$_SESSION['giohang'][$rows['MaNC']];
				echo "<tr>";
				echo "<td>"."<img src='img/".$rows['HinhNC']."' width='100px' height='100px'>"."</td>";
				echo "<td>{$rows['TenNC']}</td>";
				echo "<td>{$rows['DonGia']}</td>";
				echo "<td><input name='sl[".$rows['MaNC']."]' type='number' min='0' max='10' class='text-center' value='".$_SESSION['giohang'][$rows['MaNC']]."'/></td>";
				echo "<td>{$tong} VNĐ</td>";
				echo "<td>"
						."<a href='xoasp.php?id=".$rows['MaNC']."'>"."<button type='button'>"."Xóa"."</button>"."</a>"
					."</td>";
				echo "</tr>"; 
				$tongtiensp+=$tong; 
			}
			?>
			
			

			</table>
			</form>
			<br>
			<div align="right">
				<td colspan="6">
					<a class='btn btn-warning' href='index.php'>Tiếp tục mua hàng</a>&nbsp;&nbsp;&nbsp;
					<a onclick="document.getElementById('giohang').submit();" href="#" class="btn btn-info">Cập nhật</a>&nbsp;&nbsp;&nbsp;
					<a class="btn btn-default" href="xoasp.php?id=0">Xóa tất cả sản phẩm</a>
					<font size="3" class="indent1"><b>Tổng tiền giỏ hàng: </font><span style="color: red;" class="indent"><?php echo $tongtiensp." VNĐ"?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></b>
					<a class="btn btn-success" href="muahang.php">Thanh toán</a>
				</td>
			</div>
			
				
			<?php	
			
		}
		else{
			echo "<script>alert('Hiện không có sản phẩm nào trong Giỏ hàng của bạn');</script>";
			echo "<div align='right'>
					<a class='btn btn-warning' href='index.php'>Tiếp tục mua hàng</a>
				</div>";
		}
    ?>
		<br>

		<!-- FOOTER -->
		<?php include('./F.php') ?>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>
