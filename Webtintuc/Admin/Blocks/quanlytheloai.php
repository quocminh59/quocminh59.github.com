<?php require_once 'Classes/Functions.php'; ?>
<?php  
	if(isset($_GET['a'])){
		$a = $_GET['a'];
	}
	else{
		$a = "";
	}  
?>
<?php
	switch ($a) {
		case 'suatheloai':
		require 'Blocks/suatheloai.php';
		break;
		case 'themtheloai':
		require 'Blocks/themtheloai.php';
		break;
		default:	
		require 'Blocks/danhmuctheloai.php';
		break;
	}
?>
