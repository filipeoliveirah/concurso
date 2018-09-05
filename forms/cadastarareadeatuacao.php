<?php 
include_once('../conexao.php');
    $respostas = array();  
    $areaDeAtuacao = $_POST['areaDeAtuacao'];
    $inserir_banco = $pdo->prepare("INSERT INTO areadeatuacao SET nomeAreaDeAtuacao = ?");
    //$nomeAreaDeAtuacao = preg_replace('/[^:alnum:]-]/','',$novos_campos['nomeAreaDeAtuacao']);  
    $array_sql = array(
        utf8_decode($areaDeAtuacao)
    );
    if($inserir_banco->execute($array_sql)){
        $respostas['erro'] = 'nao';
        $respostas['mensagem'] = 'Área de Atuação inserida com sucesso!';
    }
    else{
        $respostas['erro'] = 'sim';
        $respostas['getErro'] = 'Não foi possível inserir sua Área de Atuação.';
    }
    echo json_encode($respostas);

?>