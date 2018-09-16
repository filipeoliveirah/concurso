<?php
  //https://jonsuh.com/blog/convert-loop-through-json-php-javascript-arrays-objects/ 
  //https://codereview.stackexchange.com/questions/61013/getting-multiple-keys-values-from-nested-object-in-json-w-out-jquery/61015
  //header("Content-type: application/json; charset=utf-8");
  //https://stackoverflow.com/questions/8430336/get-keys-of-json-object-in-javascript/8430588#8430588

  include_once('../conexao.php');
  $idDisciplinaSelecionada = $_POST["disciplinaSelecionada"];
  $respostas = array();
  $data = array();
  // Query to run

  //if( isset($_POST['disciplinaSelecionada']) ){
    $buscarBanco = $pdo->prepare("SELECT idAssunto, nomeAssunto FROM assunto WHERE disciplina_idDisciplina = ?");
    $array_sql = array(
      $idDisciplinaSelecionada
    );
    
    if($buscarBanco->execute($array_sql)){
      while ($resposta = $buscarBanco->fetch(PDO::FETCH_ASSOC)){
        $respostas[] = array_map('utf8_encode', $resposta);
        //$data = $resposta;
      }
      $resultado = json_encode($respostas);
      echo $resultado;
    }
    else{
      $respostas['erro'] = 'sim';
      $respostas['getErro'] = 'Não foi possível encontrar um assunto.';
      echo json_encode($respostas);
    }
  //}
?>
              