<?php
require '../_dao/config.php';

if(isset($_POST['nome']) && empty($_POST['nome']) == false){
	$nome = addslashes($_POST['nome']);
	$email = addslashes($_POST['email']);
	$senha = md5(addslashes($_POST['senha']));

	$sql = "INSERT INTO usuarios SET nome='$nome', email='$email', senha='$senha'";
	$pdo->query($sql);

	header("location: ../index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Adicionar Usuário</title>
	<link rel="stylesheet" type="text/css" href="../_bootstrap/css/bootstrap.min.css">
</head>
<body>
	<legend>ADICIONAR USUÁRIO</legend>
	<fieldset>
		<form method="POST">
			Nome:<br/>
			<input type="text" name="nome" placeholder="Insira um nome"  required /><br/><br/>
			E-mail:<br/>
			<input type="text" name="email" /><br/><br/>
			Senha:<br/>
			<input type="password" name="senha" placeholder="Digite uma senha" required /><br/><br/>
			<input class="btn btn-success" type="submit" value="Cadastrar" />
		</form>
	</fieldset>
</body>
</html>
