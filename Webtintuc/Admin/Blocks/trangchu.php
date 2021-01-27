<link rel="stylesheet" href="2.css">
<div class="trangchu">
	<div class="head-home">THỐNG KÊ</div>
	<div class="alert alert-danger" role="alert">
		<p class="chude">BÀI VIẾT</p>
		<?php  
			$query = "select count(*) as tong from baiviet";
			$result = mysqli_query($conn,$query);
			$row = mysqli_fetch_assoc($result);
		?>
		<div class="number"><?php echo $row['tong']; ?></div>
	</div>
	<div class="alert alert-primary" role="alert">
		<p class="chude">THỂ LOẠI</p>
		<?php  
			$query = "select count(*) as tong from theloai";
			$result = mysqli_query($conn,$query);
			$row = mysqli_fetch_assoc($result);
		?>
		<div class="number"><?php echo $row['tong']; ?></div>
	</div>
	<div class="alert alert-success" role="alert">
		<p class="chude">NGƯỜI DÙNG</p>
		<?php  
			$query = "select count(*) as tong from users";
			$result = mysqli_query($conn,$query);
			$row = mysqli_fetch_assoc($result);
		?>
		<div class="number"><?php echo $row['tong']; ?></div>
	</div>
	<div class="alert alert-dark" role="alert">
		<p class="chude">QUẢNG CÁO</p>
		<?php  
			$query = "select count(*) as tong from quangcao";
			$result = mysqli_query($conn,$query);
			$row = mysqli_fetch_assoc($result);
		?>
		<div class="number"><?php echo $row['tong']; ?></div>
	</div>
</div>