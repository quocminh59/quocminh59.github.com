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
	$sql_query="DELETE FROM quangcao WHERE idQC=".$_GET['delete_id'];
	mysqli_query($conn, $sql_query);
	header("Location: ./index.php?lt=quanlyquangcao&a=danhmucquangcao");
}
?>
<script type="text/javascript">
function delete_id(id)
{
	if(confirm('Sure to Delete ?'))
	{
		window.location.href='./index.php?lt=quanlyquangcao&delete_id='+id;
	}
}
</script>
<form method="POST">
	<table width="1000" border="2">
		<tbody>
			<tr class="tendanhmuc">
				<td colspan=7>Danh mục quảng cáo</td>
			</tr>
			<tr>
				<td colspan=7><div class="btn btn-light"><a href="./index.php?lt=quanlyquangcao&a=themquangcao">Thêm quảng cáo</a></div></td>
			</tr>
			<tr class="tencot">
				<td>IdQC</td>
				<td>Mô tả</td>
				<td>urlQC</td>
				<td>Vị trí</td>
				<td>Ẩn hiện</td>
				<td colspan="2">Thao tác</td>
			</tr>
			<!-- Code Phan trang -->
			<?php
				
						$query = "select * from quangcao";
						$result = mysqli_query($conn,$query);
						while ($row = mysqli_fetch_assoc($result)) {
							ob_start();				
			?>
			<tr class="chitiet">
				<td>{idQC}</td>
				<td>{mota}</td>
				<td>{urlQC}</td>
				<td>{vitri}</td>
				<td>{anhien}</td>	
				<td class="nut edit"><a href="./index.php?lt=quanlyquangcao&a=suaquangcao&idqc=<?php echo $row['idQC']; ?> " ><i class="fa fa-edit"></i></a></td>
				<td class="nut del"><a href="javascript:delete_id(<?php echo $row['idQC']; ?>)" ><i class="fa fa-trash"></i></a></td>
			</tr>
			<?php
							$s = ob_get_clean();
							$s = str_replace("{idQC}",$row['idQC'],$s);
							$s = str_replace("{mota}",$row['mota'],$s);
							$s = str_replace("{urlQC}",$row['urlQC'],$s);
							$s = str_replace("{vitri}",$row['vitri'],$s);
							$s = str_replace("{anhien}",$row['anhien'],$s);
							echo $s;
						}
			?>	
			
		
			

		</tbody>
	</table>
</form>