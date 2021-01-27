<link rel="stylesheet" href="CSS/layout-pages.css">
<?php  

?>
<div class="wrap-search">
	<div class="search-title">Kết quả tìm kiếm</div>
	<div class="content-seacrh">
		<?php  
		if(isset($_GET['k'])){
			$k = $_GET['k'];
			$query = "SELECT * FROM baiviet WHERE tieudekhongdau LIKE '%".$k."%' ORDER BY idBV DESC";
			$result = mysqli_query($conn,$query);
			if(mysqli_num_rows($result) > 0){
				$sotin_trang = 4;
				$tongsotin = mysqli_num_rows($result);
				$tongsotrang = ceil($tongsotin/$sotin_trang);
				for($i = 1; $i <= $tongsotrang; $i++){
					if(isset($_GET['pages']) && $_GET['pages'] == $i){
						$start = ($i-1)*$sotin_trang;
						$query1 = "SELECT * FROM baiviet WHERE tieudekhongdau LIKE '%".$k."%' ORDER BY idBV DESC LIMIT ".$start.",".$sotin_trang." ";
						$result1 = mysqli_query($conn,$query1);
						while ($row1 = mysqli_fetch_assoc($result1)) {										
		?>
							<div class="result">
								<div class="content-left">
									<a href="./?p=chitiettin&idbv=<?php echo $row1['idBV']; ?>"><p class="tieude"><?php echo $row1['tieude']; ?></p></a>
									<a href="./?p=chitiettin&idbv=<?php echo $row1['idBV']; ?>"><p class="noidung"><?php echo $row1['tomtat']; ?></p></a>
								</div>
								<div class="images-right">
									<a href="./?p=chitiettin&idbv=<?php echo $row1['idBV']; ?>"><img src="<?php echo $row1['urlHinh']; ?>" ></a>
								</div>
							</div>
		<?php  
						}
					}
				}
			}
			else{
				echo '<p class="thongbao">Không có kết quả nào phù hợp với tìm kiếm của bạn</p>';
			}
		}
		?>
	</div>
	<?php
		if(mysqli_num_rows($result)>4){  
			if(isset($_GET['pages'])){
	?>
			<div class="phantrang">
				<nav aria-label="Page navigation example">
					<ul class="pagination">
						<?php 
						$temp = 1; 
						if($_GET['pages'] > 1) echo '<li class="page-item"><a class="page-link" href="./?p=timkiem&k='.$k.'&pages='.($_GET["pages"]-1).'">Previous</a></li>';
						for($i = 1;$i <= $tongsotrang;$i++){
							echo '<li class="page-item"><a class="page-link" href="./?p=timkiem&k='.$k.'&pages='.$i.'">'.$i.'</a></li>';
						} 
						if($_GET['pages'] < $tongsotrang)	echo '<li class="page-item"><a class="page-link" href="./?p=timkiem&k='.$k.'&pages='.($_GET["pages"]+1).' ">Next</a></li>';
						?>

					</ul>
				</nav>
			</div>	
	<?php
			}
		}
	?>
</div>

