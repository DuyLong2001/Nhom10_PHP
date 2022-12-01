<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vietpro Mobile Shop - Mua hàng thành công</title>
<link rel="stylesheet" type="text/css" href="css/trangchu.css" />

<link rel="stylesheet" type="text/css" href="css/hoanthanh.css" />

<link rel="stylesheet" type="text/css" href="css/slideshow.css" />

<script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>

<script type="text/javascript">

/*** 
    Simple jQuery Slideshow Script
    Released by Jon Raasch (jonraasch.com) under FreeBSD license: free to use or modify, not responsible for anything, etc.  Please link out to me if you like it :)
***/

function slideSwitch() {
    var $active = $('#slideshow IMG.active');

    if ( $active.length == 0 ) $active = $('#slideshow IMG:last');

    // use this to pull the anh in the order they appear in the markup
    var $next =  $active.next().length ? $active.next()
        : $('#slideshow IMG:first');

    // uncomment the 3 lines below to pull the anh in random order
    
    // var $sibs  = $active.siblings();
    // var rndNum = Math.floor(Math.random() * $sibs.length );
    // var $next  = $( $sibs[ rndNum ] );


    $active.addClass('last-active');

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}

$(function() {
    setInterval( "slideSwitch()", 2000 );
});

</script>

</head>
<body>

	<!-- Header -->
    <?php include("./H.php");?>
    <!-- End Header -->
    <!-- Body -->
    <div id="body">
        <!-- Right Column -->
        <div id="r-col">
            <div id="main">
            	<div class="prd-block">
                	<div class="ordered">
                    <br><br>
                    	<h1 class="ordered-report">Quý khách đã đặt hàng thành công!</h1>
                        
                        <font size="3">• Hóa đơn mua hàng của Quý khách đã được chuyển đến Địa chỉ Email có trong phần Thông tin Khách hàng của chúng Tôi</font>
                        <br>
                        <font size="3">• Sản phẩm của Quý khách sẽ được chuyển đến Địa có trong phần Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.</font>
                        <br>
                        <font size="3">• Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng</font>
                        <br><br>
                        <font size="3"><p align="center">Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng Tôi!</p></font>
                        <br>
                    </div>
                    <div align="right">
                        <p id="return-home" class="btn btn-warning"><a href="./index.php">Quay về trang chủ</a></p>
                    </div>
                <br><br>
                </div>
            </div>
        </div>
        <!-- End Right Column -->
    	    
        <div id="brand"></div>
    </div>
    <!-- End Body -->
    <?php include("./F.php");?>

<!-- End Wrapper -->

</body>
</html>
