<div class="vungden"></div>
<div class="wrap-dangnhap">
	<div class="phantren">
		<div class="nutchuyendoi">
			<button class="chuyen dn">Đăng nhập</button>
			<button class="chuyen dk">Đăng ký</button>
			<button class="close set">X</button>
		</div>
	</div>
	<div class="phanduoi">
		<div class="phandn">
			<form  action="index.php" method="POST" name="form-login" class="form-login">
				<input type="text" name="tendangnhap" placeholder="Tên đăng nhập" class="txtthongtin">
				<?php echo $error_tendn; ?>
				<input type='password' name="matkhau" placeholder="Mật khẩu" class="txtthongtin">
				<?php echo $error_mk; ?>
				<input type="checkbox" name="chk-hienmk" value="Hiện mật khẩu" class="checkbox">
				<span> Hiện mật khẩu</span> <br>
				<input type="submit" name="btn-login" value="Đăng nhập" class="btn btn-outline-success">						
			</form>
		</div>
		<div class="phandk">
			<form action="" method="POST" name="form-dk" class="form-dk">
				<input type="text" name="hovaten" placeholder="Họ và tên" class="txtthongtin">
				<input type="text" name="tendk" placeholder="Tên đăng nhập" class="txtthongtin">
				<input type="password" name="password" placeholder="Mật khẩu" class="txtthongtin">
				<input type="submit" name="btn-dk" value="Đăng ký" class="btn btn-danger">
			</form>
		</div>
	</div>
</div>	