<?php
function conectar()
{
	$username = "root";
	$password = "rgdn3288";

	try {
		$conn = new PDO('mysql:host=localhost;dbname=wxr', $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conn;
	} catch (PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}
}
function salvarComentarios($dados)
{
	$conn = conectar();
	$stmt = $conn->prepare(
		'INSERT INTO comentarios (nome, telefone, email, sug) 
						VALUES(:nome, :telefone, :email, :sug)'
	);
	$stmt->bindParam(':nome', $dados['nome']);
	$stmt->bindParam(':telefone', $dados['telefone']);
	$stmt->bindParam(':email', $dados['email']);
	$stmt->bindParam(':sug', $dados['sug']);

	if ($stmt->execute()) {
		return "Comentário inserido com sucesso!";
	} else {
		print_r($stmt->errorInfo());
		return "erro! ";
	}
}
function listarComentarios($inicio)
{
	$conn = conectar();
	//$stmt = $conn->prepare("select id,nome, sug from comentarios order by id");
	$stmt = $conn->prepare("select id,nome, sug, 
							substring(sug,1,60) as comentario_inicial 
							from comentarios order by id
							LIMIT $inicio,5");
	$stmt->execute();
	$retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $retorno;
}
function totalRegistros()
{
	$conn = conectar();
	$stmt = $conn->prepare("select count(*) from comentarios");
	
	$stmt->execute();
	$retorno = $stmt->fetch(PDO::FETCH_ASSOC);
	return $retorno;
}
function listarComentariosFull($id)
{
	$conn = conectar();
	$stmt = $conn->prepare("select sug 
							from comentarios
							where id =:id
							order by id");
	$stmt->bindParam(':id',$id);
	$stmt->execute();
	$retorno = $stmt->fetch(PDO::FETCH_ASSOC);
	return $retorno;
}

function editarComentario($dados)
{	
	//formata de json para array
	$dados = json_decode($dados);
	$conn = conectar();
	$stmt = $conn->prepare(
		'UPDATE comentarios 
	  	 set sug = :sug
		 where id = :id'
	);
	$stmt->bindParam(':sug', $dados->sug);
	$stmt->bindParam(':id', $dados->id);
	if ($stmt->execute()) {
		return "Comentario alterado com sucesso!";
	} else {
		print_r($stmt->errorInfo());
		return "erro! ";
	}
}
function apagarComentario($dados)
{	
	$dados = json_decode($dados);
	$conn = conectar();
	$stmt = $conn->prepare(
		'DELETE FROM comentarios 
		 where id = :id'
	);
	$stmt->bindParam(':id', $dados->id);
	if ($stmt->execute()) {
		return "Comentario apagado com sucesso!";
	} else {
		print_r($stmt->errorInfo());
		return "erro! ";
	}
}
