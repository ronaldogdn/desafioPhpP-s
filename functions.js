function insereComentarios(comentarios) {
    document.querySelector("textarea").style.display = "inline";
    document.getElementById("btnSalvar").style.display = "inline";
    let area = document.querySelector("textarea");
    area.value=comentarios;
}
function escondeTextArea() {
    document.querySelector("textarea").style.display = "none";
    document.getElementById("btnSalvar").style.display = "none";
}
function atualizaComentario(id) {
    /*let comentario = $("#comentario").val();
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost/wxr/updateComentario.php");
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    const dados = JSON.stringify({
        "id" : id,
        "sug" : comentario
    });
    xhr.onload = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
          console.log(JSON.parse(xhr.responseText));
        } else {
          console.log(`Error: ${xhr.status}`);
        }
      };
    xhr.send(dados);*/
    let comentario = $("#comentario").val();
       
    $.ajax({
        url: 'http://localhost/wxr/updateComentario.php',
        type: 'POST',
        data: {
            "id": id,
            "sug": comentario
        },
        success: function(result){
          console.log(result);
        },
        error: function(xhr, status, errorT) {
            console.log("Erro ao salvar: ", xhr.response);
        }
    });

    escondeTextArea();
    
}
function deleteComentario(id)
{
  $.ajax({
    url: 'http://localhost/wxr/deleteComentario.php',
    type: 'POST',
    data: {
        "id": id
    },
    success: function(result){
      console.log(result);
    },
    error: function(xhr, status, errorT) {
        console.log("Erro ao salvar: ", xhr.response);
    }
  });
}