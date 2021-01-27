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
		case 'suaquangcao':
		require 'Blocks/suaquangcao.php';
		break;
		case 'themquangcao':
		require 'Blocks/themquangcao.php';
		break;
		default:
		require 'Blocks/danhmucquangcao.php';
		break;
	}
?>
