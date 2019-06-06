<?php
    session_start();
    
    if(isset($_GET['acao']) && $_GET['acao']=='sair'){
        unset($_SESSION['autenticado']);
    }
    
    
    if(isset($_POST)){
        require_once './Dao.php';
        $bd = new Dao();
        
        $sql  = "SELECT id, nome FROM usuario "
                . " WHERE nome= :nome AND senha = :senha";
        $query = $bd->getCon()->prepare($sql);
        if(isset($_POST['nome']) && isset($_POST['senha'])){
            $usuario = array('nome'=>$_POST['nome'],
                             'senha'=>md5($_POST['senha']));
        
            $query->execute($usuario);
            if($query->rowCount()==1){
                $_SESSION['autenticado'] = $usuario['nome'];
                header('Location: index.php');
            }else{
                $validacao = false;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="./bootstrap-dist/css/bootstrap.min.css" rel="stylesheet">

   

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

   
  </head>

  <body>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      
    <div class="container">
        <form class="form-signin" action="login.php" method="POST">
            <center><h2 class="form-signin-heading">Login</h2></center>
        <?php if(isset($validacao) && $validacao==false){
                echo "<div class=' alert alert-danger'> 
                        Usuário ou senha incorretos, tente novamente
                      </div>";
              } ?>
        <label for="inputText" class="sr-only">Email </label>
        <input name="nome" type="text" id="inputText" class="form-control" placeholder="Digite o nome de Usuário" required autofocus>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input name="senha" type="password" id="inputPassword" class="form-control" placeholder="Digite a senha" required>
        <div class="checkbox">
                  
            
        
            
            
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">ENTRAR</button>
      </form>

        
   <center><div class="d-flex justify-content-center links">
       <a href="#">Esqueceu a sua senha?</a>
					</div></center>
        
    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>-->
  </body>
</html>
