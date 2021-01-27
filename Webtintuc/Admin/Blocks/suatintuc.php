<link rel="stylesheet" href="2.css">
<?php  
	if(isset($_GET['idbv'])){
		$query = "select * from baiviet where idBV=".$_GET['idbv']."";
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($result);
	}
?>
<?php  
	if(isset($_POST['update'])){
		$tieude = $_POST['tieude'];
		$tieudekhongdau = changeTitle($tieude);
		$matheloai = $_POST['matheloai'];
		$urlfile = $_POST['txtUrl'];
		$tomtat = $_POST['tomtat'];
		$ngayviet = date('Y-m-d');
		$content = $_POST['noidungbv'];
		$idUser = 1;
		$solanxem = 0;
		//truy van
		$queryTieude = 'update baiviet set tieude = "'.$tieude.'",tomtat = "'.$tomtat.'" where idBV = '.$_GET['idbv'].' ';
		$query = "update baiviet set tieudekhongdau = '".$tieudekhongdau."',urlHinh = '".$urlfile."',ngayviet = '".$ngayviet."',idUser = '".$idUser."',content = '".$content."',matheloai = '".$matheloai."',solanxem = '".$solanxem."' where idBV = ".$_GET['idbv']."   ";
		if(mysqli_query($conn, $query) && mysqli_query($conn, $queryTieude) )
	{
		?>
		<script type="text/javascript">
		alert('Cập nhật dữ liệu thành công');
		window.location.href='./index.php?lt=quanlytintuc&a=danhmuctintuc&pages=1';
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
		header("Location: ./index.php?lt=quanlytintuc&a=danhmuctintuc&pages=1");
	}
?>





<!-- Truyen du lieu tu bai viet vao cac form -->
<?php  
	if(isset($_GET['idbv'])){
		$query = 'Select * from baiviet where idBV = '.$_GET['idbv'].'';
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($result);
?>
<div class="head">Sửa bài viết</div>
<div class="themtintuc">
	<form method="POST" enctype="multipart/form-data">
		<p>Tiêu đề: <input type="text" name="tieude" value="<?php echo $row['tieude']; ?>"></p>
		<p>Mã thể loại: <select name="matheloai" >
			<?php  
				$sql = "SELECT * FROM theloai";
				$result = mysqli_query($conn,$sql);	
				while($row1=mysqli_fetch_assoc($result))
				{
					if($row1['matheloai'] == $row['matheloai'])
						echo "<option value = '".$row1['matheloai']."' selected>".$row1['tenTL']."</option>";
					else
						echo "<option value = '".$row1['matheloai']."'>".$row1['tenTL']."</option>";
				}
			?>
		</select></p>	
		<p class="upload">Ảnh trích dẫn:<input type="text" name="txtUrl" id="txtUrl" value="<?php echo $row['urlHinh']; ?>"><input type="button" name="btnChonFile" value="Browse" id="btnChonFile"></p>	
		<p>Tóm tắt: </p>
		<textarea name="tomtat" class="tomtat"><?php echo $row['tomtat']; ?></textarea>
		<div class="noidung">
			<h4>Nội dung: </h4>
			<textarea name="noidungbv" id="noidungbv" ><?php echo $row['content']; ?></textarea>
		</div>
		<script type="text/javascript">
			CKEDITOR.replace('noidungbv');
		</script>
		<br>
		<input type="submit" name="update" value="Cập nhật" class="btn btn-danger">
	</form>
</div>
<?php  
	}
?>