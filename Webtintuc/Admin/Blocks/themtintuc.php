<script type="text/javascript" src="1.js"></script>
<?php   
require_once 'Classes/DBConfig.php';
require_once 'Classes/Functions.php';

?>
<?php  
 $urlfile = "";
 if(isset($_POST['insert'])){
 	$tieudetemp = "temp";
 	$tomtattemp = "temp";
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
 	$query = "insert into baiviet(tieude,tieudekhongdau,tomtat,urlHinh,ngayviet,idUser,content,matheloai,solanxem) values('".$tieudetemp."','".$tieudekhongdau."','".$tomtattemp."','".$urlfile."','".$ngayviet."','".$idUser."','".$content."','".$matheloai."','".$solanxem."')";
 	$query1 = 'update baiviet set tieude = "'.$tieude.'", tomtat = "'.$tomtat.'" where tieudekhongdau = "'.$tieudekhongdau.'"  ';
		if(mysqli_query($conn, $query) && mysqli_query($conn, $query1))
		{
			?>
			<script type="text/javascript">
				alert('Thêm bài viết thành công ');
				window.location.href='./index.php?lt=quanlytintuc&a=danhmuctintuc&pages=1';
			</script>
			<?php
		}
		else
		{
			?>
			<script type="text/javascript">
				alert('Thêm bài viết thất bại');
			</script>
			<?php
		}
 }

 
?>
<link rel="stylesheet" href="2.css">
<div class="head">Thêm bài viết</div>
<div class="themtintuc">
	<form method="POST" enctype="multipart/form-data">
		<p>Tiêu đề: <input type="text" name="tieude" ></p>
		<p>Mã thể loại: <select name="matheloai" id="">
			<?php  
				$sql = "SELECT * FROM theloai";
				$result = mysqli_query($conn,$sql);
				
				while($row=mysqli_fetch_assoc($result))
				{
					echo "<option value = '".$row['matheloai']."'>".$row['tenTL']."</option>";
				}
			?>
		</select></p>	
		<p class="upload">Ảnh trích dẫn:<input type="text" name="txtUrl" id="txtUrl"><input type="button" name="btnChonFile" value="Browse" id="btnChonFile"></p>	
		<p>Tóm tắt: </p>
		<textarea name="tomtat" class="tomtat"></textarea>
		<div class="noidung">
			<h4>Nội dung: </h4>
			<textarea name="noidungbv" id="noidungbv" ></textarea>
		</div>
		<script type="text/javascript">
			CKEDITOR.replace('noidungbv');
		</script>
		<script>
			function laybaiviet(){
				var temp = CKEDITOR.instances['noidungbv'].getData();
				document.cookie = "data ="+temp+";";
			}
		</script>
		<br>
		<input type="submit" name="insert" value="Chap nhan" class="btn btn-success">

	</form>
</div>
