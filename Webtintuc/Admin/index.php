<?php 
SESSION_START();
require_once 'Classes/DBConfig.php';
require_once 'Classes/Functions.php';
if(isset($_GET['lt'])){
  $lt = $_GET['lt'];
}
else{
  $lt = "";
}
?>
<?php  
  if(isset($_SESSION['idUser']) && $_SESSION['idGroup'] == 1 ){
?>
<!DOCTYPE html>
<html lang="vn">
<!-- PHẦN THẺ HEAD -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Page Title</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="Vendor/css/bootstrap.css">
  <link rel="stylesheet" href="1.css">
  <!-- Link font -->
  <link rel="stylesheet" href="Font/css/all.css">
  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
  <script type="text/javascript" src="ckeditor/ckfinder/ckfinder.js"></script>
</head> <!-- KẾT THÚC THẺ HEAD -->
<!-- PHẦN THẺ BODY -->
<body>
  <div class="menu">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="http://localhost/Webtintuc/Admin/index.php">ADMINISTRATOR</a>
      <div class="back-client">
        <i class="fa fa-arrow-circle-left"></i>
        <a href="http://localhost/Webtintuc/">Vào trang web</a>
      </div>
      <div class="user">
        <h5> Xin chào! <?php echo $_SESSION['hoten']; ?> </h5>
      </div>
    </nav>
  </div>
  <div class="container-fluid">
    <div class="sidebar-left">
      <a href="./index.php"><i class="fa fa-home"></i> Trang chủ</a>
      <a href="./index.php?lt=quanlytheloai&a=danhmuctheloai&pages=1">Quản lý thể loại</a>
      <a href="./index.php?lt=quanlytintuc&a=danhmuctintuc&pages=1">Quản lý tin tức</a>
      <a href="./index.php?lt=quanlynguoidung&pages=1">Quản lý người dùng</a>
      <a href="./index.php?lt=quanlyquangcao">Quản lý quảng cáo</a>
    </div>
    <div class="sidebar-right">
      <?php  
        switch ($lt) {
          case 'quanlytheloai':
            require 'Blocks/quanlytheloai.php';
            break;
          case 'quanlytintuc':
            require 'Blocks/quanlytintuc.php';
            break;
          case 'quanlynguoidung':
            require 'Blocks/quanlynguoidung.php';
            break;
          case 'quanlyquangcao':
               require 'Blocks/quanlyquangcao.php';
               break;   
          default:
            require 'Blocks/trangchu.php';
            break;
        }
        
      ?>
    </div>
  </div>
  <!-----------------------------------Bootstrap Js---------------------------------------->
  <script type="text/javascript" src="jquery.min.js"></script>
  <script type="text/javascript" src="popper.min.js"></script>
  <script type="text/javascript" src="2.js"></script>
  <script type="text/javascript" src="Vendor/js/bootstrap.js"></script>
</body>
</html>
<?php  
}
else{
  ?>
    <script type="text/javascript">
      alert('Bạn không được phép truy nhập trang admin');
    </script>
  <?php

}
?>