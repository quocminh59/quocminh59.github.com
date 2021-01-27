<script type="text/javascript" src="1.js"></script>
<?php   
require_once 'Classes/DBConfig.php';
require_once 'Classes/Functions.php';

?>
<?php  
 if(isset($_POST['insert'])){
 	$url = $_POST['txtUrl'];
 	$mota = $_POST['mota'];
 	$vitri = $_POST['vitri'];
 	$anhien = $_POST['hienthi'];
 	//truy van
 	$query = "insert into quangcao(mota,urlQC,vitri,anhien) values('".$mota."','".$url."',".$vitri.",".$anhien.")";
		if(mysqli_query($conn, $query))
		{
			?>
			<script type="text/javascript">
				alert('Thêm quảng cáo thành công ');
				window.location.href='./index.php?lt=quanlyquangcao&a=danhmucquangcao';
			</script>
			<?php
		}
		else
		{
			?>
			<script type="text/javascript">
				alert('Thêm quảng cáo thất bại');
			</script>
			<?php
		}
 }

 
?>
<link rel="stylesheet" href="2.css">
<div class="head">Thêm quảng cáo</div>
<div class="themtintuc">
	<form method="POST" enctype="multipart/form-data" id="formqc">	
		<p class="uploadqc">Chọn hình quảng cáo:<input type="text" name="txtUrl" id="txtUrl"><input type="button" name="btnChonFile" value="Browse" id="btnChonFile"></p>	
		<p id="ndqc">Mô tả:  <input type="text" name="mota" ></p>
		<p id="ndqc">Vị trí: <select name="vitri" id="vitri">
			<option value="1">Trang chủ</option>
			<option value="2">Trang thể loại</option>
			<option value="3">Bài viết</option>
		</select></p>
		<p id="ndqc">Ẩn hiện: <select name="hienthi" id="hienthi">
			<option value="0">Ẩn</option>
			<option value="1">Hiện</option>
		</select></p>
		<input type="submit" name="insert" value="Save" class="btn btn-danger">

	</form>
</div>
