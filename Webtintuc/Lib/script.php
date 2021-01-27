<?php  
switch ($p) {
	case 'chitiettin':
		echo '
		<script type="text/javascript" src="Javascript/hieuung-chitiettin.js"></script>		
		';
		if(isset($_SESSION['idUser'])){
			echo '
			<script type="text/javascript" src="Javascript/hieuung-login.js"></script>
			';
		}
		else{
			echo '
			<script type="text/javascript" src="Javascript/hieuung-logout.js"></script>
			';
		}
		break;
	case 'loaitin':
		echo '
		<script type="text/javascript" src="Javascript/hieuung-loaitin.js"></script>		
		';
		if(isset($_SESSION['idUser'])){
			echo '
			<script type="text/javascript" src="Javascript/hieuung-login.js"></script>
			';
		}
		else{
			echo '
			<script type="text/javascript" src="Javascript/hieuung-logout.js"></script>
			';
		}
		break;
	case 'timkiem':
			echo '
		<script type="text/javascript" src="Javascript/hieuung-loaitin.js"></script>		
		';
		if(isset($_SESSION['idUser'])){
			echo '
			<script type="text/javascript" src="Javascript/hieuung-login.js"></script>
			';
		}
		else{
			echo '
			<script type="text/javascript" src="Javascript/hieuung-logout.js"></script>
			';
		}
			break;	
	case 'chitiettaikhoan':
				echo '
		<script type="text/javascript" src="Javascript/hieuung-loaitin.js"></script>		
		';
		if(isset($_SESSION['idUser'])){
			echo '
			<script type="text/javascript" src="Javascript/hieuung-login.js"></script>
			';
		}
		else{
			echo '
			<script type="text/javascript" src="Javascript/hieuung-logout.js"></script>
			';
		}
				break;		
	default:
			echo '
			<script type="text/javascript" src="Javascript/hieuung.js"></script>	
			';
			if(isset($_SESSION['idUser'])){
				echo '
				<script type="text/javascript" src="Javascript/hieuung-login.js"></script>
				';
			}
			else{
				echo '
				<script type="text/javascript" src="Javascript/hieuung-logout.js"></script>
				';
			}	
}
?>