    <?php 
include_once('../conexao.php');
    $respostas = array();
    $questao = $_POST['questao'];
    $banca = $_POST['banca'];
    $areaDeAtuacao = $_POST['areaDeAtuacao'];
    $instituicao = $_POST['instituicao'];
    $disciplina = $_POST['disciplina'];
    $modalidade = $_POST['modalidade'];

    $inserir_banco = $pdo->prepare("INSERT INTO questao SET nomeQuestao = ?, banca_idBanca = ?, areaDeAtuacao_idAreaDeAtuacao = ?, 
    instituicao_idInstituicao = ?, disciplina_idDisciplina = ?, modalidade_idModalidade = ?");  
    $array_sql = array(
        utf8_decode($questao),
        $banca,
        $areaDeAtuacao,
        $instituicao,
        $disciplina,
        $modalidade

    );
    if($inserir_banco->execute($array_sql)){
        $respostas['erro'] = 'nao';
        $respostas['mensagem'] = 'Questão inserida com sucesso!';
    }
    else{
        $respostas['erro'] = 'sim';
        $respostas['getErro'] = 'Não foi possível inserir a questão';
    }
    echo json_encode($respostas);

?>