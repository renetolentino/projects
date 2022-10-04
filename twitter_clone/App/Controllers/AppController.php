<?php 

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;


class AppController extends Action {

	public function timeline() {

		$this->validaAutenticacao();

		
			

			$tweet = Container::getModel('tweet');

			$tweet->__set('id_usuario', $_SESSION['id']);

			$tweets = $tweet->getAll();

			$this->view->tweets = $tweets;

			$usuario = Container::getModel('Usuario');
			$usuario->__set('id', $_SESSION['id']);

			$this->view->infoUsuario = $usuario->getInfoUsuario();
			$this->view->getTotalTweets = $usuario->getTotalTweets();
			$this->view->getTotalSeguindo = $usuario->getTotalSeguindo();
			$this->view->getTotalSeguidores = $usuario->getTotalSeguidores();

			$this->render('timeline');
		

	}

	public function tweet() {


		$this->validaAutenticacao();

			
			$tweet = Container::getModel('Tweet');

			$tweet->__set('tweet', $_POST['tweet']);

			$tweet->__set('id_usuario', $_SESSION['id']);

			$tweet->salvar();
			
			header('Location: /timeline');

		
	}

	public function validaAutenticacao() {

		session_start();

		if(!isset($_SESSION['id']) || empty($_SESSION['id']) || !isset($_SESSION['nome']) || empty($_SESSION['nome'])) {
			header('Location: /?login=erro');
		}
	}

	public function quemSeguir() {

		$this->validaAutenticacao();

		

		$pesquisarPor = isset($_GET['pesquisarPor']) ? $_GET['pesquisarPor'] : '';

		$usuarios = array();

		if(!empty($pesquisarPor)) {
			$usuario = Container::getModel('Usuario');
			$usuario->__set('nome', $_GET['pesquisarPor']);
			$usuario->__set('id', $_SESSION['id']);
			$usuarios = $usuario->getAll();
		}

		$this->view->usuarios = $usuarios;

		$usuario = Container::getModel('Usuario');
		$usuario->__set('id', $_SESSION['id']);

		$this->view->infoUsuario = $usuario->getInfoUsuario();
		$this->view->getTotalTweets = $usuario->getTotalTweets();
		$this->view->getTotalSeguindo = $usuario->getTotalSeguindo();
		$this->view->getTotalSeguidores = $usuario->getTotalSeguidores();

		$this->render('quemSeguir');
	}


	public function acao() {
		$this->validaAutenticacao();

		$acao = isset($_GET['acao']) ? $_GET['acao'] : '';
		$id_usuario_seguindo = isset($_GET['id_usuario']) ? $_GET['id_usuario'] : '';

		$usuario = Container::getModel('Usuario');
		$usuario->__set('id', $_SESSION['id']);

		if($acao == 'seguir') {

			$usuario->seguirUsuario($id_usuario_seguindo);

		} else if ($acao == 'deixar_de_seguir') {
			$usuario->deixarSeguir($id_usuario_seguindo);
		}

		header('Location: /quem_seguir');
	}

	public function deletarTweet() {
		
		$this->validaAutenticacao();

		$tweet = Container::getModel('Tweet');

		$tweet->__set('id_usuario', $_SESSION['id']);
		$tweet->__set('id', $_GET['id']);

		$tweet->deletar();

		header('Location: /timeline');

	}
	

}

?>