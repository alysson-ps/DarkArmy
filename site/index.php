<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/theme.css">

	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/sweetalert.min.js"></script>
	<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
	<title>DarkArmy</title>
</head>
<body class="body_sign">
	<?php echo "<div class='card-deck' style='width:90%;left:20px;position:relative'>"; ?>
	<?php
	session_start();
	$con = new PDO(
	"mysql:host=localhost;dbname=EvilDB",
	"Tennebris",
	"password"
	);
	$user = $_SESSION['usuario'];

	$select = $con->query("SELECT keysec FROM users WHERE name = '$user'");
	$result = $select->fetch(PDO::FETCH_ASSOC);
	$key = $result['keysec'];

	if (!isset($_SESSION['keysec'])){
			$_SESSION['msg'] = "Acesso Restrito";
			$_SESSION['type'] = "error";
			header("Location: ../login");
			exit;
	}else{
		if ($_SESSION["keysec"] != $key){
			$_SESSION['msg'] = "Acesso Restrito";
			$_SESSION['type'] = "error";
			header("Location: ../login");
			exit;
		}
	}

	$query = $con->query("SELECT * FROM victims");
	$data = $query->fetchall(PDO::FETCH_ASSOC);
	foreach ($data as $dados){
		$name = $dados['nome'];
		$secund = $dados['sobre'];
		$img = $dados['image'];
		$city = $dados['cidade'];
		echo "
		<div class='row'>
		<div class='card' style='width: 18rem;margin-left:30px;margin-top:20px'>
		  <img src='$img' class='card-img-top'>
		  <div class='card-body'>
		    <h5 class='card-title'>Nome: $name $secund</h5>
		    <p class='card-text'>Cidade: $city</p>
		    <a href='#' class='btn btn-primary'>Credenciais</a>
		  </div>
		</div>
		</div>";
	}
	?>
	<?php echo "</div>"; ?>
</body>
</html>