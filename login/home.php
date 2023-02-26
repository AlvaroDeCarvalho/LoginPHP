<?php
require_once('conexão.php');
session_start();
if(!isset($_SESSION['logado'])){
    header('location: index.php');

$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuario WHERE id = '$id'";

$resultado= mysqli_query($connect,$sql);
$dados = mysqli_fetch_array($resultado);
//fecha a conexão 
mysqli_close($connect);

}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pagina secreta</title>
</head>
<body>
    <h1>Ola <?php echo  $_dados['nome'];?></h1>
    <a href="logout.php">sair</a>
</body>
</html>