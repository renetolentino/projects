<html>
	<head>
		<meta charset="utf-8" />
    	<title>App Mail Send</title>

    	<link rel="stylesheet" href="../css/bootstrap.min.css">

    	<style type="text/css">
    		.btn {
    			margin-top: 0.3em;
    		}
    		.nav-link {
    			text-decoration: none;
    			color: #fff;
    		}
    		.navbar>.container {
    			justify-content: space-between;
    		}
    		label {
    			cursor: pointer;
    		}
    		.navbar-expand {
    			justify-content: flex-end;
    		}

    		.navbar-collapse {
    			flex-grow: 0;
    		}
    		
    	</style>

	</head>

	<body>
		<nav class="navbar navbar-dark bg-primary navbar-expand-sm">
			<div class="container">
				<a href="index.php" class="navbar-brand"> <img src="logo.png" width="30" height="30"> SendMail</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#barraNavTop" aria-controls="barraNavTop" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
				</button>

				<div class="navbar-collapse collapse" id="barraNavTop">
					<ul class="navbar-nav justify-content">
						<li class="nav-item">
							<a href="" class="nav-link active">Novo</a>
						</li>
						<li class="nav-item">
							<a href="" class="nav-link">Enviados</a>
						</li>
						<li class="nav-item">
							<a href="" class="nav-link">Sobre</a>
						</li>
						<li class="nav-item">
							<a href="" class="nav-link">Suporte</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="container">  

			<div class="py-3 text-center">
				<img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
				<h2>Send Mail</h2>
				<p class="lead">Seu app de envio de e-mails particular!</p>
			</div>

      		<div class="row">
      			<div class="col-md-12">
  				
					<div class="card-body font-weight-bold">
						<form action="processa_envio.php" method="post">
							<div class="form-group">
								<label for="para">Para</label>
								<input type="text" name="para" class="form-control" id="para" placeholder="joao@dominio.com.br">
							</div>

							<div class="form-group">
								<label for="assunto">Assunto</label>
								<input type="text" name="assunto" class="form-control" id="assunto" placeholder="Assundo do e-mail">
							</div>

							<div class="form-group">
								<label for="mensagem">Mensagem</label>
								<textarea class="form-control" name="mensagem" id="mensagem"></textarea>
							</div>

							<button type="submit" class="btn btn-primary btn-lg">Enviar Mensagem</button>
						</form>
					</div>
				</div>
      		</div>
      	</div>
      	<script src = ../js/popper.min.js></script>

      	<script src = "../js/bootstrap.min.js"></script>

      	<script src = "../js/jquery-3.3.1.min.js"></script>

	</body>
</html>