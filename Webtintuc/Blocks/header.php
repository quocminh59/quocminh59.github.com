 <?php  
require_once 'Classes/DBConfig.php';
require_once 'Classes/Functions-client.php';
 ?>
 <?php 
 	$date = getdate();
 	$ngay = $date['weekday'];
 	switch ($ngay) {
 		case 'Monday':
 			$ngay = "Thứ hai";
 			break;
 		case 'Tuesday':
 			$ngay = "Thứ ba";
 			break;
 		case 'Wednesday':
 			$ngay = "Thứ tư";
 			break;
 		case 'Thursday':
 			$ngay = "Thứ năm";
 			break;
 		case 'Friday':
 			$ngay = "Thứ sáu";
 			break;
 		case 'Saturday':
 			$ngay = "Thứ bảy";
 			break;
 		default:
 			$ngay = "Chủ nhật";
 			break;
 	}
 ?>
 <?php
 	if(isset($_POST['nuttk']) ){
 		if(!empty($_POST['search'])){
 			$k = changeTitle($_POST['search']);
			header("Location: http://localhost/Webtintuc/?p=timkiem&k=".$k."&pages=1");
 		}
	}
 ?>
 <div class="logoheader">
 	<a href="http://localhost/Webtintuc/"><img src="Images/logo.png"></a>
 </div>
 <div class="time"><?php echo $ngay.", ".date('d-m-Y') ?></div>
 <div class="timkiem">
 	<form method="POST" name="form-search" id="search">
 		<input type="text" id="thanhtk" placeholder="Tìm kiếm" name="search">
 		<button type="submit" name="nuttk" id="btnTK"><i class="fa fa-search"></i></button>
 	</form>
 </div>
 <div class="lienhe">Hotline: 0864.013.015 - 0977.456.112</div>
 <?php 
 	if(isset($_SESSION['idUser'])){
 		require 'Blocks/formHello.php';
 	}
 	else{
 		require 'Blocks/formLogin.php';
 	}	
?>






















