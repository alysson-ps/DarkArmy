<?php

$user = $_POST['user'];
$pass = $_POST['pass'];
$con = new PDO(
	"mysql:host=localhost;dbname=EvilDB",
	"Tennebris",
	"password"
);

if (!empty($_POST) AND (empty($_POST['user']) OR empty($_POST['pass']))){ 
	$_SESSION['msg'] = "Todos os campos são obrigatorios";
	$_SESSION['type'] = "error";
	header("Location: sign.php");
	exit;
}


?>