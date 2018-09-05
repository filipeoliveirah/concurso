<?php
//https://jonsuh.com/blog/convert-loop-through-json-php-javascript-arrays-objects/ 
//include_once('../conexao.php');
$idDisciplinaSelecionada = $_POST["disciplinaSelecionada"];
// Connect to the database
  // replace the parameters with your proper credentials
  $connection = mysqli_connect("localhost:8889", "root", "root", "concurso");

  // Query to run
  $query = mysqli_query($connection, "SELECT * FROM assunto WHERE disciplina_idDiscipplina = '" . $idDisciplinaSelecionada . "'");

  // Create empty array to hold query results
  $someArray = [];

  // Loop through query and push results into $someArray;
  while ($row = mysqli_fetch_assoc($query)) {
    array_push($someArray, [
      'name'   => $row['idAssunto'],
      'gender' => $row['nomeAssunto']
    ]);
  }

  // Convert the Array to a JSON String and echo it
  $someJSON = json_encode($someArray);
  echo $someJSON;

    //        $respostas['erro'] = 'sim';
    //$respostas['getErro'] = 'Não encontramos assuntos relacionados.';
?>
              