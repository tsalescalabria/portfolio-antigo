<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Thiago - Desenvolvedor Web</title>
<link rel="icon" 
      type="image/jpg" 
      href="img/thiago-icone.jpg" />
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href ="js/bootstrap.min.js">
<link rel="stylesheet" type="text/css" href ="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link href="fontes/css/all.css" rel="stylesheet">


<style>
	body{
	background-image: url(img/teclado1.jpg);
	background-position: center top;
	background-repeat: no-repeat;
	background-size: cover;
	background-attachment: fixed;
}
table.tabela{
	background-color: white;
	border-radius: 5px;
}
div#ferramentas{
	background-color:  #f2f2f2;
	border-radius: 5px;
}
label{
	color: white;
}
div#tab_info{
	color: white;
}
td{
	max-width: 350px;
}
.ferramentaMenu{
	box-shadow: 1px 3px 4px black;
	border-radius: 10px;
	max-height: 200px;
	margin: 10px;
}
div.att{
	display:none;
	text-align: center;
}
</style>
</head>
<!-- Body  -->
<body>
<!-- PHP -->
<?php
include 'db.php';

session_start();

if(($_SESSION["login"] == "logado")){}
else{
	header('location:index.html');
};
# ------ Bem vindo ---
echo '<h1 class="text-center my-5 text-white">Bem-vindo '.$_SESSION["user"].'</h1>';
?>
<!-- Caixa de Mensagens -->
<div class="text-white att">Atualizado!</div>
<div class="container-fluid text-white h3">
	Caixa de Mensagens 
	<button class="btn btn-secondary" id="btn_refresh"><i class="fas fa-redo-alt"></i></button>
	<a class="btn btn-danger" style="float:right" href="logout.php">Deslogar</a>
</div>
<div class="container-fluid" id="caixaMensagem">
<!-- TABELA -->
	<table class="table table-striped tabela" id="tab">
		<thead>
		<tr class="thead-dark">
			<th>Nome</th>
			<th>Email</th>
			<th>Mensagem</th>
			<th>Enviada</th>
		</tr>
		</thead>
		<tbody>
			<?php
				while($linha = mysqli_fetch_array($consulta)){
					echo '<tr><td>'.$linha['nome'].'</td>';
					echo '<td>'.$linha['email'].'</td>';
					echo '<td>'.$linha['mensagem'].'</td>';
					echo '<td>'.$linha['Enviado'].'</td></tr>';
				}
			?>
		</tbody>
	</table>
</div>
<!-- FERRAMENTAS -->
<div class="container" >
	<p class="text-white h2 mt-5">Ferramentas</p>
	<div id="ferramentas">
		<div class="mt-3">
			<a href="https://www.hostinger.com.br/cpanel-login" target="_blank"><img src="img/hostinger.png" class="img-fluid ferramentaMenu ml-4" alt="Responsive image" ></a>
			
			<a href="http://localhost/phpmyadmin/" target="_blank"><img src="img/phpmyadmin.jpg" class="img-fluid ferramentaMenu" alt="Responsive image" ></a>

			<a href="https://mail.google.com/mail/u/0/#inbox" target="_blank"><img src="img/gmail.jpg" class="img-fluid ferramentaMenu" alt="Responsive image" ></a>
			
		</div>
	</div>
	
</div>
<!-- Códigos JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-migrate-1.4.1.min.js"></script>
<!--<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>-->
<!-- AJAX -->
<script>
	function recarregar(){
		jQuery.ajax({
				type:"POST",
				datatype: 'html',
				url: 'recarrega.php',
				beforeSend:function(){
					jQuery("btn_refresh").html("Recarregando..")
				},
				success: function (retorno){
					jQuery('#caixaMensagem').html('');
					jQuery('#caixaMensagem').html(retorno);
					jQuery('#tab').DataTable();
					setTimeout(function(){
						jQuery('.att').hide('slow');
					},1000);
				},
				error: function(){
					alert('Houve algum erro!')
				} 
		})
	}

	jQuery("#btn_refresh").on('click', function(){
		recarregar();
	})
</script>
<!-- DataTable -->
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
	jQuery(document).ready( function () {
    	jQuery('#tab').DataTable({
      	  "order": [[ 3, "desc" ]]
  	 });
	} );
</script>
</body>
