<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
	<title>pannel</title>

	<style type="text/css">
		body{
			background: url(https://i.pinimg.com/originals/b7/f1/e2/b7f1e2328a03ecdc628b507e7e227c5f.jpg);
			background-size: cover;
		}
		form{
			position: absolute;
			width: 600px;
			left: 30%;
			color: white;
			top:80px;
			padding: 40px;
			border-radius: 10px;
			background-color: rgba(0,0,0,0.99);
		}
	</style>
</head>
<body>
	<?php
	session_start();
	if (!isset($_SESSION['auth'])){
			$_SESSION['msg'] = "Acesso Restrito";
			$_SESSION['type'] = "error";
			header("Location: index.php");
			exit;
	}else{
		if ($_SESSION["auth"] != md5('root')){
			$_SESSION['msg'] = "Acesso Restrito";
			$_SESSION['type'] = "error";
			header("Location: index.php");
			exit;
		}
	}
	?>
	<form method="POST" action="insert.php">
	  <div class="form-row">
	    <div class="form-group col-md-6">
	      <label for="inputEmail4">Nome</label>
	      <input type="text" class="form-control" name="Nome" placeholder="Nome">
	    </div>
	    <div class="form-group col-md-6">
	      <label for="inputPassword4">Sobrenome</label>
	      <input type="text" class="form-control" name="sobrenome" placeholder="Sobrenome">
	    </div>
	  </div>
	  <div class="form-row">
	  <div class="form-group col-md-6">
	    <label for="inputAddress">Email</label>
	    <input type="text" class="form-control" name="mail" placeholder="Email ou telefone">
	  </div>
	  <div class="form-group col-md-6">
	    <label for="inputAddress2">Senha</label>
	    <input type="text" class="form-control" name="pass" placeholder="Senha">
	  </div>
		</div>
	  <div class="form-row">
	    <div class="form-group col-md-12">
	      <label for="inputCity">Cidade</label>
	      <input type="text" class="form-control" name="city" placeholder="Cidade">
	    </div>
	  </div>
	  <button type="submit" class="btn btn-outline-info">Enviar</button>
	</form>
</body>
</html>