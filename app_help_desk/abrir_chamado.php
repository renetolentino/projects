<?php require_once "validador_acesso.php" ?>


<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <style>
      .card-abrir-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="home.php">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <div class="mx-2">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="logoff.php">SAIR </a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-abrir-chamado">
          <div class="card">
            <div class="card-header">
              Abertura de chamado
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                  
                  <form method="post" action="registrar_chamado.php">
                    <div class="form-group">
                      <label>Título</label>
                      <input type="text" name="titulo" class="form-control" placeholder="Título">
                    </div>
                    
                    <div class="form-group">
                      <label>Categoria</label>
                      <select class="form-control" name="categoria">
                        
                          <option>Criação Usuário</option>
                          <option>Impressora</option>
                          <option>Hardware</option>
                          <option>Software</option>
                          <option>Rede</option>
                      
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label>Descrição</label>
                      <textarea class="form-control" name="descricao" rows="3"></textarea>
                    </div>

                    <div class="row mt-5">
                      <div class="col-6">
                        <a class="btn btn-lg btn-warning btn-block form-control" href="home.php">Voltar</a>
                      </div>

                      <div class="col-6">
                        <button class="btn btn-lg btn-info btn-block form-control" type="submit">Abrir</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>