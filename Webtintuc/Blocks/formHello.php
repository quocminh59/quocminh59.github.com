<?php  
	$name = explode(' ', $_SESSION['hoten']);
	$last = count($name)-1;
?>
<?php 
	$query = "select * from users where idUser =".$_SESSION['idUser'];
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_assoc($result);
?>
<div class="hello">
	<div class="images-user"></div>
	<img src="<?php echo $row['urlAnh']; ?>" class="imgupload">
	<div class="username"><?php echo $name[0].' '.$name[$last]; ?></div>
	<div class="drop">
		<div class="tamgiac"><i class="fa fa-caret-down"></i></div>
		<div class="list-group">
			<li class="list-group-item"><a href="http://localhost/Webtintuc/index.php?p=chitiettaikhoan&c=taikhoancuatoi&iduser=<?php echo $_SESSION['idUser']; ?>">Thông tin tài khoản</a></li>
			<?php  
			if($_SESSION['idGroup'] == 1){
			?>
			<li class="list-group-item"><a href="http://localhost/Webtintuc/Admin/index.php">Vào trang quản lý</a></li>
			<?php  
			}
			?>
			<li class="list-group-item"><form action="Blocks/formLogout.php" method="POST"><input type="submit" value="Thoát" name="thoat" class="btn btn-light"></form></li>
		</div> 
	</div>
</div>