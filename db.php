<?php

date_default_timezone_set('America/Sao_Paulo');

$servidor = "localhost";
$usuario = "root";
$senha = "";
$db = "controle";

 // $servidor = "sql188.main-hosting.eu";
 // $usuario = "u174648612_tiago";
 // $senha = "Tt@1oumais";
 // $db = "u174648612_db";

// $servidor = "sql210.epizy.com";
// $usuario = "epiz_23375004";
// $senha = "Nl3VZqUpJ";
// $db = "epiz_23375004_db";

$conexao = mysqli_connect($servidor, $usuario, $senha, $db) or die('Erro.');

$query = "SELECT * FROM entrada";
$consulta = mysqli_query($conexao, $query) or die('Erro 2.');

?>