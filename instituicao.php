<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Concurso</title>
    <?php include_once('conexao.php'); ?>
  </head>
  <body>
    <?php include_once('header.php'); ?>
    <div class="container">      
      <div class="col">        
        <h1>Cadastre uma Instituição</h1>
        <div class="resp"></div>
        <form name="formulario" method="post">
          <div class="form-group">
            <input type="text" class="form-control" id="nomeInstituicao" name="nomeInstituicao" placeholder="Digite o nome da Instituição">
          </div>
          <button type="submit" class="btn btn-primary" placeholder="cadastrar">Cadastrar</button>
        </form>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script>
        let formulario = $('form[name=formulario]');        
        $('button[type=submit]').click(function(evento){
            
            let array = formulario.serializeArray();
            let nomeInstituicao = $('#nomeInstituicao').val();
            /*PASSANDO OS DADOS ARMAZENADOS PARA UM ARRAY JSON*/
            if(array[0].value == ''){
                $('.resp').html('<div class="alert alert-info"><p>Preeencha o formulário corretamente.</p></div>');
            }else{                
                let request = $.ajax({
                    url: "forms/cadastrarinstituicao.php",
                    method: "POST",
                    data: { instituicao : nomeInstituicao },
                    dataType: "json",
                    beforeSend: function(){
                        $('.resp').html('<div class="alert alert-warning" role="alert"><p>Aguarde enquanto enviamos seu cadastro.</p></div>');
                    }
                }).done(function( valor ) {
                    if(valor.erro == 'sim'){
						$('.resp').html('<div class="alert alert-danger" role="alert"><p>'+valor.getErro+'</p></div>');
					}
					else{
						$('.resp').html('<div class="alert alert-success" role="alert"><p>'+valor.mensagem+'</p></div>');
						
						setTimeout(function () {
							window.location.href = "instituicao.php";
						}, 3000);			
					}
                });       
                
                request.fail(function( jqXHR, errorThrown  ) {
                    alert( "Request failed: " + errorThrown );
                });    
            }                
            evento.preventDefault();
        });
    </script>
  </body>
</html>