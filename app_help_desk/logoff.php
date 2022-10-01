<?php 

	session_start();
	/*
	echo '<pre>';
	print_r($_SESSION);
	echo '</pre>';

	//remover indices do array de sessão
	//unset() => espera o array e o índice para exclusão

	unset($_SESSION['x']); //remove o índice apenas se existir

	echo '<pre>';
	print_r($_SESSION);
	echo '</pre>';

	
	//destruir a variável de sessão
	//session_destroy() => remove TODOS os índices contidos da SUPERGLOBAAL $_SESSION

	session_destroy(); //será destruída e é necessário forçar um redirecionamento
	//para aplicar as alterações

	echo '<pre>';
	print_r($_SESSION);
	echo '</pre>';
	*/
	session_destroy();
	header("Location: index.php");

?>