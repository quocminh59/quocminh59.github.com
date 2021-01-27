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
	$sql_query="DELETE FROM theloai WHERE idTL=".$_GET['delete_id'];
	mysqli_query($conn, $sql_query);
	header("Location: ./index.php?lt=quanlytheloai&a=danhmuctheloai&pages=1");
}
?>
<script type="text/javascript">
function delete_id(id)
{
	if(confirm('Sure to Delete ?'))
	{
		window.location.href='./index.php?lt=quanlytheloai&delete_id='+id;
	}
}
</script>
<form method="POST">
	<table width="1000" border="2">
		<tbody>
			<tr class="tendanhmuc">
				<td colspan=7>Danh mục thể loại</td>
			</tr>
			<tr>
				<td colspan=7><div class="btn btn-light"><a href="./index.php?lt=quanlytheloai&a=themtheloai">Thêm thể loại</a></div></td>
			</tr>
			<tr class="tencot">
				<td>ID</td>
				<td>Mã thể loại</td>
				<td>Tên thể loại</td>
				<td>Tên không dấu</td>
				<td>Ẩn hiện</td>
				<td colspan="2">Thao tác</td>
			</tr>
			<!-- Code Phan trang -->
			<?php
				$soluong = 8;
				$soluongtrang = SoTrang('idTL','theloai',8);  
				for($i = 1; $i <= $soluongtrang; $i++){
					if(isset($_GET['pages']) && $_GET['pages'] == $i){
						$start = ($i-1)*$soluong;
						$query = "select * from theloai limit ". $start.",".$soluong." ";
						$result = mysqli_query($conn,$query);
						while ($row = mysqli_fetch_assoc($result)) {
							ob_start();				
			?>
			<tr class="chitiet">
				<td>{idTL}</td>
				<td>{matheloai}</td>
				<td>{tenTL}</td>
				<td>{tenkhongdau}</td>
				<td>{anhien}</td>	
				<td class="nut edit"><a href="./index.php?lt=quanlytheloai&a=suatheloai&idtl=<?php echo $row['idTL']; ?> " ><i class="fa fa-edit"></i></a></td>
				<td class="nut del"><a href="javascript:delete_id(<?php echo $row['idTL']; ?>)" ><i class="fa fa-trash"></i></a></td>
			</tr>
			<?php
							$s = ob_get_clean();
							$s = str_replace("{idTL}",$row['idTL'],$s);
							$s = str_replace("{matheloai}",$row['matheloai'],$s);
							$s = str_replace("{tenTL}",$row['tenTL'],$s);
							$s = str_replace("{tenkhongdau}",$row['tenkhongdau'],$s);
							$s = str_replace("{anhien}",$row['anhien'],$s);
							echo $s;
						}
					}
				}
			?> <!-- Het code phan trang -->
			
			<!-- Hien thi link trang -->
			<nav aria-label="Page navigation example">
				<ul class="pagination">
					<?php 
					$temp = 1; 
					if($_GET['pages'] > 1) echo '<li class="page-item"><a class="page-link" href="./index.php?lt=quanlytheloai&a=danhmuctheloai&pages='.($_GET["pages"]-1).'">Previous</a></li>';
					for($i = 1;$i <= $soluongtrang;$i++){
						echo '<li class="page-item"><a class="page-link" href="./index.php?lt=quanlytheloai&a=danhmuctheloai&pages='.$i.'">'.$i.'</a></li>';
					} 
					if($_GET['pages'] < $soluongtrang)	echo '<li class="page-item"><a class="page-link" href="./index.php?lt=quanlytheloai&a=danhmuctheloai&pages='.($_GET["pages"]+1).' ">Next</a></li>';
					?>
					
				</ul>
			</nav>
			
			

		</tbody>
	</table>
</form>