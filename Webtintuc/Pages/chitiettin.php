<link rel="stylesheet" href="CSS/layout-pages.css">
<?php  
	if(isset($_GET['idbv'])){
		$idbv = $_GET['idbv'];
		$thongtinbaiviet = Laybaiviet($idbv);
		$row = mysqli_fetch_assoc($thongtinbaiviet);
		$solanxem = $row['solanxem']+1;
		//cap nhat lai so luot xem
		$query = "update baiviet set solanxem = ".$solanxem." where idBV = ".$idbv." ";
		mysqli_query($conn,$query);
	}
?>
<div class="pages">
	<div class="baiviet">
		<div class="danhmuc"><?php echo Laytheloai($row['matheloai']); ?></div>
		<div class="noidungchitiet">
			<p class="tieude-chitiettin"><?php echo $row['tieude']; ?></p>
			<div class="doantin"><?php echo $row['content']; ?></div>		
		</div>
		<div class="tinlienquan">
			<?php  
				$tinlienquan = Laysoluongtin2(4,3,$row['matheloai']);
				if(mysqli_num_rows($tinlienquan) > 0){
					while ( $rowlq = mysqli_fetch_assoc($tinlienquan)) {
			?>
			<a href="http://localhost/Webtintuc/?p=chitiettin&idbv=<?php echo $rowlq['idBV']; ?>"><?php echo $rowlq['tieude']; ?></a><br>
			<?php 	
					}
				}  
			?>	
		</div>
	</div>
	<div class="pages-right">
		<div class="tinxemnhieu">
			<p>Xem nhiều</p>		
			<?php  
				$query1 = "SELECT * FROM baiviet where matheloai = '".$row['matheloai']."' ORDER BY solanxem DESC LIMIT 0,1";
				$result1 = mysqli_query($conn,$query1);
				if(mysqli_num_rows($result1) > 0){
					while ( $row1 = mysqli_fetch_assoc($result1)) {
			?>
			<img src="<?php echo $row1['urlHinh']; ?>" alt="" class="txn">
			<a href="http://localhost/Webtintuc/?p=chitiettin&idbv=<?php echo $row1['idBV']; ?>" class="tieudetxn"><?php echo $row1['tieude']; ?></a>
			<?php  
					}
				}
			?>
			<?php
				$query2 = "SELECT * FROM baiviet where matheloai = '".$row['matheloai']."' ORDER BY solanxem DESC LIMIT 1,2";
				$result2 = mysqli_query($conn,$query2);
				if(mysqli_num_rows($result2) > 0){
					while ( $row2 = mysqli_fetch_assoc($result2)) {  
			?>
				<a href="http://localhost/Webtintuc/?p=chitiettin&idbv=<?php echo $row2['idBV']; ?>" class="txn-sm"><?php echo $row2['tieude'] ?></a> <br>
			<?php
				    }
				}  
			?>
		</div>
		<?php  
			//$qrQC = "select urlQC from quangcao where vitri=3 and anhien=1 order by idQC limit 0,1"
		?>
		<div class="advertisement mot"><img src="/Webtintuc/Upload/images/quangcao/1.png" alt="" id="qc"></div>
	</div>
</div>