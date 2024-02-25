<?php
include_once("functions.php");

    $dados_brutos = array(
        "id"  => $_POST['id'],
        "sug" => $_POST['sug'],
    );
    $dados = json_encode($dados_brutos);

$resposta = editarComentario($dados);
echo $resposta;


