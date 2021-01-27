<div class="trangchu"><a href="http://localhost/Webtintuc/"><i class="fa fa-home"></i></a></div>
<div class="danhsach">
	<ul class="wrap-danhmuc">
		<?php 
			$query = "SELECT * FROM theloai;";
			$result = mysqli_query($conn,$query); 
			while ($row = mysqli_fetch_array($result)) {
				if($row['anhien']==1)
					echo '<li class="wrap-item"><a href="http://localhost/Webtintuc/?p=loaitin&mtl='.$row['matheloai'].'">'.$row['tenTL'].'</a></li>';
			}
		?>
	</ul>
</div>

