<link rel="stylesheet" href="CSS/layout-pages.css">
<?php  
	if(isset($_GET['c'])){
	$p = $_GET['c'];
}
else{
	$c = "";
}
?>
<?php  
	if(isset($_GET['iduser'])){
		$query = "select * from users where idUser =".$_GET['iduser'];
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($result);
		$date = date('d/m/Y',strtotime($row['ngaydangki']));
	}
?>
<div class="chitiettaikhoan">
	<div class="cttk-left">
		<div class="anhdaidien">
			<div class="circle"><img src="<?php echo $row['urlAnh'] ?>" alt="" class="formanh"></div>
		</div>
		<div class="time-start">
			<p id="line">Tham gia từ</p>
			<p><?php echo $date; ?></p>
		</div>
		<div class="chucnang">
			<div class="chucnang-child"><a href="http://localhost/Webtintuc/index.php?p=chitiettaikhoan&c=taikhoancuatoi&iduser=<?php echo $_SESSION['idUser']; ?>">Tài khoản của tôi</a></div>
			<div class="chucnang-child"><a href="http://localhost/Webtintuc/index.php?p=chitiettaikhoan&c=capnhattaikhoan&iduser=<?php echo $_SESSION['idUser']; ?>">Cập nhật tài khoản</a></div>
			<div class="chucnang-child"><a href="http://localhost/Webtintuc/index.php?p=chitiettaikhoan&c=doimatkhau&iduser=<?php echo $_SESSION['idUser']; ?>">Đổi mật khẩu</a></div>
			<div class="chucnang-child"><form action="Blocks/formLogout.php"><input type="submit" value="Thoát" name="thoat" class="btn btn-light khac"></form></div>
		</div>
	</div>
	<?php  
		if($_GET['c'] == "capnhattaikhoan"){	
	?>
	<div class="cttk-right">
		<div class="myaccount">Cập nhật tài khoản</div>
		<span>Ảnh đại diện</span><br>
		<form method="POST" id="form-cttk" enctype="multipart/form-data">
			<div class="upload-images">
				<input type="file" name="ChonFile" id="btnChonFile" value="Browse">
			</div>
			<table width="800" border="1">
				<p class="col-tk">Tài khoản</p>
				<tr>
					<td>Email: <input  type="email" name="email" style="border:none; width: 300px; outline: none;" value="<?php echo $row['email']; ?>"></td>
				</tr>
				<tr>
					<td>Điện thoại <input type="text" name="sodienthoai" value="<?php echo $row['sodienthoai']; ?>"></td>
				</tr>
			</table>
			<table width="800" border="1">
				<p class="col-tk">Thông tin cá nhân</p>
				<tr>
					<td>Họ và tên <input type="text" name="hoten" value="<?php echo $row['hoten']; ?>"></td>
				</tr>
				<tr>
					<td>Ngày sinh 
						

						<input id="Ngay"  type="date" name="Ngay" value="<?php echo $row['ngaysinh']; ?>">
						
					</td>
				</tr>
				<tr>
					<td>Giới tính 
						<select name="sex" id="choose-sex">
								<option value="1">Nam</option>;
								<option value="0">Nữ</option>;
							
							
						</select>
					</td>
				</tr>
				<tr>
					<td>Địa chỉ <input type="text" name="diachi" value="<?php echo $row['diachi']; ?>"></td>
				</tr>
			</table>
			<input type="submit" class="btn btn-success" value="Lưu" name="save">
		</form>
	</div>
	<!-- <script src="Javascript/hieuung-upload.js"></script> -->
	<?php  
		}
		if($_GET['c'] == "doimatkhau"){
	?>
		<div class="cttk-right">
			<form method="POST" id="form-cttk">
				<table width="800" border="1">
					<p class="col-tk">Đổi mật khẩu</p>
					<tr>
						<td>Mật khẩu cũ: <input type="password" name="mkcu" class="ip-mk"></td>
					</tr>
					<tr>
						<td>Mật khẩu mới:  <input type="password" name="mkmoi" class="ip-mk"></td>
					</tr>
					<tr>
						<td>Nhập lại mật khẩu mới: <input type="password" name="mklaplai" class="ip-mk"></td>
					</tr>
					<tr><td><input type="submit" value="Xác nhận" name="xacnhan" class="btn btn-primary"></td></tr>
				</table>
			</form>
		</div>
	<?php  
		}
		if($_GET['c'] == "taikhoancuatoi"){
	?>
		<div class="cttk-right">
		<div class="myaccount">Tài khoản của tôi</div>
		<form method="POST" id="form-cttk">
			<table width="800" border="1">
				<p class="col-tk">Tài khoản</p>
				<tr>
					<td>Email:  <input  type="email" name="email" style="border:none; width: 300px; outline: none;" value="<?php echo $row['email']; ?>"></td>
				</tr>
				<tr>
					<td>Điện thoại: <input type="text" name="sodienthoai" value="<?php echo $row['sodienthoai']; ?>"></td>
				</tr>
			</table>
			<table width="800" border="1">
				<p class="col-tk">Thông tin cá nhân</p>
				<tr>
					<td>Họ và tên: <input type="text" name="hoten" value="<?php echo $row['hoten']; ?>"></td>
				</tr>
				<tr>
					<td>Ngày sinh: <input type="text" name="Ngay" value="<?php echo date("d-m-Y",strtotime($row['ngaysinh'])); ?>"></td>
				</tr>
				<tr>
					<td>Giới tính: <input type="text" name="gioitinh" value="<?php if($row['gioitinh'] == 1){echo 'Nam';}else echo 'Nữ';?>"></td>
				</tr>
				<tr>
					<td>Địa chỉ: <input type="text" name="diachi" value="<?php echo $row['diachi']; ?>"></td>
				</tr>
			</table>
		</form>
	</div>
	<?php
		}  
	?>
