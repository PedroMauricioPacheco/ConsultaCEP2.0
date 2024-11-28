<?php
    include 'conexaoBanco.php';
    $sql_consulta = "SELECT * FROM `informacoes_consultas`";

    $resposta = $conexao -> query($sql_consulta);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas feitas</title>
    <!-- CSS !-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../CSS/cadastros.css" rel="stylesheet">
    <!--Script-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <!--Fonte-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!--FontAwsome-->
    <script src="https://kit.fontawesome.com/17c127de13.js" crossorigin="anonymous"></script>
</head>
<body>
        <header>
        <nav class="navbar navbar-expand-lg text-bg-primary p-3 ">
             <div class="container-md"> 
               <a class="navbar-brand" href="index.php">Página Inicial <i class="fa-solid fa-house"></i></a>
             </div>
        </nav>
    </header>
    <main>
        <h3 class=" main-title text-center">Registro de Consultas</h3>
        <div class="filtros">
            <!-- Formulário pra filtrar em ordem crescente -->
            <form action="cadastros.php" method="get">
            <input name="action" type="hidden" value="crescente">
            <button type="submit" class="btn btn-primary" name="filtrar" >Crescente</button>
            </form>
            <?php
                $action = $_GET['action'] ?? '';
                if($action == 'crescente'){
                    $consulta_crescente = "SELECT * FROM informacoes_consultas ORDER BY estado ASC";
                    $consulta_crescente = $conexao->prepare($consulta_crescente);
                    $consulta_crescente->execute();
                    $resposta = $consulta_crescente->fetchAll(PDO::FETCH_ASSOC);
                }
            ?>
        </div>
        <!-- Tabela que mostra os registros -->
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">CEP</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Bairro</th>
                    <th scope="col">Rua</th>
                    <th scope="col">Data 1° Consulta</th>
                    <th scope="col">Data Ultima Consulta</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop que exibe o resulado da consulta -->
                    <?php
                        foreach ($resposta as $value) { //
                            echo "<tr>";
                            echo "<td>" . $value['cep'] . "</td>";
                            echo "<td>" . $value['estado'] . "</td>";
                            echo "<td>" . $value['cidade'] . "</td>";
                            echo "<td>" . $value['bairro'] . "</td>";
                            echo "<td>" . $value['rua'] . "</td>";
                            echo "<td>" . $value['data_criacao'] . "</td>";
                            echo "<td>" . $value['data_alteracao'] . "</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
    </main>
</body>
</html>