<?php 
include_once('../conexao.php');
    $respostas = array();  
    $assunto = $_POST['assunto'];
    $idDisciplina = $_POST['idDisciplina'];
    $inserir_banco = $pdo->prepare("INSERT INTO assunto SET nomeAssunto = ?, disciplina_idDisciplina = ?");     
    $array_sql = array(
        utf8_decode($assunto),
        $idDisciplina
    );
    if($inserir_banco->execute($array_sql)){
        $respostas['erro'] = 'nao';
        $respostas['mensagem'] = 'Assunto inserido com sucesso!';
    }
    else{
        $respostas['erro'] = 'sim';
        $respostas['getErro'] = 'Não foi possível inserir seu Assunto.';
    }
    echo json_encode($respostas);

?>