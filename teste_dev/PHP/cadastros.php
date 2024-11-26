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
               <a class="navbar-brand" href="index.php">Ultra Consultas <i class="fa-solid fa-magnifying-glass"></i></a>
             </div>
        </nav>
    </header>
    <main>
        <h1 class="text-center">Registro de Consultas</h1>
        <div class="filtros">
            <button type="button" class="btn btn-primary">Crescente</button><button type="button" class="btn btn-primary">Decrescente</button>
        </div>
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