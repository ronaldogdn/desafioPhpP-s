<?php
require_once("conexao.php");
include_once("functions.php");

if( !isset($_POST['nome']) ||
    !isset($_POST['telefone']) ||
    !isset($_POST['email']) ||
    !isset($_POST['sug'])
  ){
    echo "Preencha todos os campos!";
    exit();
 }
$dados = [
  "nome" => $_POST['nome'],
  "telefone" => $_POST['telefone'],
  "email" => $_POST['email'],
  "sug" => $_POST['sug'],
];


$resposta = salvarComentarios($dados);
echo $resposta;
header('Location: comentarios.php');