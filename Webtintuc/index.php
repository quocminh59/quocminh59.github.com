<?php 
SESSION_START();
require_once 'Classes/DBConfig.php';
require_once 'Admin/Classes/Functions.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');
if(isset($_GET['p'])){
	$p = $_GET['p'];
}
else{
	$p = "";
}
?>
<!-- Dang nhap -->
<?php
$error_tendn = "";
$error_mk = "";  
if(isset($_POST['btn-login'])){
	$tendangnhap = $_POST['tendangnhap'];
	$matkhau = $_POST['matkhau'];
	if(trim($tendangnhap) == ""){
		$error_tendn = "Bạn chưa nhập tên đăng nhập";
	}
	elseif(trim($matkhau) == ""){
		$error_mk = "Bạn chưa nhập mật khẩu";
	}
	else{
		$matkhau = md5($matkhau);
		$query = "select * from users where username ='".$tendangnhap."' and password = '".$matkhau."' ";
		$result = mysqli_query($conn,$query);
		if(mysqli_num_rows($result) == 0){
			$error_mk = "Sai tên đăng nhập hoặc mật khẩu";
		}
		else{
			$row = mysqli_fetch_array($result);
			$_SESSION['idUser'] = $row['idUser'];
			$_SESSION['tendn'] = $row['username'];
			$_SESSION['hoten'] = $row['hoten'];
			$_SESSION['idGroup'] = $row['idGroup'];
			$_SESSION['urlAnh'] = $row['urlAnh'];
		}
	}
}
?>
<?php  
if(isset($_POST['btn-dk'])){
	//Kiem tra username co bi trung khong
	$Flag = 1;
	$queryCheck = "select * from users";
	$resultCheck = mysqli_query($conn,$queryCheck);
	while ($rowCk = mysqli_fetch_array($resultCheck)) {
		if($rowCk['username'] == $_POST['tendk'] ){
			?>
				<script>
					alert("Tên đăng nhập đã tồn tại");
				</script>
			<?php
			$Flag = 0;
			break;
		}
	}
	if($Flag == 1 && !empty($_POST['tendk'])){
		$hovaten = $_POST['hovaten'];
		$tendangnhap = $_POST['tendk'];
		$password = md5($_POST['password']);
		$idGroup = 0;
		$ngaydangki = date('Y-m-d');
		//truy van
		$query = 'insert into users(hoten,username,password,idGroup,ngaydangki) values("'.$hovaten.'","'.$tendangnhap.'","'.$password.'","'.$idGroup.'","'.$ngaydangki.'")';
		if(mysqli_query($conn, $query))
		{
			?>
			<script type="text/javascript">
				alert('Đăng ký tài khoản thành công ');
				window.location.href='./index.php';
			</script>
			<?php
		}
		else
		{
			?>
			<script type="text/javascript">
				alert('Đăng ký tài khoản thất bại');
			</script>
			<?php
		}
	}
}
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
	<link rel="stylesheet" type="text/css" href="Bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="CSS/layout.css">
	<link rel="stylesheet" href="CSS/hieuung.css">
	<!-- Link font -->
	<link rel="stylesheet" href="Font/css/all.css">
	<script type="text/javascript" src="Admin/ckeditor/ckfinder/ckfinder.js"></script>

</head> <!-- KẾT THÚC THẺ HEAD -->
<!-- PHẦN THẺ BODY -->
<body>
	<div class="container-web">
		<div class="main">
			<div class="header">
				<!-- require header.php -->
				<?php  require 'Blocks/header.php';?>
			</div>
			<div class="menu">
				<!-- require menu.php -->
				<?php require 'Blocks/menu.php'; ?>
			</div>
			
			<div class="loaitrang">
				<!-- Loai trang se duoc hien thi -->
				<?php  
				switch ($p) {
					case 'chitiettin':
					require 'Pages/chitiettin.php';
					break;
					case 'loaitin':
					require 'Pages/loaitin.php';
					break;
					case 'timkiem':
					require 'Pages/timkiem.php';
					break;
					case 'chitiettaikhoan':
					require 'Pages/chitiettaikhoan.php';
					break;
					default:
					require 'Pages/trangchu.php';
				}
				?>
			</div>
			<div class="footer">
				<!-- require footer.php -->
				<?php require 'Blocks/footer.php'; ?>
			</div>

		</div>
		<div class="vungdangnhap">
			<!-- require dangnhap.php -->
			<?php require 'Blocks/vungdangnhap.php'; ?>
		</div>
	</div>
	
	


	<!-----------------------------------Bootstrap Js---------------------------------------->
	<script type="text/javascript" src="Lib/jquery.min.js"></script>
	<script type="text/javascript" src="Lib/popper.min.js"></script>
	<?php require 'Lib/script.php'; ?>
	<script type="text/javascript" src="Bootstrap/js/bootstrap.js"></script>

</body>
</html>