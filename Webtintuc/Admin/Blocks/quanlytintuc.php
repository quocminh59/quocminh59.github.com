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
		case 'suatintuc':
		require 'Blocks/suatintuc.php';
		break;
		case 'themtintuc':
		require 'Blocks/themtintuc.php';
		break;
		default:
		require 'Blocks/danhmuctintuc.php';
		break;
	}
?>
