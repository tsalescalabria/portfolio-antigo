<?php
include 'db.php';

$usuario = addslashes($_POST['usuario']);
$senha = addslashes($_POST['senha']);

$query = "SELECT * FROM usuarios WHERE usuario = '$usuario' and senha ='$senha'";

$consulta = mysqli_query($conexao, $query);

if( mysqli_num_rows($consulta) == 1 ){
	session_start();
	unset($_SESSION["invalido"]);
	$_SESSION["login"] = "logado";
	$_SESSION["user"] = $usuario;
	header('location:administracao.php');
}
else{
	session_start();
	$_SESSION["invalido"] = 'erro';
	header('location:login.php');

 

/*?>
	<h2>Usuário ou Senha inválidos</h2>
	<a class=" btn btn-secondary mt-5" href="login.php">Voltar</a>
<?php*/
};