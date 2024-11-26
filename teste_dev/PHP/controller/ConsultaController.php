<?php
include ('../conexaoBanco.php');

$salvei ='';

$action = $_POST['action'];

if ($action == 'salvar') {
    $cep = $_POST['cep'] ?? '';
    $estado = $_POST['estado'] ?? '';
    $cidade = $_POST['cidade'] ?? '';
    $bairro = $_POST['bairro'] ?? '';
    $rua = $_POST['rua'] ?? '';

    $checar = "SELECT COUNT(*) FROM informacoes_consultas WHERE cep = ?";
    $checar = $conexao->prepare($checar);
    $checar->bindParam(1, $cep, PDO::PARAM_STR);
    $checar->execute();
    $existe = $checar->fetchColumn();

    if ($existe >0) {
        $atualiza = "UPDATE informacoes_consultas SET data_alteracao = NOW() WHERE cep = ?";
        $fazerAtualizacao = $conexao->prepare($atualiza);
        $fazerAtualizacao->bindParam(1, $cep, PDO::PARAM_STR);
        $fazerAtualizacao->execute();
        
    }
    else {
        $query= "INSERT INTO informacoes_consultas (cep, estado, cidade, bairro, rua) VALUES (?, ?, ?, ?, ?)";
        $conexao = $conexao->prepare($query);
        $conexao->bindParam(1, $cep, PDO::PARAM_STR);
        $conexao->bindParam(2, $estado, PDO::PARAM_STR);
        $conexao->bindParam(3, $cidade, PDO::PARAM_STR);
        $conexao->bindParam(4, $bairro, PDO::PARAM_STR);
        $conexao->bindParam(5, $rua, PDO::PARAM_STR);
        $conexao->execute();
    }
}
header("Location: ../index.php");
