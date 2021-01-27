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
	$sql_query="DELETE FROM baiviet WHERE idBV=".$_GET['delete_id'];
	mysqli_query($conn, $sql_query);
	header("Location: ./index.php?lt=quanlytintuc&a=danhmuctintuc&pages=1");
}
?>
<script type="text/javascript">
function delete_id(id)
{
	if(confirm('Sure to Delete ?'))
	{
		window.location.href='./index.php?lt=quanlytintuc&delete_id='+id;
	}
}
</script>
<form method="POST">
	<table width="1000" border="2" class="tintuctb">
		<tbody>
			<tr class="tendanhmuctintuc">
				<td colspan=10>Danh mục tin tức</td>
			</tr>
			<tr>
				<td colspan=10><div class="btn btn-light"><a href="./index.php?lt=quanlytintuc&a=themtintuc">Thêm bài viết</a></div></td>
			</tr>
			<tr class="tencottintuc">
				<td>ID bài viết</td>
				<td>Tiêu đề</td>
				<td>Tóm tắt</td>
				<td>Url hình</td>
				<td>Ngày viết</td>
				<td>ID User</td>
				<td>Mã thể loại</td>
				<td>Số lần xem</td>
				<td colspan="2">Thao tác</td>
			</tr>
			<!-- Code Phan trang -->
			<?php
				$soluong = 7;
				$soluongtrang = SoTrang('idBV','baiviet',7);  
				for($i = 1; $i <= $soluongtrang; $i++){
					if($_GET['pages'] == $i){
						$start = ($i-1)*$soluong;
						$query = "select * from baiviet limit ". $start.",".$soluong." ";
					
						$result = mysqli_query($conn,$query);
						while ($row = mysqli_fetch_assoc($result)) {
							ob_start();				
			?>
			<tr class="chitiettintuc">
				<td>{idBV}</td>
				<td><a href="http://localhost/Webtintuc/?p=chitiettin&idbv=<?php echo $row['idBV']; ?>">{tieude}</a></td>			
				<td class="vanban">{tomtat}</td>
				<td>{urlHinh}</td>
				<td>{ngayviet}</td>
				<td>{idUser}</td>		
				<td>{matheloai}</td>
				<td>{solanxem}</td>					
				<td class="nut edit"><a href="./index.php?lt=quanlytintuc&a=suatintuc&idbv=<?php echo $row['idBV']; ?> " ><i class="fa fa-edit"></i></a></td>
				<td class="nut del"><a href="javascript:delete_id(<?php echo $row['idBV']; ?>)" ><i class="fa fa-trash"></i></a></td>
			</tr>
			<?php
							$s = ob_get_clean();
							$s = str_replace("{idBV}",$row['idBV'],$s);
							$s = str_replace("{tieude}",$row['tieude'],$s);
							$s = str_replace("{tomtat}",$row['tomtat'],$s);
							$s = str_replace("{urlHinh}",$row['urlHinh'],$s);
							$s = str_replace("{ngayviet}",$row['ngayviet'],$s);
							$s = str_replace("{idUser}",$row['idUser'],$s);
							$s = str_replace("{matheloai}",$row['matheloai'],$s);
							$s = str_replace("{solanxem}",$row['solanxem'],$s);
							echo $s;
						}
					}
					
				}
			?> <!-- Het code phan trang -->

			<!-- Hien thi link trang -->
			<nav aria-label="Page navigation example ">
				<ul class="pagination tintuc">
					<?php 
					$temp = 1; 
					if($_GET['pages'] > 1) echo '<li class="page-item"><a class="page-link" href="./index.php?lt=quanlytintuc&a=danhmuctintuc&pages='.($_GET["pages"]-1).'">Previous</a></li>';
					for($i = 1;$i <= $soluongtrang;$i++){
						echo '<li class="page-item"><a class="page-link" href="./index.php?lt=quanlytintuc&a=danhmuctintuc&pages='.$i.'">'.$i.'</a></li>';
					} 
					if($_GET['pages'] < $soluongtrang)	echo '<li class="page-item"><a class="page-link" href="./index.php?lt=quanlytintuc&a=danhmuctintuc&pages='.($_GET["pages"]+1).' ">Next</a></li>';
					?>
					
				</ul>
			</nav>
			
			

		</tbody>
	</table>
</form>