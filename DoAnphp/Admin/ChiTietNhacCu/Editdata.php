<?php
    require('./connect.php');

    if(isset($_POST['submitedit']))
    {   
        $id = $_POST['MaLoaiNC'];
        
        $tenlnc = $_POST['TenLoaiNC'];


        $query = "UPDATE loai_nhac_cu SET TenLoaiNC='$tenlnc' WHERE MaLoaiNC=$id";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:./index.php?page_layout=chitietnhaccu");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }


    ///////////////////////////////////////////////////////////////////////////////

    if(isset($_POST['insertlnc']))
{
    $loainc = $_POST['TenLoaiNC'];


    $query = "INSERT INTO `loai_nhac_cu`(`MaLoaiNC`, `TenLoaiNC`) VALUES ('','$loainc')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: ./index.php?page_layout=chitietnhaccu');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

/////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['inserthsx']))
{
    $tenhsx = $_POST['tenhsx'];
    $diachi = $_POST['dc'];
    $sdt = $_POST['sdt'];


    $query = "INSERT INTO `hang_san_xuat`(`MaHSX`, `TenHSX`, `DiaChi`, `SDT`) VALUES ('','$tenhsx','$diachi','$sdt')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: ./index.php?page_layout=chitietnhaccu');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

//////////////////////////////////////////////

if(isset($_POST['insertncc']))
{
    $tenncc = $_POST['tenncc'];
    $diachi = $_POST['dcncc'];
    $sdt = $_POST['sdtncc'];
    $email = $_POST['emailncc'];


    $query = "INSERT INTO `nha_cung_cap`(`MaNCC`, `TenNCC`, `SDT`, `DiaChi`, `Email`) 
    VALUES ('','$tenncc','$sdt','$diachi','$email')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: ./index.php?page_layout=chitietnhaccu');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}
?>
