<link rel="stylesheet" href="2.css">
<?php  
	if(isset($_GET['idqc'])){
		$query = "select * from quangcao where idQC=".$_GET['idqc']."";
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($result);
	}
?>
<?php  
	if(isset($_POST['update'])){
		$url = $_POST['txtUrl'];
		$mota = $_POST['mota'];
		$vitri = $_POST['vitri'];
		$anhien = $_POST['hienthi'];
		//truy van
		$query = 'update quangcao set mota = "'.$mota.'",urlQC = "'.$url.'",vitri = '.$vitri.',anhien = '.$anhien.' where idQC = '.$_GET['idqc'].' ';
		
		if(mysqli_query($conn, $query))
	{
		?>
		<script type="text/javascript">
		alert('Cập nhật dữ liệu thành công');
		window.location.href='./index.php?lt=quanlyquangcao&a=danhmucquangcao';
		</script>
		<?php
	}
	else
	{
		
		?>
		<script type="text/javascript">
		alert('Lỗi cập nhật dữ liệu');
		</script>
		<?php
	}
	}
	if(isset($_POST['btn-cancel'])){
		header("Location: ./index.php?lt=quanlyquangcao&a=danhmucquangcao");
	}
?>





<!-- Truyen du lieu tu bai viet vao cac form -->
<?php  
	if(isset($_GET['idqc'])){
		$query = 'Select * from quangcao where idQC = '.$_GET['idqc'].'';
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($result);
?>
<div class="head">Sửa quảng cáo</div>
<div class="themtintuc">
	<form method="POST" enctype="multipart/form-data">
		<form method="POST" enctype="multipart/form-data" id="formqc">	
		<p class="uploadqc">Chọn hình quảng cáo:<input type="text" name="txtUrl" id="txtUrl" value="<?php echo $row['urlQC']; ?>"><input type="button" name="btnChonFile" value="Browse" id="btnChonFile"></p>	
		<p id="ndqc">Mô tả:  <input type="text" name="mota" value="<?php echo $row['mota']; ?>"></p>
		<p id="ndqc">Vị trí: <select name="vitri" id="vitri">
			<option value="1">Trang chủ</option>
			<option value="2">Trang thể loại</option>
			<option value="3">Bài viết</option>
		</select></p>
		<p id="ndqc">Ẩn hiện: <select name="hienthi" id="hienthi">
			<option value="0">Ẩn</option>
			<option value="1">Hiện</option>
		</select></p>
		<input type="submit" name="update" value="Save" class="btn btn-danger">
	</form>
	</form>
</div>
<?php  
	}
?>