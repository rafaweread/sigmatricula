<?php
	$con = "mysql:dbname=devStrong; host=localhost";
	$dbuser = "devStrong";
	$dbpass ="BQNDlK8t";

	try{
		$pdo = new PDO($con, $dbuser, $dbpass);
		
	}catch(PDOException $e){
		echo "Falhou a conexão: ".$e->getMessage();
	}
?>
