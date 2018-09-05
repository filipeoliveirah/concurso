<?php 
include_once('../conexao.php');
    $respostas = array();  
    $instituicao = $_POST['instituicao'];
    $inserir_banco = $pdo->prepare("INSERT INTO instituicao SET nomeInstituicao = ?");
    $nomeInstituicao = preg_replace('/[^:alnum:]-]/','',$novos_campos['nomeInstituicao']);  
    $array_sql = array(
        utf8_decode($instituicao)
    );
    if($inserir_banco->execute($array_sql)){
        $respostas['erro'] = 'nao';
        $respostas['mensagem'] = 'Instituição inserida com sucesso!';
    }
    else{
        $respostas['erro'] = 'sim';
        $respostas['getErro'] = 'Não foi possível inserir sua Instituição.';
    }
    echo json_encode($respostas);

?>