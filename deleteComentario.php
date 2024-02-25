<?php
include_once("functions.php");

    $dados_brutos = array(
        "id"  => $_POST['id']
    );
    $dados = json_encode($dados_brutos);

$resposta = apagarComentario($dados);
echo $resposta;


