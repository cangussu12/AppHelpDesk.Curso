<?php require_once "validador_acesso.php" ?>
<?php


	$usuarios_app = array(
		array('id' => 1, 'email' => 'adm@teste.com.br', 'senha' => '1234', 'perfil_id' => 1),
		array('id' => 2, 'email' => 'user@teste.com.br', 'senha' => '1234', 'perfil_id' => 1),
		array('id' => 3, 'email' => 'leo@teste.com.br', 'senha' => '1234', 'perfil_id' => 2),
		array('id' => 4, 'email' => 'raiane@teste.com.br', 'senha' => '1234', 'perfil_id' => 2),
	);

    /*
    echo '<pre>';
    print_r($usuarios_app);
    echo '<pre>';
    */

    
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="logoff.php">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Configurações
            </div>        
                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title">Adicionar Usuário</h5>
                  </div>
                  <div class="row">
                  <form method="post" action="registra_usuario.php">
                    <div class="col" style="padding-left: 50px;">
                        <input name="criar_usuario" style="width:200px;" type="text" class="form-control" placeholder="Usuario" aria-label="First name">
                        <div style="padding-top: 10px; padding-bottom: 20px;">
                            <input name="criar_senha" style="width:200px;" type="text" class="form-control" placeholder="Senha" aria-label="First name">
                        </div>
                        <div style="padding-bottom: 20px;">
                        <select name="criar_perfil" class="form-select" aria-label="Default select example">
                            <option selected>Perfil de acesso</option>
                            <option value="1">Administrador</option>
                            <option value="2">Usuário</option>
                        </select>
                        </div>
                        <button class="btn btn-outline-primary" type="submit">Registrar</button>
                    </div>
                    </form>
                  </div>
                </div>
<?php

//chamados
$usuarios_total = array();

//abrir o arquivo.hd
$arquivo_user = fopen('user.hd', 'r');

//enquanto houver registros (linhas) a serem recuperados
while(!feof($arquivo_user)) { //testa pelo fim de um arquivo
  //linhas  
  $registro = fgets($arquivo_user);
  $usuarios_total[] = $registro;
}

//fechar o arquivo aberto
fclose($arquivo_user);

?>

<?php
foreach($usuarios_total as $user) {
              
    
    $user_dados = explode('#', $user);

    $arr = array('email' => isset($user_dados[0]), 'senha' => isset($user_dados[1]), 'perfil_id' => isset($user_dados[2]));

    array_push ($usuarios_app, $arr);
    

}
?>
              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>