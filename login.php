   <?php
   session_start();

   if(isset($_POST['nome']) && empty($_POST['nome']) == false){

    $nome = addslashes($_POST['nome']);
    $senha = md5(addslashes($_POST['senha']));

    $con = "mysql:dbname=devStrong; host=127.0.0.1";
    $dbuser = "devStrong";
    $dbpass = "BQNDlK8t";

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


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tela de Login</title>
    <link rel="stylesheet" type="text/css" href="_bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="_css/stylesheet_login.css">
</head>
<body>
    <div class="container">
    <h1 class="welcome text-center">SIGMATRICULA<br> 1.00</h1>
        <div class="card card-container">
            <h2 class='login_title text-center'>Login</h2>
            <hr>

            <form class="form-signin" method="POST">
                <span id="reauth-email" class="reauth-email"></span>
                <p class="input_title">Nome</p>

                <input type="text" id="inputEmail" name="nome" class="login_box" placeholder="Insira seu nome" required autofocus>

                <p class="input_title">Password</p>
                <input type="password" id="inputPassword" name="senha" class="login_box" placeholder="******" required>
                <div id="remember" class="checkbox">
                    <label>

                    </label>
                </div>
                <button class="btn btn-lg btn-primary" type="submit">Login</button>
            </form><!-- /form -->
        </div><!-- /card-container -->
    </div><!-- /container -->
    <script src="https://use.typekit.net/ayg4pcz.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>
</body>
</html>


