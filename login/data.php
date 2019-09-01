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
	header("Location: ../login");
	exit;
}

$select = $con->query("SELECT name FROM users WHERE name = '$user'");
$result = $select->fetch(PDO::FETCH_ASSOC);
$nick_db = $result['name'];

$select2 = $con->query("SELECT password FROM users WHERE name = '$user'");
$result2 = $select2->fetch(PDO::FETCH_ASSOC);
$pass_db = $result2['password'];

$select3 = $con->query("SELECT keysec FROM users WHERE name = '$user'");
$result3 = $select3->fetch(PDO::FETCH_ASSOC);
$key_db = $result3['keysec'];

if ($user == $nick_db){
	if (md5($pass) == $pass_db){
		$_SESSION['usuario'] = $nick_db;
		$_SESSION['keysec'] = $key_db;
		header("Location: ../site/index.php");
	}else{
		$_SESSION['msg'] = "A senha está incorreta";
		$_SESSION['type'] = "error";
		header("Location: ../login");
		exit;	
	}
}else{
	$_SESSION['msg'] = "O nick $user não encontrado";
	$_SESSION['type'] = "error";
	header("Location: ../login");
	exit;
}

?>