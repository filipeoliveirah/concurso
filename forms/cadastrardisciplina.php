<?php 
include_once('../conexao.php');
    $respostas = array();  
    $disciplina = $_POST['disciplina'];
    $inserir_banco = $pdo->prepare("INSERT INTO disciplina SET nomeDisciplina = ?");  
    $nomeBanca = preg_replace('/[^:alnum:]-]/','',$novos_campos['nomeDisciplina']);    
    $array_sql = array(
        utf8_decode($disciplina)
    );
    if($inserir_banco->execute($array_sql)){
        $respostas['erro'] = 'nao';
        $respostas['mensagem'] = 'Disciplina inserida com sucesso!';
    }
    else{
        $respostas['erro'] = 'sim';
        $respostas['getErro'] = 'Não foi possível inserir sua Disciplina.';
    }
    echo json_encode($respostas);

?>