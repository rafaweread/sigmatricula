<?php
//Controlador de sessão, será mostrado a tela de index apenas se o usuário efetuar login.
session_start();

if(isset($_SESSION['id']) && empty($_SESSION['id']) == false){


}else{

	header("Location: login.php");
}

?>

<?php

require '_dao/config.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Página Principal</title>
	<link rel="stylesheet" type="text/css" href="_bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="_font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="_css/stylesheet">
</head>
<body>
	<header id="cabecalho">
		
	</header>
	<div id="principal"><br />
		<a href="_controller/adicionar.php" class="btn btn-primary">Adicionar Novo Usuário</a><br/><br/>

		<table border="0" width="100%"> 
			<tr>
				<th>Nome</th>
				<th>E-mail</th>
				<th>Ações</th>
			</tr>

			<?php
			$sql = "select * from usuarios";
			$sql = $pdo->query($sql);
			if($sql->rowCount() > 0){
				foreach ($sql->fetchAll() as $usuario) {
					echo '<tr>';
					echo '<td>'.$usuario['nome'].'</td>';
					echo '<td>'.$usuario['email'].'</td>';
					echo '<td><a class="btn btn-primary" href="_controller/editar.php?id='.$usuario['id'].'">Editar</a> - <a class="btn btn-danger" href="_controller/excluir.php?id='.$usuario['id'].'">Excluir</a></td>';
					echo '</tr>';
				}
			}	 
			?>
		</table><br /><br />
		<div>
			<a href="_controller/sair.php"><i class="fa fa-sign-out" aria-hidden="true">Sair</i></a>
		</div>	
	</div>
	
</body>
</html>
