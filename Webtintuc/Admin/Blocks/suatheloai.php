<link rel="stylesheet" href="2.css">
<?php  
require_once 'Classes/DBConfig.php';
require_once 'Classes/Functions.php';
?>
<?php  
	if(isset($_GET['idtl'])){
		$query = "select * from theloai where idTL=".$_GET['idtl']."";
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($result);
	}
?>
<?php  
	if(isset($_POST['btn-update'])){
		$matl = $_POST['txtMTL'];
		$tentl = $_POST['txtTenTL'];
		$tenkhongdau = changeTitle($tentl);
		$anhien = $_POST['select-show'];
		//truy van
		$query = "update theloai set matheloai = '".$matl."', tenTL = '".$tentl."', tenkhongdau = '".$tenkhongdau."', anhien = '".$anhien."' where idTL = ".$_GET["idtl"]." ";
		if(mysqli_query($conn, $query))
	{
		?>
		<script type="text/javascript">
		alert('Cập nhật dữ liệu thành công');
		window.location.href='./index.php?lt=quanlytheloai&a=danhmuctheloai&pages=1';
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
		header("Location: ./index.php?lt=quanlytheloai&a=danhmuctheloai&pages=1");
	}
?>
<div id="body">
	<div id="content">
		<form method="post" class="special">
			<table align="center">
				<tr>
					<td align="center">Sửa thể loại</td>
				</tr>
				<tr>
					<td><input type="text" name="txtMTL" placeholder="Mã thể loại" value="<?php echo $row['matheloai']; ?>" /></td>
				</tr>
				<tr>
					<td><input type="text" name="txtTenTL" placeholder="Tên thể loại" value="<?php  echo $row['tenTL']; ?>" /></td>
				</tr>
				<tr>
					<td>
						<label>Chọn: </label>
						<select name="select-show" >
							<option value="0">0-Ẩn</option>
							<option value="1">1-Hiện</option>				
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<button type="submit" name="btn-update"><strong>UPDATE</strong></button>
						<button type="submit" name="btn-cancel"><strong>Cancel</strong></button>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>