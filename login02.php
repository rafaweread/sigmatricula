<?php
session_start();

if(isset($_POST['nome']) && empty($_POST['nome']) == false){
		
		$nome = addslashes($_POST['nome']);
		$senha = md5(addslashes($_POST['senha']));

		$con = "mysql:dbname=blog; host=127.0.0.1";
		$dbuser = "root";
		$dbpass = "";

		try{

			$db = new PDO($con, $dbuser, $dbpass);
			$sql = $db->query("SELECT * FROM usuarios WHERE nome = '$nome' AND senha = '$senha'");

			if($sql->rowCount() > 0){

				$dado = $sql->fetch();
				$_SESSION['id'] = $dado['id'];
				
				header("Location: index.php");
				//print_r($dado);
			}

		}catch(PDOException $e){

			echo "Falhou: ".$e->getMessage();
		}
}

?>

Pagina de Login

<form method="POST">
	Nome:<br/>
	<input type="nome" name="nome" /><br/><br/>

	Senha:<br/>
	<input type="password" name="senha" /><br/><br/>

	<input type="submit" value="Acessar" />
</form>