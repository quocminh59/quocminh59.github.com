<?php 
	$query = "select urlQC from quangcao where vitri=1 and anhien=1 order by idQC desc limit 1,3 ";
	$result = mysqli_query($conn,$query);
	$arrayUrl = array();
	$key = 0; ;
	if(mysqli_num_rows($result) > 0){
		while ($row = mysqli_fetch_array($result)) {
			$arrayUrl[$key] = $row['urlQC'];
			$key++;
		}
?>
 <div class="quangcao-right one"><img src="<?php echo $arrayUrl[0]; ?>" alt=""></div>
 <div class="quangcao-right next"><img src="<?php echo $arrayUrl[1]; ?>" alt=""></div> 
 <div class="quangcao-right end"><img src="<?php echo $arrayUrl[2]; ?>" alt=""></div> 
<?php  
	}
?>