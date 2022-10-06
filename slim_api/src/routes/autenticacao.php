<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Produto;
use App\Models\Usuario;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

// Routes to authentication token


$app->post('/api/token', function($request, $response){

	$dados = $request->getParsedBody();

	
		
	$email = isset($dados['email']) ? $dados['email'] : null;
	$senha = isset($dados['senha']) ? md5($dados['senha']) : null;

	$usuario = isset($email) ? Usuario::where('email', $email)->first() : null;



	$arrUsuario = [
		'id' => $usuario['id'],
		'senha' => $usuario['senha'],
		'email' => $usuario['email'],
		'nome' => $usuario['nome']
	];

	//return gettype($arrUsuario);

	
	
	if(!is_null($usuario) && !is_null($senha) && $senha === $usuario->senha){

		//gerar token
		$secretKey = $this->get('settings')['secretKey'];
		$chaveAcesso = JWT::encode($arrUsuario, $secretKey, 'HS256');

		return $response->withJson([
			'chave' => $chaveAcesso
		]);
	} else {
		return $response->withJson([
			'chave' => 'Não foi possível gerar a chave de acesso'
		]);
	}
	

	

});