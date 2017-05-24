<?php
	require '../_dao/config.php';

	$id = 0;
	//verificação se existe id na URL 
	if(isset($_GET['id']) && empty($_GET['id']) == false){
		$id = addslashes($_GET['id']);
	}
	//Verifica se o usuário digitol algum nome
	if (isset($_POST['nome']) && empty($_POST['nome']) == false){
		//Metódo de segurança para evitar sql injection, separa cada comando pro "\"
		$nome = addslashes($_POST['nome']);
		$email = addslashes($_POST['email']);
		//Meu sql com ação desejada
		$sql = "UPDATE usuarios SET nome='$nome', email='$email' WHERE id='$id'";
		//Executando a query por meio da config.php
		$pdo->query($sql);
		//retorna para index
		header("Location: ../index.php");
	}

	$sql = "SELECT * FROM usuarios WHERE id='$id'";
	$sql = $pdo->query($sql);
	if($sql->rowCount() > 0){
		$dado = $sql->fetch();
	}else{

		header("Location: ../index.php");
	}

?>

<form method="POST">
	Nome:<br/>
	<input type="text" name="nome" value="<?php echo $dado['nome']; ?>" /><br/><br/>
	E-mail:<br/>
	<input type="text" name="email" value="<?php echo $dado['email'];?>" /><br/><br/>

	<input type="submit" value="Atualizar" />
</form>