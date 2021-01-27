<link rel="stylesheet" href="CSS/layout-pages.css">
<?php  
if(isset($_GET['mtl'])){
	$mtl = $_GET['mtl'];
	$ts_moinhat = Tinmoinhat_mottin($mtl);
	$row = mysqli_fetch_array($ts_moinhat);
}
?>
<div class="wrap-top">
	<div class="content-left">
		<div class="top-content">
			<img src="<?php echo $row["urlHinh"]; ?>" >
			<div class="nd">
				<a href="http://localhost/Webtintuc/?p=chitiettin&idbv=<?php echo $row['idBV'] ?>" class="tieude-top"><?php echo $row["tieude"]; ?></a> <br>
				<a href="#" class="mota-top"><?php echo $row["tomtat"]; ?></a>
			</div>
		</div>
		<div class="bot-content">
			<?php 
			$top_three_news = Laysoluongtin(3,$mtl);
			while ($row = mysqli_fetch_array($top_three_news)) {
				echo '<div class="content">';
				echo '<a href="http://localhost/Webtintuc/?p=chitiettin&idbv='.$row['idBV'].'" class="tieude">'.$row['tieude'].'</a>';
				echo '<a href="http://localhost/Webtintuc/?p=chitiettin&idbv='.$row['idBV'].'" class="mota">'.$row['tomtat'].'</a>';
				echo "</div>";
			}
			?>	
		</div>
	</div>
	<div class="quangcao-right-top">
		<!-- require top-quangcao -->
		<?php require'Blocks/top-quangcao.php'; ?>
	</div>
</div>
<div class="wrap-bot">
	<?php  
		$result1 = Laysoluongtin2(4,10,$mtl);
		if(mysqli_num_rows($result1) > 0){
			while($row1 = mysqli_fetch_assoc($result1)){ 
	?>
				<div class="tin-bot">
					<div class="tin-bot-anh">
						<a href="./?p=chitiettin&idbv=<?php echo $row1['idBV']; ?>"><img src="<?php echo $row1['urlHinh']; ?>" alt=""></a>
					</div>
					<div class="tin-bot-nd">
						<a href="./?p=chitiettin&idbv=<?php echo $row1['idBV']; ?>"><p class="tieude"><?php echo $row1['tieude']; ?></p></a>
						<a href="./?p=chitiettin&idbv=<?php echo $row1['idBV']; ?>"><p class="nd"><?php echo $row1['tomtat']; ?></p></a>
					</div>
				</div>
	<?php
			}  
		}
	?>
</div>


