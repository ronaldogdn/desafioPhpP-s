<?php
    include_once("functions.php");
    $pagina = 1;
    
    if(isset($_GET['pagina'])){
      $pagina = filter_input(INPUT_GET,"pagina",FILTER_VALIDATE_INT);
    }
    else{
      $pagina = 1;
    }
    
    $limite = 5;
    $inicio = ($pagina * $limite) - $limite;

    $registros = totalRegistros();
    $registros = implode("",$registros);
    
    $paginas = ceil($registros / $limite);
    if($pagina > $paginas){
      $pagina = $paginas;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

  <title>Comentários</title>
</head>

<body>
  <?php
  include_once("functions.php");
  ?>
  <div class="container-md">
      <a href="index.html">
        <button type="button" class="btn btn-outline-primary">Voltar</button>
      </a>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Comentario</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $comentarios = listarComentarios($inicio);
        foreach ($comentarios as $comentario) {
        ?>
          <tr>
            <th scope="row"><?= $comentario['id'] ?></th>
            <td><?= $comentario['nome'] ?></td>
            <td><?= $comentario['comentario_inicial']." ..." ?></td>
            <td>
              <a href="detalhes.php?id=<?= $comentario['id'] ?>" class="btn btn-sm btn-outline-secondary">detalhes
              </a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item"><a class="page-link" href="?pagina=1">Primeira</a></li>
        <?php 
          $anterior = $pagina - 1;
          if($anterior == 0)
          {
        ?>
        <li class="page-item disabled"><a class="page-link" href="?pagina=<?=$anterior?>">Anterior</a></li>
        <?php    
          }else{
        ?>
        <li class="page-item"><a class="page-link" href="?pagina=<?=$anterior?>">Anterior</a></li>
        <?php
          }
          $valor = $pagina; 
          for($i = 1; $i <= 3; $i++)
          {    
            if($valor <= $paginas)
            {     
        ?>
        <li class="page-item"><a class="page-link" href="?pagina=<?=$valor?>"><?=$valor?></a></li>
        <?php 
            }
            else{
        ?>
        <li class="page-item disabled"><a class="page-link" href="?pagina=<?=$valor?>"><?=$valor?></a></li>
        <?php
            }        
          $valor++;
          }
        ?>
        <?php 
        if($pagina<$paginas)
        {
        ?>
        <li class="page-item"><a class="page-link" href="?pagina=<?=$pagina+1?>">Próxima</a></li>
        <li class="page-item"><a class="page-link" href="?pagina=<?=$paginas?>">Ultima</a></li>
        <?php 
        }
        else{
        ?>
          <li class="page-item disabled"><a class="page-link" href="?pagina=<?=$pagina+1?>">Próxima</a></li>
          <li class="page-item disabled"><a class="page-link" href="?pagina=<?=$paginas?>" >Ultima</a></li>
        <?php 
        }
        ?>
      </ul>
    </nav>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>