<?php
  //https://jonsuh.com/blog/convert-loop-through-json-php-javascript-arrays-objects/ 
  include_once('../conexao.php');
  $idDisciplinaSelecionada = $_POST["disciplinaSelecionada"];

  // Query to run
  $buscarBanco = $pdo->prepare("SELECT * FROM assunto WHERE disciplina_idDiscipplina = ?");
  $array_sql = array(
    $idDisciplinaSelecionada
  );


  // Loop through query and push results into $someArray;

  if($buscarBanco->execute($array_sql)){
    while ($stmt->fetch(PDO::FETCH_OBJ)){
      array_push($someArray, [
        'idAssunto'   => $row['idAssunto'],
        'nomeAssunto' => $row['nomeAssunto']
      ]);
    }
    echo json_encode($someArray);
  }
  else{
    $respostas['erro'] = 'sim';
    $respostas['getErro'] = 'Não foi possível encontrar um assunto.';
    echo json_encode($respostas);
  }
  // Convert the Array to a JSON String and echo it


    //        $respostas['erro'] = 'sim';
    //$respostas['getErro'] = 'Não encontramos assuntos relacionados.';
?>
              