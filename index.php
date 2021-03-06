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
      <div class="row"> 
        <div class="col-md-9">       
          <h1>Cadastro de Questões</h1>
        </div>
        <div class="col-md-3">
          <?php
            $qntQuestoes = $pdo->prepare("SELECT * FROM questao");
            $qntQuestoes->execute();
            if($mostrarQtdQuestoes = $qntQuestoes->fetch(PDO::FETCH_OBJ)){                                          
          ?>
          <div class="alert alert-secondary float-right">   
            <span><?echo $mostrarQtdQuestoes->idQuestao; ?> Inserida(s)</span>
          </div>
          <?php } ?>  
        </div>
      </div>
    </div>
    <div class="container">      
      <div class="col">        
        <div class="resp"></div>
        <form name="formulario" method="post">
          <div class="form-group">
            <textarea rows="4" cols="50" name="questao" class="form-control" placeholder="Digite o enunciado da questão"></textarea>
          </div>

          <div class="form-group">
            <select name="banca" class="form-control">
              <option value="">Banca</option>
              <?php
                $inserir_banco = $pdo->prepare("SELECT * FROM banca");
                $inserir_banco->execute();
                while($mostrar = $inserir_banco->fetch(PDO::FETCH_OBJ)){                            
              ?>
              <option value="<?php echo $mostrar->idBanca ?>"><?php echo utf8_encode($mostrar->nomeBanca);?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group">
            <select name="instituicao" class="form-control">
              <option value="">Instituição</option>
              <?php
                $inserir_banco = $pdo->prepare("SELECT * FROM instituicao");
                $inserir_banco->execute();
                while($mostrar = $inserir_banco->fetch(PDO::FETCH_OBJ)){                            
              ?>
              <option value="<?php echo $mostrar->idInstituicao ?>"><?php echo utf8_encode($mostrar->nomeInstituicao);?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group">
            <select name="modalidade" class="form-control">
              <option value="">Modalidade</option>
              <?php
                $inserir_banco = $pdo->prepare("SELECT * FROM modalidade");
                $inserir_banco->execute();
                while($mostrar = $inserir_banco->fetch(PDO::FETCH_OBJ)){                            
              ?>
              <option value="<?php echo $mostrar->idModalidade ?>"><?php echo utf8_encode($mostrar->nomeModalidade);?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group">
            <select name="area-de-atuacao" class="form-control">
              <option value="">Área de Atuação</option>
              <?php
                $inserir_banco = $pdo->prepare("SELECT * FROM areadeatuacao");
                $inserir_banco->execute();
                while($mostrar = $inserir_banco->fetch(PDO::FETCH_OBJ)){                            
              ?>
              <option value="<?php echo $mostrar->idAreaDeAtuacao ?>"><?php echo utf8_encode($mostrar->nomeAreaDeAtuacao);?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group">
            <select name="disciplina" class="form-control">
              <option value="">Disciplina</option>
              <?php
                $inserir_banco = $pdo->prepare("SELECT * FROM disciplina");
                $inserir_banco->execute();
                while($mostrar = $inserir_banco->fetch(PDO::FETCH_OBJ)){                            
              ?>
              <option value="<?php echo $mostrar->idDisciplina ?>"><?php echo utf8_encode($mostrar->nomeDisciplina);?></option>
              <?php } ?>
            </select>
          </div>
        </form>

        <form name="formularioAssunto" action="forms/buscarAssunto.php">
          <input type="hidden" id="idDisciplina" placeholder="">
        </form>

        <form name="respostas" action="forms/cadastrarresposta.php" style="display:none">
          <select name="valorResposta" class="form-control">
            <option value="">Escolha a resposta:</option>              
            <option value="1">Certo</option>
            <option value="2">Errado</option>
          </select>
        </form>      
      </div>
      <div class="col">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <!-- AJAX ASSUNTO DINÂMICO -->
    <script>
      let formularioAssunto = $('form[name=formularioAssunto]');
      let idDisciplinaSelecionada;
      $('select[name=disciplina]').change(function(){
        idDisciplinaSelecionada = $('select[name=disciplina] option:selected').val();
        $('#idDisciplina').val(idDisciplinaSelecionada);
        $.ajax({
          url: "forms/buscarassunto.php",
          method: "POST",
          data: { disciplinaSelecionada : idDisciplinaSelecionada },
          dataType: "json"
        })
        .done(function( jsonData ) {
          if(jsonData.erro == 'sim'){
            $('.resp').html('<div class="alert alert-danger" role="alert"><p>'+jsonData.getErro+'</p></div>');
          }
          else{
            //PARA CADA OBJETO DENTRO DO JSON MULTIDIMENSIONAL, EXIBE A CHAVE E VALOR E FAZ UM APPEND NO OPTION DO SELECT ASSUNTO
            let appendOption = [];
            let incremento = 0;         
            $('select[name=assunto]').css('display','block')   
            $('select[name=assunto]').html('');
            for(var obj in jsonData){
              if(jsonData.hasOwnProperty(obj)){
                for(var prop in jsonData[obj]){
                  if(jsonData[obj].hasOwnProperty(prop)){
                    appendOption.push(prop, jsonData[obj][prop])
                    //$('.resp').append('<div class="alert alert-success" role="alert"><p>' + prop + ':' + jsonData[obj][prop] + '</p></div>');
                  }
                }
                $('select[name=assunto]').append(`<option value"${appendOption[1+incremento]}">`+ appendOption[3+incremento] + '</option>');
              }
              incremento += 4;
            }            
          }
        })              
        .fail(function( jqXHR, errorThrown  ) {
          alert( "Falha na requisição: " + errorThrown );
        });             
        evento.preventDefault();
      });
    </script>
    <!-- AJAX QUESTAO -->
    <script>     
      let formulario = $('form[name=formulario]');        
      $('button[type=submit]').click(function(evento){          
        let array = formulario.serializeArray();

        let nomeQuestao = $('input[name=questao]').val();
        let idBanca = $('select[name=banca] option:selected').val();
        let idInstituicao = $('select[name=instituicao] option:selected').val();
        let idModalidade = $('select[name=modalidade] option:selected').val();
        let idAreaDeAtuacao = $('select[name=area-de-atuacao] option:selected').val();        
        let idDisciplina = $('select[name=disciplina] option:selected').val();
        let idAssunto = $('select[name=assunto] option:selected').val();

        /*PASSANDO OS DADOS ARMAZENADOS PARA UM ARRAY JSON*/
        let verifica = 1; 
        while(verifica <= array.lenght){
          if(array[verifica].value == ''){
            $('.resp').html('<div class="alert alert-info"><p>Preeencha o formulário corretamente.</p></div>');
            break;
          }
          verifica++;
        }              
        let request =
        $.ajax({
          url: "forms/cadastrarquestao.php",
          method: "POST",
          data: { questao : nomeQuestao, banca : idBanca, instituicao : idInstituicao, modalidade : idModalidade, areaDeAtuacao : idAreaDeAtuacao, disciplina : idDisciplina, assunto : idAssunto },
          dataType: "json",
          beforeSend: function(){
            $('.resp').html('<div class="alert alert-warning" role="alert"><p>Aguarde enquanto enviamos seu cadastro.</p></div>');
          }
        })
        .done(function( retorno ) {
          if(retorno.erro == 'sim'){
            $('.resp').html('<div class="alert alert-danger" role="alert"><p>'+retorno.getErro+'</p></div>');
          }
          else{
            $('.resp').html('<div class="alert alert-success" role="alert"><p>'+retorno.mensagem+'</p></div>');
            $('form[name=respostas]').submit(function(eventoRespostas){
              eventoRespostas.preventDefault();
              $('form[name=respostas]').submit();
            });
            setTimeout(function () {
              window.location.href = "index.php";
            }, 3000);
          }
        })              
        .fail(function( jqXHR, errorThrown  ) {
          alert( "Falha na requisição: " + errorThrown );
        });             
        evento.preventDefault();
      });
    </script>

    <!-- AJAX RESPOSTA-->
    <script>
    $('select[name=modalidade]').change(function(){    
      // RESPOSTA CERTO ERRADO  
      if($('select[name=modalidade] option:selected').val() == 1){
        $('form[name=respostas]').css('display','block');        
      }else{
        // RESPOSTA MULTIPLA ESCOLHA
        alert('Modalidade inativa. Aguarde uma nova versão do sistema!');
      }
    });
    </script>
  </body>
</html>