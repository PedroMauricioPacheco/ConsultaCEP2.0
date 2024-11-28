<?php 
try {
    $conexao = new PDO('mysql:host=localhost;dbname=consultas_cep', 'root', '');
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>