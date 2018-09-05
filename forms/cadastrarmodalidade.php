<?php 
include_once('../conexao.php');
    $respostas = array();  
    $modalidade = $_POST['modalidade'];
    $inserir_banco = $pdo->prepare("INSERT INTO modalidade SET nomeModalidade = ?");
    $nomeModalidade = preg_replace('/[^:alnum:]-]/','',$novos_campos['nomeModalidade']);  
    $array_sql = array(
        utf8_decode($modalidade)
    );
    if($inserir_banco->execute($array_sql)){
        $respostas['erro'] = 'nao';
        $respostas['mensagem'] = 'Modalidade inserida com sucesso!';
    }
    else{
        $respostas['erro'] = 'sim';
        $respostas['getErro'] = 'Não foi possível inserir sua Modalidade.';
    }
    echo json_encode($respostas);

?>