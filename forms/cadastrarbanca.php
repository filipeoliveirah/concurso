<?php 
include_once('../conexao.php');
    $respostas = array();  
    $banca = $_POST['banca'];
    $inserir_banco = $pdo->prepare("INSERT INTO banca SET nomeBanca = ?");
    $nomeBanca = preg_replace('/[^:alnum:]-]/','',$novos_campos['nomeBanca']);  
    $array_sql = array(
        utf8_decode($banca)
    );
    if($inserir_banco->execute($array_sql)){
        $respostas['erro'] = 'nao';
        $respostas['mensagem'] = 'Banca inserida com sucesso!';
    }
    else{
        $respostas['erro'] = 'sim';
        $respostas['getErro'] = 'Não foi possível inserir sua Banca.';
    }
    echo json_encode($respostas);

?>