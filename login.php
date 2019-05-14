<head>
<link rel="stylesheet" type="text/css" href="css/estilo2.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href ="js/bootstrap.min.js">
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

<style>
	body{
	background-image: url(img/teclado1.jpg);
	background-position: center top;
	background-repeat: no-repeat;
	background-size: cover;
	background-attachment: fixed;
	}

</style>
<?php
session_start();
include 'db.php';

?>
</head>
<body>
<section >
<div class="container">
	<h1 class="text-center logo my-5">Login</h1>
	<?php
	// verifica se a variavel session['invalido'] existe, se existir mostra o erro
    if(isset($_SESSION["invalido"])){
    ?>

    <span class="h3 text-warning">Usuário ou Senha inválidos</span>

    <?php
    };
    ?>

	<form method="post" action="validarLogin.php">
		<label class="h2 text-white">Usuário</label>
		<input type="text" name="usuario" placeholder="Digite nome do usuário" class="form-control">

		<label class="mt-3 h2 text-white">Senha</label>
		<input type="password" name="senha"	 placeholder="Digite a senha" class="form-control">


		<input type="submit" value="Entrar" class="btn btn-danger mt-5">
		<a class=" btn btn-secondary mt-5" href="index.html">Voltar</a>
	</form>

	
</div>
</section>
<script>
jQuery(window).on('beforeunload', function(){           
    if(isset($_SESSION["invalido"])){
             unset($_SESSION["invalido"]);
          }; 
    });
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</body>