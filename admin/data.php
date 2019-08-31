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


?>