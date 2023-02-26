<?php

$local = 'localhost';
$username = 'root';
$senha = '';
$datebase = 'login';

$connect = mysqli_connect($local,$username, $senha, $datebase);
if(!empty(mysqli_error($connect))){
    echo 'erro de conexão';
}