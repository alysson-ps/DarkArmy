<!DOCTYPE html>
<html>
<head>
	<title>Login | DarkArmy</title>
	<!-- Aquivos de estilo -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/theme.css">

	<!-- Biblioteca em js -->
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="../js/sweetalert.min.js"></script>
	<?php
	session_start();
	if (isset($_SESSION)){
		$message = $_SESSION['msg'];
		$type = $_SESSION['type'];
		if($type == 'error'){
			echo '<script type="text/javascript">';
			echo '$(document).ready(function() {';
			echo "swal({title:'Erro',text:'$message',icon:'error',button:'Tente novamente'})";
			echo "});";
			echo '</script>';
		}
		if ($type == 'success') {
			echo '<script type="text/javascript">';
			echo '$(document).ready(function() {';
			echo "swal({title:'Pronto',text:'$message',icon:'success',buttons:false,timer:2000})";
			echo "});";
			echo '</script>';
		}
		session_unset();
	}
	?>
</head>
<body class="body_sign">
	<div class="login_sign">
		<img src="../img/mr.gif" class="banner"><br>
		<img src="../img/evil.png" class="logo"><br>
		<form method="post" action="data_log.php">
			
		</form>
		<input type="text" name="user" placeholder="Nick" class="inputs"><br>
		<input type="password" name="pass" placeholder="Password" class="inputs">
		<input type="submit" class="bnt_log bnt" value="Entrar">
	</div>
</body>
</html>