<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    //conexão
    require_once("conexão.php");
    //sessao
    session_start();
    if(isset($_POST['b'])){
        $erros = array();
        $login = mysqli_escape_string($connect, $_POST['login']);
        $senha = mysqli_escape_string($connect, $_POST['senha']);
        if(empty($login) or empty($senha)){
            $erros[] = 'o campo login/senha esta incorreto ';
        }
        else{
            //conferir se existe um usuario com o login no banco de dados 
            $sql = "SELECT FROM login  WHERE login = '$login'";
           //armazenamento da consulta
            $resultado = mysqli_query($connect, $sql);
            
            if(mysqli_fetch_row($resultado) > 0 ){
                $s= md5($senha);
                $sql = "SELECT * FROM  usuarios   WHERE login = '$login' and senha = '$senha'";
                $resultado = mysqli_query($connect, $sql);
                if(mysqli_fetch_row($resultado) == 1 ){
                   $dados =  mysqli_fetch_array($resultado);
                   // fechar a conexão depois de consultar o banco de dados -->

                   mysqli_close($connect);
                   $_SESSION['logado '] = true ;
                   $_SESSION['id_usuario'] = $dados['id'];
                   header('location: home.php');
                }

            }
        }    
    }    
    ?>
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
    username : <input type="text" name="login " ><br>
    password: <input type="password" name = "senha"><br>
     <input type="submit" name = "b">

</form>
</body>
</html>