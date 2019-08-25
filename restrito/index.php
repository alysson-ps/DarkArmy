<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/theme.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

	<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="../js/sweetalert.min.js"></script>
	<title>DarkArmy</title>
</head>
<?php
session_start();
if (isset($_SESSION['keysec'])){
	echo "<body class='body_sign'>
		<form>
			<input type='text' class='fixed' placeholder='Messagem' name='cmd'><button></button>
		</form>
	</body>";
}else{
	echo "<body class='body_sign'>
		<script type='text/javascript'>
			$(document).ready(function(){
				swal({title:'area restrita',icon:'error'})
					.then((value) => {
						$(window.document.location).attr('href','../index.php');
					});
			});
		</script>
	</body>";
}
?>
</html>