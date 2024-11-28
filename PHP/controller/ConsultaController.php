<?php
include ('../conexaoBanco.php');

$salvei ='';

$action = $_POST['action'] ?? ''; //Pega a ação do formulário


if ($action == 'salvar') { //Se a ação for salvar, pega os valores do formulário e armazena na variável
    $cep = $_POST['cep'] ?? '';
    $estado = $_POST['estado'] ?? '';
    $cidade = $_POST['cidade'] ?? '';
    $bairro = $_POST['bairro'] ?? '';
    $rua = $_POST['rua'] ?? '';

    //Faz a contagem de quantos CEPs iguais já existem no banco
    $checar = "SELECT COUNT(*) FROM informacoes_consultas WHERE cep = ?";
    $checar = $conexao->prepare($checar);
    $checar->bindParam(1, $cep, PDO::PARAM_STR);
    $checar->execute();
    $existe = $checar->fetchColumn();

    //SE $existe contar 1 então o CEP já existe, gera uma query para atualizar a data de ultima consulta
    if ($existe >0) {
        $atualiza = "UPDATE informacoes_consultas SET data_alteracao = NOW() WHERE cep = ?";
        $fazerAtualizacao = $conexao->prepare($atualiza);
        $fazerAtualizacao->bindParam(1, $cep, PDO::PARAM_STR);
        $fazerAtualizacao->execute();
        header("Location: ../index.php");
        
    }
    //SE não existe, armazena a consulta no banco
    else {
        $query= "INSERT INTO informacoes_consultas (cep, estado, cidade, bairro, rua) VALUES (?, ?, ?, ?, ?)";
        $conexao = $conexao->prepare($query);
        $conexao->bindParam(1, $cep, PDO::PARAM_STR);
        $conexao->bindParam(2, $estado, PDO::PARAM_STR);
        $conexao->bindParam(3, $cidade, PDO::PARAM_STR);
        $conexao->bindParam(4, $bairro, PDO::PARAM_STR);
        $conexao->bindParam(5, $rua, PDO::PARAM_STR);
        $conexao->execute();
        header("Location: ../index.php");
    }
}
