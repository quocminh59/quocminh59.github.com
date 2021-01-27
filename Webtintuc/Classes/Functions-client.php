<?php  
function Tinmoinhat_mottin($matheloai = 'ts'){
	global $conn;
	$query = "SELECT * FROM baiviet WHERE matheloai = '".$matheloai."' ORDER BY idBV DESC LIMIT 0,1";
	$result = mysqli_query($conn,$query);
	return $result;
}
function Laybaiviet($idbv = ''){
	global $conn;
	$query = "select * from baiviet where idBV = '".$idbv."' ";
	$result = mysqli_query($conn,$query);
	return $result;
}
function Laytheloai($matheloai = ''){
	global $conn;
	$query = "select tenTL from theloai where matheloai = '".$matheloai."' ";
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_array($result);
	return $row['tenTL'];
}
function Laysoluongtin($soluongtin,$matheloai){
	global $conn;
	$query = "SELECT * FROM baiviet WHERE matheloai = '".$matheloai."' ORDER BY idBV DESC LIMIT 1,".$soluongtin." ";
	$result = mysqli_query($conn,$query);
	return $result;
}
function Laysoluongtin2($start,$soluongtin,$matheloai){
	global $conn;
	$query = "SELECT * FROM baiviet WHERE matheloai = '".$matheloai."' ORDER BY idBV DESC LIMIT ".$start.",".$soluongtin." ";
	$result = mysqli_query($conn,$query);
	return $result;
}


?>