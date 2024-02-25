<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="functions.js"></script>
    <title>Detahes</title>
</head>

<body>
    <?php
    include_once("functions.php");

    $id = $_GET['id'];
    $comentario = listarComentariosFull($id);
    ?>
    <script>
        let textoComentario = `<?= $comentario['sug'] ?>`;
        //textoComentario = str_replace(array("\r", "\n"),'',textoComentario);
        var id = "<?= $id ?>";        
    </script>
    <div class="container-md">
        <div class="card">
            <div class="card-body">
                <?= $comentario['sug'] ?>
                </br></br>
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <button type="button" class="btn btn-outline-primary"
                    onclick="apagarComentario()" >
                    Apagar
                    </button>

                    <button type="button" class="btn btn-outline-primary" 
                    onclick="insereComentarios(textoComentario)">
                        Editar
                    </button>
                    <a href="comentarios.php">
                    <button type="button" class="btn btn-outline-primary">Voltar</button>
                    </a>
                </div>
                <div class="form-floating">


             <textarea class="form-control" id="comentario" 
             placeholder="Comentário" id="floatingTextarea2" style="height: 100px">
             </textarea>
             
             <button type="submit" id="btnSalvar" class="btn btn-outline-primary" 
             onclick="atualizarComentario()"
             >
                Salvar
             </button>
             <script>
                escondeTextArea();
             </script>
             </div>
            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
    function atualizarComentario()
    {
        atualizaComentario(id);
    }
    function apagarComentario()
    {        
        deleteComentario(id);
    }
    </script>
</body>

</html>