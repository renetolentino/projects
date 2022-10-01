<?php 
	session_start();

	$titulo = str_replace('#','-', $_POST['titulo']);
	$categoria = str_replace('#','-', $_POST['categoria']);
	$descricao = str_replace('#','-', $_POST['descricao']);

	//implode('#', $_POST); //desafio

	$texto = $_SESSION['id']. '#' .$titulo .'#'. $categoria. '#' . $descricao . PHP_EOL;
	//echo $texto;

	$arquivo = fopen('../../app_help_desk/arquivo.hd', 'a'); //abrir o arquivo (importante armazenar em uma variável para usar como referência) e olhar na DOC os parâmetros que podem ser passados.

	

	fwrite($arquivo, $texto); //escreve no arquivo

	fclose($arquivo); //fecha o arquivo

	header('Location: abrir_chamado.php');



?>