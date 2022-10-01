<?php require_once "validador_acesso.php" ?>
<?php 
    
    //echo $_SESSION['id'];
    //echo $_SESSION['perfil_id'];
    //chamados
    $chamados = array();

    //chamados filtrados para serem exibidos
    $chamados_filtrados = array();

    //abrir o arquivo hd



    $arquivo =  fopen('../../app_help_desk/arquivo.hd', 'r');

    //estrutura de repetição
    //percorrer o arquivo enquanto houver registros (linhas)
   
    while(!feof($arquivo)) { 
      //testa pelo fim do arquivo até identificar o EOF
      //linhas 
      $registro = fgets($arquivo); //lendo as linhas do documento
      $chamados[] = $registro; //adiciona as linhas do documento ao array chamados
      //preciso verificar o tipo de perfil
      if(!($_SESSION['perfil_id'] != 2)) {
          $dados = explode('#', $registro);
          //print_r($dados);
          if($_SESSION['id'] == $dados[0]) {
            $chamados_filtrados[] = $dados;
            //echo $dados[0];
            //echo '<pre>';
            //print_r($dados);
            //echo '</pre>';
            
          }
      }  else {
         $dados = explode('#', $registro);
         if(count($dados) > count($chamados_filtrados)) {
          $chamados_filtrados[] = $dados;
         }
         

         

         
         //echo '<pre>';
         print_r($dados);
         //echo '</pre>';
        }


    } 

    //fechar o arquivo aberto
    fclose($arquivo);

    /*
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>'; 

    //echo '<pre>';
    //print_r($chamados);
    //echo '</pre>'; */

    //echo '<pre>';
    //print_r($chamados_filtrados);
    //echo '</pre>';
    





?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src = '../js/bootstrap.min.js'></script>

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }

      nav h6 {
        position: absolute;
        top: 20px;
        right: 50px;

      }

      
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="home.php">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>

      <h6 class="text-light"><?= $_SESSION['nome'] ?></h6>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="logoff.php">Sair </a>
          </li>
        </ul>

    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              <?php foreach($chamados_filtrados as $idx => $conteudo) {
                  
                    ?>

                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title"><?=$conteudo[1] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?=$conteudo[2] ?></h6>
                    <p class="card-text"><?=$conteudo[3] ?></p>

                  </div>
                </div>
                <?php } ?>
              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block form-control" type="submit" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>