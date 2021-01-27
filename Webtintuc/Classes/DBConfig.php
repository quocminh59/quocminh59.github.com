<?php  
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'newspaper';
	$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	if($conn) mysqli_query($conn,"SET NAMES 'utf8'");
	else echo "Kết nối cơ sở dữ liệu thất bại. ".mysqli_connect_error();
?>