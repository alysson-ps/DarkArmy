
<head>
	<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="../js/sweetalert.min.js"></script>
</head>
<?php

$user = $_POST['email'];
$pass = $_POST['password'];
$con = new PDO(
	"mysql:host=localhost;dbname=EvilDB",
	"Tennebris",
	"password"
);

if (!empty($_POST) AND (empty($_POST['email']) OR empty($_POST['password']))){ 
	$_SESSION['msg'] = "Todos os campos são obrigatorios";
	$_SESSION['type'] = "error";
	header("Location: index.php");
	exit;
}

$query = $con->query("SELECT * FROM develop");
$result = $query->fetch(PDO::FETCH_ASSOC);
$user_db = $result['name'];
$pass_db = $result['pass'];

if ($user == $user_db){
	if ($pass == $pass_db) {
		session_start();
		$_SESSION['auth'] = md5("root");
		header("Location: pannel.php");
		exit();
	}
}else{
	echo'
		<script type="text/javascript">
			$(document).ready(function() {
				swal("acesso negado","credenciais incorretos","error")
			});
		</script>
	';
}
?>
