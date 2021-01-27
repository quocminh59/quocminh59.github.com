<?php  
	$query = "select urlQC from quangcao where vitri=1 and anhien=1 order by idQC desc limit 0,1 ";
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_assoc($result);
?>
<img src="<?php echo $row['urlQC']; ?>" style="width: 284px; height: 529px">
<?php  
?>