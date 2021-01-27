<?php  
$query = "SELECT * FROM theloai ORDER BY idTL ASC LIMIT 1,10";
$result = mysqli_query($conn,$query);
if(mysqli_num_rows($result) > 0){
	while ($row = mysqli_fetch_array($result)) {
		$haitin = Laysoluongtin(2,$row['matheloai']);
		echo '<div class="nav-top">';
		echo '<a href="#" class="danhmuctin">'.$row['tenTL'].'</a>';
		echo '</div>';
		echo '<div class="wrap-news-left">';
		while ($rowtin = mysqli_fetch_array($haitin)) {
			echo '<div class="news-left">';	
			echo '<div class="tin-bot">';
			echo '<div class="wrap-tin-bot-left">';
			echo '<a href="http://localhost/Webtintuc/?p=chitiettin&idbv='.$rowtin['idBV'].'"><img src="'.$rowtin['urlHinh'].'" class="tin-bot-left-image"></a>';
			echo '<div class="tin-bot-left">';
			echo '<a href="http://localhost/Webtintuc/?p=chitiettin&idbv='.$rowtin['idBV'].'" class="tin-bot-tieude">'.$rowtin['tieude'].'</a> <br>';
			echo '<a href="http://localhost/Webtintuc/?p=chitiettin&idbv='.$rowtin['idBV'].'" class="tin-bot-content">'.$rowtin['tomtat'].'</a>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
		}
		echo '</div>';
	}
}
?>
