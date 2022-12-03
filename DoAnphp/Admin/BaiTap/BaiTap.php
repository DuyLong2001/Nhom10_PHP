
<nav>
  Bài tâp Form   :
  <?php
  for($i=1;$i<=8;$i++){
    echo '<a href="?page_layout=baitap&baiForm='.$i.'">Bài '.$i.'   | </a>';
  }
  ?>
  

</nav>
<nav>
  Bài tập Mảng chuổi :
  <?php
  for($i=1;$i<=7;$i++){
    echo '<a href="?page_layout=baitap&baiMC='.$i.'">Bài '.$i.'   | </a>';
  }
  ?>
</nav>
<nav>
Bài tập PHP SQL :
  <?php
  for($i=1;$i<=10;$i++){
    echo '<a href="?page_layout=baitap&baiSQL='.$i.'">Bài '.$i.'   | </a>';
  }
  ?>
</nav>

<?php
    if (!isset($_GET['baiForm'])) {
        $baiForm = "";
    } else {
        $baiForm = $_GET['baiForm'];
    }
    switch ($baiForm) {
        case "1": include("./BaiTap/btForm/bai1.php");
        break;
        case "2": include("./BaiTap/btForm/bai2.php");
        break;
        case "3": include("./BaiTap/btForm/bai2.php");
        break;
        case "4": include("./BaiTap/btForm/bai4.php");
        break;
        case "5": include("./BaiTap/btForm/bai5.php");
        break;
        case "6": include("./BaiTap/btForm/bai6.php");
        break;
        case "6a": include("./BaiTap/btForm/bai6a.php");
        break;
        case "7": include("./BaiTap/btForm/bai7.php");
        break;
        case "7a": include("./BaiTap/btForm/bai7a.php");
        break;
        case "8": include("./BaiTap/btForm/bai8/form.php");
        break;
        case "8a": include("./BaiTap/btForm/bai8/config.php");
        break;
       
    }

    /////////////////////////////////
    if (!isset($_GET['baiMC'])) {
      $baiMC = "";
  } else {
      $baiMC = $_GET['baiMC'];
  }
  switch ($baiMC) {
      case "1": include("./BaiTap/btMang_Chuoi/bai1.php");
      break;
      case "2": include("./BaiTap/btMang_Chuoi/bai2.php");
      break;
      case "3": include("./BaiTap/btMang_Chuoi/bai3.php");
      break;
      case "4": include("./BaiTap/btMang_Chuoi/bai4.php");
      break;
      case "5": include("./BaiTap/btMang_Chuoi/bai5.php");
      break;
      case "6": include("./BaiTap/btMang_Chuoi/bai6.php");
      break;
      case "7": include("./BaiTap/btMang_Chuoi/bai7.php");
      break;
      
     
  }
  if (!isset($_GET['baiSQL'])) {
    $baiSQL = "";
} else {
    $baiSQL = $_GET['baiSQL'];
}
switch ($baiSQL) {
    case "1": include("./BaiTap/btSql/baitap/2.1index.php");
    break;
    case "2": include("./BaiTap/btSql/baitap/2.2index.php");
    break;
    case "3": include("./BaiTap/btSql/baitap/2.3index.php");
    break;
    case "4": include("./BaiTap/btSql/baitap/2.4index.php");
    break;
    case "5": include("./BaiTap/btSql/baitap/2.5index.php");
    break;
    case "6": include("./BaiTap/btSql/baitap/2.6index.php");
    break;
    case "7": include("./BaiTap/btSql/baitap/2.7index.php");
    break;
    case "7a": include("./BaiTap/btSql/baitap/2.7detail.php");
    break;
    case "8": include("./BaiTap/btSql/baitap/2.8index.php");
    break;
    case "9": include("./BaiTap/btSql/baitap/2.9index.php");
    break;
    case "10": include("./BaiTap/btSql/baitap/2.10index.php");
    break;


    
   
}
    ?>