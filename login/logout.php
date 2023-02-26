<?php
session_start();
session_unset();
session_destroy();
//redirecionando o ususario 
header('location: index.php');
