<?php
include 'db.php';
?>
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href ="js/bootstrap.min.js">
<link href="fontes/css/all.css" rel="stylesheet">



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
<script> $('.att').show(); </script>	
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


