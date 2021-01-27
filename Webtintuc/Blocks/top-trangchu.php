<?php 
$ts_moinhat = Tinmoinhat_mottin('ts');
$row = mysqli_fetch_array($ts_moinhat);	
?>
<div class="top-content">
	<a href="http://localhost/Webtintuc/?p=chitiettin&idbv=<?php echo $row['idBV'] ?>"><img src="<?php echo $row["urlHinh"]; ?>" ></a>
	<div class="nd">
		<a href="http://localhost/Webtintuc/?p=chitiettin&idbv=<?php echo $row['idBV'] ?>" class="tieude-top"><?php echo $row["tieude"]; ?></a> <br>
		<a href="http://localhost/Webtintuc/?p=chitiettin&idbv=<?php echo $row['idBV'] ?>" class="mota-top"><?php echo $row["tomtat"]; ?></a>
	</div>
</div>
<div class="bot-content">
		<?php 
		$top_three_news = Laysoluongtin(3,'ts');
		while ($row = mysqli_fetch_array($top_three_news)) {
			echo '<div class="content">';
			echo '<a href="http://localhost/Webtintuc/?p=chitiettin&idbv='.$row['idBV'].'" class="tieude">'.$row['tieude'].'</a>';
			echo '<a href="http://localhost/Webtintuc/?p=chitiettin&idbv='.$row['idBV'].'" class="mota">'.$row['tomtat'].'</a>';
			echo "</div>";
		}
		?>	
</div>
