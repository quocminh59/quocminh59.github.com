<link rel="stylesheet" href="2.css">
<?php  
require_once 'Classes/DBConfig.php';
require_once 'Classes/Functions.php';
?>
<?php  
	if(isset($_POST['btn-save'])){
		$matl = $_POST['txtMTL'];
		$tentl = $_POST['txtTenTL'];
		$tenkhongdau = changeTitle($tentl);
		$anhien = $_POST['select-show'];
			// truy van
		$query = 'insert into theloai(matheloai,tenTL,tenkhongdau,anhien) values("'.$matl.'","'.$tentl.'","'.$tenkhongdau.'","'.$anhien.'");';
		if(mysqli_query($conn, $query))
		{
			?>
			<script type="text/javascript">
				alert('Thêm thể loại thành công ');
				window.location.href='./index.php?lt=quanlytheloai&a=danhmuctheloai&pages=1';
			</script>
			<?php
		}
		else
		{
			?>
			<script type="text/javascript">
				alert('Lỗi không thêm được dữ liệu');
			</script>
			<?php
		}

	}
?>
<div id="body">
	<div id="content">
		<form method="post" class="special">
			<table align="center">
				<tr>
					<td align="center">Thêm thể loại</td>
				</tr>
				<tr>
					<td><input type="text" name="txtMTL" placeholder="Mã thể loại" required /></td>
				</tr>
				<tr>
					<td><input type="text" name="txtTenTL" placeholder="Tên thể loại" required /></td>
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
					<td><button type="submit" name="btn-save" class="btn btn-success"><strong>SAVE</strong></button></td>
				</tr>
			</table>
		</form>
	</div>
</div>