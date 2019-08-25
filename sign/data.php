<?php
$user = $_POST['user'];
$pass = $_POST['pass'];
$con = new PDO(
	"mysql:host=localhost;dbname=EvilDB",
	"Tennebris",
	"password"
);

session_start();

if (!empty($_POST) AND (empty($_POST['user']) OR empty($_POST['pass']))){ 
	$_SESSION['msg'] = "Todos os campos são obrigatorios";
	$_SESSION['type'] = "error";
	header("Location: sign.php");
	exit;
}

$select = $con->query("SELECT name FROM users WHERE name = '$user'");
$result = $select->fetch(PDO::FETCH_ASSOC);
$nick_db = $result['name'];

if($user == $nick_db){
	$_SESSION['msg'] = "O nick $user já existente";
	$_SESSION['type'] = "error";
	header("Location: sign.php");
	exit;
}else{
	$query = $con->prepare("INSERT INTO users(name,keysec,password) VALUES(:name, :keysec, :password)");
	$query->bindValue(':name',$user);
	$query->bindValue(':keysec',md5($user+$pass));
	$query->bindValue(':password',md5($pass));
	$query->execute();
	$_SESSION['msg'] = "Usuario cadastrado com sucesso";
	$_SESSION['type'] = "success";
	$_SESSION['keysec'] = md5($user+$pass);
	header("Location: login.php");
}
?>