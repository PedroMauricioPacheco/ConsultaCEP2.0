<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Consultar CEP</title>
    <!-- CSS !-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../CSS/style.css" rel="stylesheet">
    <!--Script-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
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
               <a class="navbar-brand" href="cadastros.php">Ultra Consultas <i class="fa-solid fa-magnifying-glass"></i></a>
            </div>
        </nav>
    </header>
        <main>
            <div class="d-flex justify-content-center">
                <span id="message"></span>
                <form  class="d-flex flex-column align-items-center" action="./controller/ConsultaController.php" method="post">
                    <h3>Informe o CEP</h3>
                    <input type="text" name="cep" class="form-control" placeholder="00000000" id="cep" aria-describedby="emailHelp">
                    <button type="button" onclick="calculo()" id="busca" class="btn btn-primary">Buscar</button>
                    <input type="text" name="estado" class="form-control" placeholder="Estado" id="estado" aria-describedby="emailHelp">
                    <input type="text" name="cidade" class="form-control" placeholder="Cidade" id="cidade" aria-describedby="emailHelp">
                    <input type="text" name="bairro" class="form-control" placeholder="Bairro" id="bairro" aria-describedby="emailHelp">
                    <input type="text" name="rua" class="form-control" placeholder="Rua" id="rua" aria-describedby="emailHelp">
                    <input name="action" type="hidden" value="salvar">
                    <button type="submit" class="btn btn-success" name="salvar" id="salvar" >Salvar</button>
                    <span id="mensagem"></span>
                
                </form>
            </div>
        </main>
    <script src="../JS/script.js"> </script>
</body>