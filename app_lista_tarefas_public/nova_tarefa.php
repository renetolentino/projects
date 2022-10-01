<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Lista Tarefas</title>

		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../fontawesome/css/all.css">
		<link rel="stylesheet" href="css/estilo.css">
	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					App Lista Tarefas
				</a>
			</div>
		</nav>
		<?php if(isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
		<div class="bg-success pt-2 text-white d-flex justify-content-center">
			
			<h5>Tarefa inserida com sucesso</h5>
			<?php } ?>
		</div>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php">Tarefas pendentes</a></li>
						<li class="list-group-item active"><a href="#">Nova tarefa</a></li>
						<li class="list-group-item"><a href="todas_tarefas.php">Todas tarefas</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Nova tarefa</h4>
								<hr />

								<form method="post" action="tarefa_controller.php?acao=inserir">
									<div class="form-group">
										<label>Descrição da tarefa:</label>
										<input type="text" name="tarefa" class="form-control" placeholder="Exemplo: Lavar o carro">
									</div>

									<button class="btn btn-success mt-2">Cadastrar</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src = "../js/popper.min.js"></script>
		<script src = "../js/jquery-3.6.1.min.js"></script>
		<script src = "../js/bootstrap.min.js"></script>
		<script src = "../fontawesome/js/all.min.js"></script>
	</body>
</html>