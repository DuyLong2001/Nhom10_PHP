<?php
    ob_start();


    if($_SESSION['Quyen']==true){
    if(isset($_GET['page_layout'])){
            
        switch($_GET['page_layout']){
          case 'home':include_once'Home.php';
            break;
            
            case 'nhanvien':include_once'./NhanVien/NhanVien.php';
            break;
            case 'createnv':include_once'./NhanVien/CreateNV.php';
            break;
            case 'editnv':include_once'./NhanVien/EditNV.php';
            break;

            case 'khachhang':include_once'./KhachHang/KhachHang.php';
            break;
            case 'createkh':include_once'./KhachHang/Createkh.php';
            break;
            case 'editkh':include_once'./KhachHang/EditKH.php';
            break;

            case 'nhaccu':include_once'./NhacCu/NhacCu.php';
            break;
            case 'createnc':include_once'./NhacCu/CreateNC.php';
            break;
            case 'editnc':include_once'./NhacCu/EditNC.php';
            break;
            case 'detailnc':include_once'./NhacCu/DetailNC.php';
            break;

            case 'invoice':include'./HoaDon/Invoice.php';
            break;
            case 'invoiceunpaid':include'./HoaDon/Invoice_unpaid.php';
            break;
            case 'invoicepaid':include'./HoaDon/Invoice_paid.php';
            break;

            case 'baitap':include'./BaiTap/BaiTap.php';
            break;

            case 'lnc':include'./ChiTietNhacCu/LoaiNC.php';
            break;
            case 'ncc':include'./ChiTietNhacCu/NCC.php';
            break;
            case 'hsx':include'./ChiTietNhacCu/HSX.php';
            break;

            case 'ttcn':include'./Thongtincanhan.php';
            break;
            
        }
      }
      else{
        include_once 'Home.php';
      }
    }else{
        if(isset($_GET['page_layout'])){
            
            switch($_GET['page_layout']){
              case 'home':include_once'Home.php';
                break;
                case 'khachhang':include_once'./KhachHang/KhachHang.php';
                break;
                case 'createkh':include_once'./KhachHang/Createkh.php';
                break;
                case 'editkh':include_once'./KhachHang/EditKH.php';
                break;
    
                case 'nhaccu':include_once'./NhacCu/NhacCu.php';
                break;
                case 'createnc':include_once'./NhacCu/CreateNC.php';
                break;
                case 'editnc':include_once'./NhacCu/EditNC.php';
                break;
                case 'detailnc':include_once'./NhacCu/DetailNC.php';
                break;
    
                case 'invoice':include'./HoaDon/Invoice.php';
                break;
                case 'invoiceunpaid':include'./HoaDon/Invoice_unpaid.php';
                break;
                case 'invoicepaid':include'./HoaDon/Invoice_paid.php';
                break;
    
                case 'baitap':include'./BaiTap/BaiTap.php';
                break;
    
                case 'lnc':include'./ChiTietNhacCu/LoaiNC.php';
                break;
                case 'ncc':include'./ChiTietNhacCu/NCC.php';
                break;
                case 'hsx':include'./ChiTietNhacCu/HSX.php';
                break;
    
                case 'ttcn':include'./Thongtincanhan.php';
                break;
                
            }
          }
          else{
            include_once 'Home.php';
          }
    }


?>