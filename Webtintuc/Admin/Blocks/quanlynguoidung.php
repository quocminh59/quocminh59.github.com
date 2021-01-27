<?php  
	if(isset($_GET['pages'])){
		$pags = $_GET['pages'];
	}
	else{
		$pages = "";
	}  
?>
<?php  
	if(isset($_GET['delete_id']))
{
	$sql_query="DELETE FROM users WHERE idUser=".$_GET['delete_id'];
	mysqli_query($conn, $sql_query);
	header("Location: ./index.php?lt=quanlynguoidung&pages=1");
}
?>
<?php  
	if(isset($_GET['hoatdong'])){
		
	}
?>
<script type="text/javascript">
function delete_id(id)
{
	if(confirm('Sure to Delete ?'))
	{
		window.location.href='./index.php?lt=quanlynguoidung&delete_id='+id;
	}
}
</script>
<form method="POST">
	<table width="1000" border="2" class="tintuctb">
		<tbody>
			<tr class="tendanhmuctintuc">
				<td colspan=12>Danh sách người dùng</td>
			</tr>
			<tr class="tencottintuc">
				<td>IdUser</td>
				<td>Họ tên</td>
				<td>Giới tính</td>
				<td>Ngày sinh</td>
				<td>Username</td>
				<td>Địa chỉ</td>
				<td>Di động</td>
				<td>Email</td>
				<td>idGroup</td>
				<td>Ngày DK</td>
				<td>Xóa</td>
			</tr>
			<!-- Code Phan trang -->
			<?php
				$soluong = 6;
				$soluongtrang = SoTrang('idUser','users',6);  
				for($i = 1; $i <= $soluongtrang; $i++){
					if($_GET['pages'] == $i){
						$start = ($i-1)*$soluong+1;
						$query = "select * from users limit ". $start.",".$soluong." ";
						$result = mysqli_query($conn,$query);
						while ($row = mysqli_fetch_assoc($result)) {
							ob_start();				
			?>
			<tr class="chitiettintuc">
				<td>{idUser}</td>			
				<td>{hoten}</td>
				<td>{gioitinh}</td>
				<td>{ngaysinh}</td>		
				<td>{username}</td>
				<td>{diachi}</td>
				<td>{sodienthoai}</td>
				<td>{email}</td>
				<td>{idGroup}</td>
				<td>{ngaydangki}</td>					
				<td class="nut del"><a href="javascript:delete_id(<?php echo $row['idUser']; ?>)" ><i class="fa fa-trash"></i></a></td>
			</tr>
			<?php
							$s = ob_get_clean();
							$s = str_replace("{idUser}",$row['idUser'],$s);
							$s = str_replace("{hoten}",$row['hoten'],$s);
							$s = str_replace("{gioitinh}",$row['gioitinh'],$s);
							$s = str_replace("{ngaysinh}",$row['ngaysinh'],$s);
							$s = str_replace("{username}",$row['username'],$s);
							$s = str_replace("{diachi}",$row['diachi'],$s);
							$s = str_replace("{sodienthoai}",$row['sodienthoai'],$s);
							$s = str_replace("{email}",$row['email'],$s);
							$s = str_replace("{idGroup}",$row['idGroup'],$s);
							$s = str_replace("{ngaydangki}",$row['ngaydangki'],$s);
							echo $s;
						}
					}
					
				}
			?> <!-- Het code phan trang -->
			<!-- Hien thi link trang -->
			<nav aria-label="Page navigation example">
				<ul class="pagination tintuc">
					<?php 
					$temp = 1; 
					if($_GET['pages'] > 1) echo '<li class="page-item"><a class="page-link" href="./index.php?lt=quanlynguoidung&pages='.($_GET["pages"]-1).'">Previous</a></li>';
					for($i = 1;$i <= $soluongtrang;$i++){
						echo '<li class="page-item"><a class="page-link" href="./index.php?lt=quanlynguoidung&pages='.$i.'">'.$i.'</a></li>';
					} 
					if($_GET['pages'] < $soluongtrang)	echo '<li class="page-item"><a class="page-link" href="./index.php?lt=quanlynguoidung&pages='.($_GET["pages"]+1).' ">Next</a></li>';
					?>
					
				</ul>
			</nav>
			
			

		</tbody>
	</table>
</form>