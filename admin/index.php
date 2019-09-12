<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/theme.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="../js/sweetalert.min.js"></script>

	<title>Pannel</title>
</head>
<body style="">
    <div class="img" style="width: 100%;height: 100%;background: url(img/tela.png);position: absolute;filter: blur(2px);">
    </div> 
    <div class="login-dark">
        <form method="post" action="data.php">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration">
            	<i class="icon ion-ios-locked-outline"></i>
            </div>
            <div class="form-group">
            	<input class="form-control" type="text" name="email" placeholder="Email" style="border-color:white">
            </div>
            <div class="form-group">
            	<input class="form-control" type="password" name="password" placeholder="Senha" style="border-color:white">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary btn-block" type="submit">Entrar</button>
            </div>
        </form>
    </div>
</body>
</html>