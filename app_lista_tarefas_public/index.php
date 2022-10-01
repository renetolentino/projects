<?php 
	$acao = 'recuperar';
	require 'tarefa_controller.php';

?>


<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Lista Tarefas</title>

		<link rel="stylesheet" href="css/estilo.css">	
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../fontawesome/css/all.css">

		<script>

			function editar(id, txt_tarefa) {

				//criar um formulário de edição de forma programática
				let form = document.createElement('form')
				form.action = 'tarefa_controller.php?acao=atualizar&remetente=index'
				form.method = 'post'
				form.className = 'row input-group'


				//criar um input para entrada de texto
				let inputTarefa = document.createElement('input')
				inputTarefa.type = 'text'
				inputTarefa.name = 'tarefa'
				inputTarefa.className = 'col-9 form-control'
				inputTarefa.value = txt_tarefa


				//criar um button para o envio do formulário
				let botao = document.createElement('button')
				botao.type = 'submit'
				botao.className = 'col-3 btn btn-info'
				botao.innerHTML = 'Atualizar'

				//criar um input hidden para guardar o id da tarefa

				let inputId = document.createElement('input')
				inputId.type = 'hidden'
				inputId.name = 'id'
				inputId.value = id

				//incluir inputTarefa no form
				form.appendChild(inputTarefa)

				//incluir o id no form
				form.appendChild(inputId)

				//incluir o botao no form

				form.appendChild(botao)

				//teste

				//console.log(form)

				//selecionar a div tarefa
				let tarefa = document.getElementById('tarefa_'+ id)

				//limpar o text da tarefa para inclusão do form
				tarefa.innerHTML = ''

				//incluir o form na página
				tarefa.insertBefore(form, tarefa[0])
			}

			function remover(id) {
				location = 'index.php?acao=remover&id=' + id + '&remetente=index'
			}

			function marcarRealizada(id) {
				location = 'index.php?acao=marcarRealizada&id=' + id + '&remetente=index'
			}


		</script>
		
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

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item active"><a href="#">Tarefas pendentes</a></li>
						<li class="list-group-item"><a href="nova_tarefa.php">Nova tarefa</a></li>
						<li class="list-group-item"><a href="todas_tarefas.php">Todas tarefas</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Tarefas pendentes</h4>
								<hr />
								<?php foreach ($tarefas as $indice => $tarefa) {
									if($tarefa->status == 'pendente') {
								 ?>
								<div class="row mb-3 d-flex align-items-center tarefa">
									<div class="col-sm-9" id="tarefa_<?= $tarefa->id?>"><?= $tarefa->tarefa ?></div>
									<div class="col-sm-3 mt-2 d-flex justify-content-between">
										<i class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?= $tarefa->id ?>)"></i>
										<i class="fas fa-edit fa-lg text-info" onclick="editar(<?= $tarefa->id ?>, '<?= $tarefa->tarefa?>')"></i>
										<i class="fas fa-check-square fa-lg text-success" onclick="marcarRealizada(<?= $tarefa->id ?>)"></i>
									</div>
								</div>
							<?php  }} ?>
								
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