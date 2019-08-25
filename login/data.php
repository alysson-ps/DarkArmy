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
	header("Location: index.php");
	exit;
}

$select = $con->query("SELECT name FROM users WHERE name = '$user'");
$result = $select->fetch(PDO::FETCH_ASSOC);
$nick_db = $result['name'];

$select2 = $con->query("SELECT name FROM users WHERE password = '$pass'");
$result2 = $select2->fetch(PDO::FETCH_ASSOC);
$pass_db = $result2['password'];

if ($user == $nick_db){
	if ($pass == $pass_db){
		header("Location: ../restrito");
	}else{
		$_SESSION['msg'] = "A senha está incorreta";
		$_SESSION['type'] = "error";
		header("Location: index.php");
		exit;	
	}
}else{
	$_SESSION['msg'] = "O nick $user não encontrado";
	$_SESSION['type'] = "error";
	header("Location: index.php");
	exit;
}
?>