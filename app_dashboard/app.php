<?php 

/**
 * primeiro estipular uma classe para instanciar um objeto com os dados necessários
 * para a aplicação
 * 
 * segundo estipular uma classe de conexao com o banco de dados
 * 
 * terceiro criar uma classe que permita manipular o objeto no (model)
 * 
 * quarto juntar todos os processos
 * 
 * */

class Dashboard {
	public $data_inicio;
	public $data_fim;
	public $numeroVendas;
	public $totalVendas;
	public $clientesAtivos;
	public $clientesInativos;
	public $totalReclamacoes;
	public $totalElogios;
	public $totalSugestoes;
	public $totalDespesas;

	public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
		return $this;
	}
}


class Conexao {
	private $host = 'localhost';
	private $dbname = 'dashboard';
	private $user = 'root';
	private $pass = '';

	public function conectar() {
		try {

			$conexao = new PDO(
				"mysql:host=$this->host;dbname=$this->dbname",
				"$this->user", 
				"$this->pass");

			$conexao->exec('set charset utf8');

			return $conexao;

		} catch (PDOException $e) {
			echo '<p>' . $e->getMessage() . '</p>';
		}
	}
}


class Bd {
	private $conexao;
	private $dashboard;

	public function __construct(Conexao $conexao, Dashboard $dashboard) {
		$this->conexao = $conexao->conectar();
		$this->dashboard = $dashboard;
	}

	public function getNumeroVendas() {
		$query = 'select count(*) as numero_vendas from tb_vendas where data_venda between :data_inicio and :data_fim';

		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':data_inicio', $this->dashboard->__get('data_inicio'));
		$stmt->bindValue(':data_fim', $this->dashboard->__get('data_fim'));
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_OBJ)->numero_vendas;
	}

	public function getTotalVendas() {
		$query = 'select sum(total) as total_vendas from tb_vendas where data_venda between :data_inicio and :data_fim';

		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':data_inicio', $this->dashboard->__get('data_inicio'));
		$stmt->bindValue(':data_fim', $this->dashboard->__get('data_fim'));
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_OBJ)->total_vendas;
	}

	public function getClientesAtivos() {
		$query = 'select count(*) as clientes_ativos from tb_clientes where cliente_ativo = 1';
		$stmt = $this->conexao->prepare($query);
		//$stmt->bindValue(1, 'cliente_ativo');
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ)->clientes_ativos;
	}

	public function getClientesInativos() {
		$query = 'select count(*) as clientes_ativos from tb_clientes where cliente_ativo = 0';
		$stmt = $this->conexao->prepare($query);
		//$stmt->bindValue(1, 'cliente_ativo');
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ)->clientes_ativos;
	}

	public function getTotalReclamacoes() {
		//aqui vou determinar que o tipo 1 é reclamação
		//tipo 2 é elogio e tipo 3 é sugestão
		$query = 'select count(*) as total_reclamacoes from tb_contatos where tipo_contato = 1';
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ)->total_reclamacoes;
	}

	public function getTotalSugestoes() {
		//aqui vou determinar que o tipo 1 é reclamação
		//tipo 2 é elogio e tipo 3 é sugestão
		$query = 'select count(*) as total_reclamacoes from tb_contatos where tipo_contato = 3';
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ)->total_reclamacoes;
	}

	public function getTotalElogios() {
		//aqui vou determinar que o tipo 1 é reclamação
		//tipo 2 é elogio e tipo 3 é sugestão
		$query = 'select count(*) as total_reclamacoes from tb_contatos where tipo_contato = 2';
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ)->total_reclamacoes;
	}

	public function getTotalDespesas() {
		$query = 'select sum(total) as total_vendas from tb_despesas where data_despesa between ? and ?';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, $this->dashboard->__get('data_inicio'));
		$stmt->bindValue(2, $this->dashboard->__get('data_fim'));
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ)->total_vendas;
	}
}

$dashboard = new Dashboard();

$conexao = new Conexao();

$competencia = explode('-',$_GET['competencia']);

$ano = $competencia[0];
$mes = $competencia[1];

$dias_do_mes = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);

$dashboard->__set('data_inicio', $ano. '-'. $mes. '-01');
$dashboard->__set('data_fim', $ano. '-'. $mes. '-'. $dias_do_mes);

$bd = new Bd($conexao, $dashboard);



$dashboard->__set('numeroVendas', $bd->getNumeroVendas());

$dashboard->__set('totalVendas', $bd->getTotalVendas());

$dashboard->__set('clientesAtivos', $bd->getclientesAtivos());

$dashboard->__set('clientesInativos', $bd->getClientesInativos());

$dashboard->__set('totalReclamacoes', $bd->getTotalReclamacoes());

$dashboard->__set('totalSugestoes', $bd->getTotalSugestoes());

$dashboard->__set('totalElogios', $bd->getTotalElogios());

$dashboard->__set('totalDespesas', $bd->getTotalDespesas());

echo json_encode($dashboard);
?>