</div>
<!-- Xu li nut luu tai khoan -->
<?php  
	if(isset($_POST['save'])){
		$hoten = $_POST['hoten'];
		$gioitinh = $_POST['sex'];
		$ngaysinh = $_POST['Ngay'];
		$diachi = $_POST['diachi'];
		$sodienthoai = $_POST['sodienthoai'];
		$email = $_POST['email'];
		$query1 = 'update users set hoten = "'.$hoten.'", gioitinh = "'.$gioitinh.'", ngaysinh = "'.$ngaysinh.'", diachi = "'.$diachi.'", sodienthoai = "'.$sodienthoai.'", email = "'.$email.'"   where idUser = '.$_GET['iduser'];
		if(mysqli_query($conn,$query1)){
			?>
				<script>
					alert("Thay đổi thông tin tài khoản thành công");
					window.location.href ="http://localhost/Webtintuc/index.php?p=chitiettaikhoan&c=taikhoancuatoi&iduser="+<?php echo $_SESSION['idUser']; ?>;
				</script>

			<?php
		}
		else{
			?>
				<script>
					alert("Thay đổi thông tin tài khoản thất bại");
				</script>
			<?php
		}
		//xu li file
		$target_dir = "Upload/images/anhdaidien/";
		$target_file = $target_dir . basename($_FILES["ChonFile"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image	
		$check = getimagesize($_FILES["ChonFile"]["tmp_name"]);
		if($check !== false) {
			$uploadOk = 1;
		} else {
			$uploadOk = 0;
		}
		// Check if file already exists
		if (file_exists($target_file)) {
			$uploadOk = 0;
		}
		// Check file size
		if ($_FILES["ChonFile"]["size"] > 5000000) {
			$uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			$uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 1) {
			move_uploaded_file($_FILES["ChonFile"]["tmp_name"], $target_file);
			$query = 'update users set urlAnh = "'.$target_file.'" where iduser = '.$_GET['iduser'];
			mysqli_query($conn,$query);	
				
		}
		else{
			?>
				<script>
					alert("Upload ảnh thất bại");
				</script>
			<?php
		}
	}
?>
<?php  
	if(isset($_POST['xacnhan'])){
		if(md5($_POST['mkcu']) != $row['password']){
			?>
			 <script>
			 	alert("Nhập mật khẩu cũ sai");
			 </script>
			<?php
		}
		else if($_POST['mkmoi'] != $_POST['mklaplai']){
			?>
			 <script>
			 	alert("Nhập lại mật khẩu mới không trùng với nhau");
			 </script>
			<?php
		}
		else{
			$mk = md5($_POST['mkmoi']);
			$query2 = 'update users set password = "'.$mk.'" where idUser ='.$_GET['iduser'];
			if(mysqli_query($conn,$query2)){
			?>
				<script>
					alert("Thay đổi mật khẩu thành công");
				</script>
			<?php
		}
		else{
			?>
				<script>
					alert("Thay đổi mật khẩu thất bại");
				</script>
			<?php
		}
		}
	}
?>
<!-- xu ly file -->