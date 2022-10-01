<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <style>
      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
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
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header">
              Login
            </div>
            <div class="card-body">
              <form action="valida_login.php" method="post">
                <div class="form-group">
                  <input name="email" type="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group py-2">
                  <input name="senha" type="password" class="form-control" placeholder="Senha">
                </div>

                <?php if(isset($_GET['login']) && $_GET['login'] == 'invalido'){ ?>

                 <div class="text-danger">
                    Usuario ou senha inválido(s)
                 </div>

                <?php } ?>

                <?php if(isset($_GET['login']) && $_GET['login'] == 'erro2'){ ?>

                 <div class="text-danger">
                    Faça o login novamente
                 </div>

                <?php } ?>
                <button class="btn btn-lg btn-info btn-block form-control" type="submit">Entrar</button>
              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>