<?php
        function inchuoi($cu){
            $cu=trim($cu);
            $b=str_split($cu);
            $dem=0;
        for($i=0;$i<count($b);$i++){
            echo $b[$i];
            if($b[$i]==" ")
            {
                $dem++;
                if($dem==10){
                    echo '<br>';
                    $dem=0;

                }
            }
        }
            
        }
?>
<!------------------------------------------------------------------------------------------------------->
<script>
  function xoa(){
    var conf=confirm("Bạn có chắc chắn muốn xóa");
    return conf;
  }
</script>

<!------------------------------------------------------------------------------------------------------->



    <script>
        $(document).ready(function () {

            $('#datatableid').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search Your Data",
                }
            });

        });
    </script>

<!--------------------------------------------------------------------------------->


<?php
if (isset($_POST['updatedata'])) {
  $id = $_POST['MaGiay'];
  $TenGiay = $_POST['TenGiay'];
  $GiaBan = $_POST['GiaBan'];
  $MoTa = $_POST['MoTa'];
  // $NgayCapNhat = $_POST['NgayCapNhat'];
  $SoLuongTon = $_POST['SoLuongTon'];
  $MaLG = $_POST['MaLG'];
  $MaTH = $_POST['MaTH'];
  $MaNCC = $_POST['MaNCC'];

  $GiaBanCu = 0;
  if (!empty($_POST["GiaBanCu"])) {
    $GiaBanCu = $_POST['GiaBanCu'];
  }
  $imgname = $_FILES['AnhBia']['name'];
  $extension = pathinfo($imgname, PATHINFO_EXTENSION);
  $randomno = rand(0, 100000);
  $rename = 'Image' . date('Ymd') . $randomno;
  $newname = $rename . '.' . $extension;
  $filename = $_FILES['AnhBia']['tmp_name'];
  $path = "../Images/ImgProducts/" . $newname;
  $AnhBiaCu = $_POST['AnhBiaCu'];
  $path1 = "../Images/ImgProducts/". $AnhBiaCu;
  $fileSize = $_FILES["AnhBia"]["size"];
  if ($imgname != "") {
    if ($fileSize > 100000000) {
      echo
      "
          <script>
            alert('Kích thước quá qui định');
          </script>
          ";
    } else {
      if (move_uploaded_file($filename, $path)) {
        if (is_numeric($SoLuongTon) and is_numeric($GiaBan) and is_numeric($GiaBanCu) ) {
          $query = "UPDATE Giay SET TenGiay='$TenGiay',GiaBan =$GiaBan,MoTa ='$MoTa',AnhBia ='$newname',NgayCapNhat = now(),SoLuongTon =$SoLuongTon,MaLG =$MaLG,MaTH =$MaTH ,MaNCC =$MaNCC ,GiaBanCu =$GiaBanCu   WHERE MaGiay='$id'  ";
          mysqli_query($conn, $query);
          
          unlink($path1);
        } else {
          if (!is_numeric($GiaBan)) {
            $loi = "Vui lòng nhập dạng số !";
          }
          if (!is_numeric($SoLuongTon)) {
            $loi2 = "Vui lòng nhập dạng số !";
          }
          if (!is_numeric($GiaBanCu)) {
            $loi3 = "Vui lòng nhập dạng số !";
          }
          echo
          "
          <script>
            alert('Dữ liệu chưa được sửa, vui lòng kiểm tra lại các thông tin');
          </script>
          ";
        }
      }
    }
  } else {
    if (is_numeric($SoLuongTon) and is_numeric($GiaBan) and is_numeric($GiaBanCu)) {
    $query = "UPDATE Giay SET TenGiay='$TenGiay',GiaBan =$GiaBan,MoTa ='$MoTa',NgayCapNhat = now(),SoLuongTon =$SoLuongTon,MaLG =$MaLG,MaTH =$MaTH ,MaNCC =$MaNCC  ,GiaBanCu =$GiaBanCu   WHERE MaGiay='$id'  ";
    mysqli_query($conn, $query);
    ;}
    else {
      if (!is_numeric($GiaBan)) {
        $loi = "Vui lòng nhập dạng số !";
      }
      if (!is_numeric($SoLuongTon)) {
        $loi2 = "Vui lòng nhập dạng số !";
      }
      if (!is_numeric($GiaBanCu)) {
        $loi3 = "Vui lòng nhập dạng số !";
      }
      echo
      "
      <script>
        alert('Dữ liệu chưa được sửa, vui lòng kiểm tra lại các thông tin');
      </script>
      ";
    }
  }
}
?>