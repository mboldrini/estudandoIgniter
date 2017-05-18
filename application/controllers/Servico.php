<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servico extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library(array('session'));

		$this->load->helper('form', 'funcoes_helper');
		#pegar as infos dos usuarios
		$this->load->model('usuario');

		$this->load->model('funcoes');

	}



	public function tipo(){

		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador'){
			redirect(base_url().'login');
		}

		# pega o nome do usuario que tem na session e passa >
		$nome = $this->session->userdata('username');
		# pega o nome da variavel aqui de cima, e faz uma pesquisa completa no banco de dados 'user'
		$pegaInfos = $this->usuario->pegaUsuario($nome);

		$servicosCadastrados = $this->funcoes->mostraTiposServicos();

		$dados = array(
			'tela' => 'tipo',
			'titulo' => 'Tipos de Serviços',
			'descricao' => ' - Tipos de Serviços já Cadastrados',
			'infos' => $pegaInfos,
			'servicos' => $servicosCadastrados,
		);

		$this->load->view('servico',$dados);

	}


	public function novoTipo(){

		# verificação de usuario logado, e se sim, tem que ser no perfil de administrador
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador'){
			redirect(base_url().'login');
		}

		$mensagem = [];

		# pega o nome do usuario que tem na session e passa >
		$nome = $this->session->userdata('username');
		# pega o nome da variavel aqui de cima, e faz uma pesquisa completa no banco de dados 'user'
		$pegaInfos = $this->usuario->pegaUsuario($nome);

		// Regras de validacao
		$this->form_validation->set_rules('servico', 'Serviço', 'trim|required');
		$this->form_validation->set_rules('contabil', 'Contábil', 'trim|required');
		$this->form_validation->set_rules('duracao', 'Duracao', 'trim|required');
		$this->form_validation->set_rules('data', 'Data', 'trim|required');
		$this->form_validation->set_rules('usuario', 'Usuário', 'trim|required');

		$usuario = $this->input->post('servico');
		$contabil = $this->input->post('contabil');
		$duracao = $this->input->post('duracao');
		$data = $this->input->post('data');
		$servico = $this->input->post('usuario');


		if( $this->form_validation->run() == FALSE ){
			if( validation_errors() ){
				$mensagem[0] = '<strong>Opa!</strong> Algo de errado aconteceu! ' . validation_errors();
				$mensagem[1] = 'alert-danger';
			}
		}else{

			$registra = array(
				"descricao"=>$usuario,
				"contabil"=>$contabil,
				"duracao"=>$duracao,
				"dataCadastro"=>$data,
				"usuarioCadastro"=>$servico
			);

			$this->funcoes->cadastraTipoServico($registra);

			$mensagem[0] = '<strong>Parabéns!</strong> Você cadastrou um novo Serviço';
			$mensagem[1] = 'alert-success';
		}


		$dados = array(
			'tela' => 'novoTipo',
			'titulo' => 'Tipos de Serviços',
			'descricao' => ' - Cadastro de tipos de serviços',
			'infos' => $pegaInfos,
			'mensagem' => $mensagem,
		);

		$this->load->view('servico',$dados);

	}


	public function editarTipo(){

		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador'){
			redirect(base_url().'login');
		}

		# pega o nome do usuario que tem na session e passa >
		$nome = $this->session->userdata('username');
		# pega o nome da variavel aqui de cima, e faz uma pesquisa completa no banco de dados 'user'
		$pegaInfos = $this->usuario->pegaUsuario($nome);

		$mensagem = [];

		$this->form_validation->set_rules('servico', 'Serviço', 'trim|required');
		$this->form_validation->set_rules('contabil', 'Contábil', 'trim|required');
		$this->form_validation->set_rules('duracao', 'Duracao', 'trim|required');
		$this->form_validation->set_rules('data', 'Data', 'trim|required');
		$this->form_validation->set_rules('usuario', 'Usuário', 'trim|required');

		$id = $this->input->post('id');
		$usuario = $this->input->post('servico');
		$contabil = $this->input->post('contabil');
		$duracao = $this->input->post('duracao');
		$data = $this->input->post('data');
		$servico = $this->input->post('usuario');


		if( $this->form_validation->run() == FALSE ){
			if( validation_errors() ){
				$mensagem[0] = '<strong>Opa!</strong> Algo de errado aconteceu! ' . validation_errors();
				$mensagem[1] = 'alert-danger';
			}
		}else{

			$registra = array(
				"descricao"=>$usuario,
				"contabil"=>$contabil,
				"duracao"=>$duracao,
				"dataCadastro"=>$data,
				"usuarioCadastro"=>$servico
			);

			$this->funcoes->atualizaTipoServico($registra, $id);

			$mensagem[0] = '<strong>Parabéns!</strong> Você Editou um Serviço';
			$mensagem[1] = 'alert-success';
		}


		$dados = array(
			'tela' => 'editarTipo',
			'titulo' => 'Editar Tipos de Serviços',
			'descricao' => ' - Editar Tipos de Serviços já Cadastrados',
			'infos' => $pegaInfos,
			'mensagem' => $mensagem,
		);

		$this->load->view('servico',$dados);

	}




	public function valor(){

		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador'){
			redirect(base_url().'login');
		}

		# pega o nome do usuario que tem na session e passa >
		$nome = $this->session->userdata('username');
		# pega o nome da variavel aqui de cima, e faz uma pesquisa completa no banco de dados 'user'
		$pegaInfos = $this->usuario->pegaUsuario($nome);

		$dados = array(
			'tela' => 'valor',
			'titulo' => 'Valores de Serviços',
			'descricao' => ' - Cadastro de valores de serviços',
			'infos' => $pegaInfos,
			'registros' => $this->funcoes->do_getAll('valorservico'),
			'servicos' => $this->funcoes->do_getAll('tiposervico'),
		);

		$this->load->view('servico',$dados);

	}// valor servico

	public function novoValor(){

		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador'){
			redirect(base_url().'login');
		}

		# pega o nome do usuario que tem na session e passa >
		$nome = $this->session->userdata('username');
		# pega o nome da variavel aqui de cima, e faz uma pesquisa completa no banco de dados 'user'
		$pegaInfos = $this->usuario->pegaUsuario($nome);


		$mensagem = [];

		$this->form_validation->set_rules('tipo', 		 	 'tipo', 'trim|required');
		$this->form_validation->set_rules('inicioValor', 	 'inicioValor', 'trim|required');
		$this->form_validation->set_rules('valor', 			 'valor', 'trim|required');
		$this->form_validation->set_rules('fimValor', 		 'fimValor', 'trim|required');
		$this->form_validation->set_rules('dataCadastro', 	 'dataCadastro', 'trim|required');
		$this->form_validation->set_rules('usuarioCadastro', 'usuarioCadastro', 'trim|required');


		$tipo = 			$this->input->post('tipo');
		$inicioValor = 		$this->input->post('inicioValor');
		$valor = 			$this->input->post('valor');
		$fimValor = 		$this->input->post('fimValor');
		$dataCadastro = 	$this->input->post('dataCadastro');
		$usuarioCadastro = 	$this->input->post('usuarioCadastro');


		if( $this->form_validation->run() == FALSE ){
			if( validation_errors() ){
				$mensagem[0] = '<strong>Opa!</strong> Algo de errado aconteceu! ' . validation_errors();
				$mensagem[1] = 'alert-danger';
			}
		}else{

			$tabela = "valorservico";

			$registra = array(
				"tipo" =>			 $tipo,
				"inicioValor" =>	 $inicioValor,
				"valor" => 			 $valor,
				"fimValor" =>		 $fimValor,
				"dataCadastro" =>	 $dataCadastro,
				"usuarioCadastro" => $usuarioCadastro,
				
			);

			$this->funcoes->do_insert($registra, $tabela);

			$mensagem[0] = '<strong>Parabéns!</strong> Você Cadastrou um novo Valor de Serviço';
			$mensagem[1] = 'alert-success';
		}


		$dados = array(
			'tela' => 'novoValor',
			'titulo' => 'Cadastrar Valor do Serviço',
			'descricao' => ' - Cadastro de valores de serviços',
			'infos' => $pegaInfos,
			'servicos' => $this->funcoes->do_getAll('tiposervico'),
			'mensagem' => $mensagem,
		);

		$this->load->view('servico',$dados);

	}// valor servico


	public function editarValor(){

		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador'){
			redirect(base_url().'login');
		}

		# pega o nome do usuario que tem na session e passa >
		$nome = $this->session->userdata('username');
		# pega o nome da variavel aqui de cima, e faz uma pesquisa completa no banco de dados 'user'
		$pegaInfos = $this->usuario->pegaUsuario($nome);

		$mensagem = [];

		$this->form_validation->set_rules('tipo', 		 	 'tipo', 'trim|required');
		$this->form_validation->set_rules('inicioValor', 	 'inicioValor', 'trim|required');
		$this->form_validation->set_rules('valor', 			 'valor', 'trim|required');
		$this->form_validation->set_rules('fimValor', 		 'fimValor', 'trim|required');
		$this->form_validation->set_rules('dataCadastro', 	 'dataCadastro', 'trim|required');

		$id = 				$this->input->post('id');
		$tipo = 			$this->input->post('tipo');
		$inicioValor = 		$this->input->post('inicioValor');
		$valor = 			$this->input->post('valor');
		$fimValor = 		$this->input->post('fimValor');
		$dataCadastro = 	$this->input->post('dataCadastro');


		if( $this->form_validation->run() == FALSE ){
			if( validation_errors() ){
				$mensagem[0] = '<strong>Opa!</strong> Algo de errado aconteceu! ' . validation_errors();
				$mensagem[1] = 'alert-danger';
			}
		}else{

			$idvalor = array("id"=>$id);
			$tabela = "valorservico";

			$registra = array(
				"tipo" =>			 $tipo,
				"inicioValor" =>	 $inicioValor,
				"valor" => 			 $valor,
				"fimValor" =>		 $fimValor,
				"dataCadastro" =>	 $dataCadastro,
				
			);

			$this->funcoes->do_update($registra, $tabela, $idvalor);

			$mensagem[0] = '<strong>Parabéns!</strong> Você editou um novo Valor de Serviço';
			$mensagem[1] = 'alert-success';
		}

		$dados = array(
			'tela' => 'editarValor',
			'titulo' => 'Editar Valor de Serviço',
			'descricao' => ' - Edição de Valor de Serviço',
			'infos' => $pegaInfos,
			'servicos' => $this->funcoes->do_getAll('tiposervico'),
			'mensagem' => $mensagem,
		);

		$this->load->view('servico',$dados);

	}// valor servico


	public function excluirValor(){

		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador'){
			redirect(base_url().'login');
		}

		# pega o nome do usuario que tem na session e passa >
		$nome = $this->session->userdata('username');
		# pega o nome da variavel aqui de cima, e faz uma pesquisa completa no banco de dados 'user'
		$pegaInfos = $this->usuario->pegaUsuario($nome);

		$servicosCadastrados = $this->funcoes->mostraTiposServicos();

		$dados = array(
			'tela' => 'excluirValor',
			'titulo' => 'Excluir Valor de Serviço',
			'descricao' => ' ',
			'infos' => $pegaInfos,
		);

		$this->load->view('servico',$dados);

	}



	public function servicos(){

		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador'){
			redirect(base_url().'login');
		}

		# pega o nome do usuario que tem na session e passa >
		$nome = $this->session->userdata('username');
		# pega o nome da variavel aqui de cima, e faz uma pesquisa completa no banco de dados 'user'
		$pegaInfos = $this->usuario->pegaUsuario($nome);

		$dados = array(
			'tela' => 'serv',
			'titulo' => 'Serviços',
			'descricao' => ' - Cadastro de Serviços',
			'infos' => $pegaInfos,
			'servicos' => $this->funcoes->do_getAll('servicos'),
			'clientes'	=> $this->funcoes->do_getAll('clientes'),
			'tipoServico'	=> $this->funcoes->do_getAll('tiposervico'),

		);

		$this->load->view('servico',$dados);

	}// servico


	public function excluir(){

		# verificação de usuario logado, e se sim, tem que ser no perfil de administrador
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador'){
			redirect(base_url().'login');
		}

		# pega o nome do usuario que tem na session e passa >
		$nome = $this->session->userdata('username');
		# pega o nome da variavel aqui de cima, e faz uma pesquisa completa no banco de dados 'user'
		$pegaInfos = $this->usuario->pegaUsuario($nome);

		$dados = array(
			'tela' => 'excluir',
			'titulo' => 'Excluir Tipo de Serviço',
			'descricao' => ' - exclusão de registro de tipo de serviço',
			'infos' => $pegaInfos,
		);

		$this->load->view('servico',$dados);

	}// cliente


	public function novoservico(){

		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador'){
			redirect(base_url().'login');
		}

		# pega o nome do usuario que tem na session e passa >
		$nome = $this->session->userdata('username');
		# pega o nome da variavel aqui de cima, e faz uma pesquisa completa no banco de dados 'user'
		$pegaInfos = $this->usuario->pegaUsuario($nome);

		// lista os servicos cadastrados
		$tipoServicoCad = $this->funcoes->mostraTiposServicos();

		$mensagem = [];

		$this->form_validation->set_rules('codigoCliente', 		'codigoCliente', 		'trim|required');
		$this->form_validation->set_rules('dataServico', 		'dataServico', 			'trim|required');
		$this->form_validation->set_rules('horaServico', 		'horaServico', 			'trim');
		$this->form_validation->set_rules('tipoServico', 		'tipoServico', 			'trim|required');
		$this->form_validation->set_rules('solicitado', 		'solicitado', 			'trim|required');
		$this->form_validation->set_rules('detectado', 			'detectado', 			'trim');
		$this->form_validation->set_rules('solucao', 			'solucao', 				'trim');
		$this->form_validation->set_rules('pervisaoConclusao', 	'pervisaoConclusao',	'trim');
		$this->form_validation->set_rules('dataConclusao', 		'dataConclusao', 		'trim');
		$this->form_validation->set_rules('status', 			'status', 				'trim');
		$this->form_validation->set_rules('nomeTecnico', 		'nomeTecnico', 			'trim');
		$this->form_validation->set_rules('dataCadastro', 		'dataCadastro', 		'trim|required');
		$this->form_validation->set_rules('usuarioCadastro', 	'usuarioCadastro', 		'trim|required');

		$codigoCliente		= $this->input->post('codigoCliente');
		$dataServico 		= $this->input->post('dataServico');
		$horaServico 		= $this->input->post('horaServico');
		$tipoServico 		= $this->input->post('tipoServico');
		$solicitado 		= $this->input->post('solicitado');
		$detectado 			= $this->input->post('detectado');
		$solucao 			= $this->input->post('solucao');
		$previsaoConclusao 	= $this->input->post('pervisaoConclusao');
		$dataConclusao 		= $this->input->post('dataConclusao');
		$status 			= $this->input->post('status');
		$nomeTecnico 		= $this->input->post('nomeTecnico');
		$dataCadastro 		= $this->input->post('dataCadastro');
		$usuarioCadastro 	= $this->input->post('usuarioCadastro');

		if( $this->form_validation->run() == FALSE ){
			if( validation_errors() ){
				$mensagem[0] = '<strong>Opa!</strong> Algo de errado aconteceu! ' . validation_errors();
				$mensagem[1] = 'alert-danger';
			}
		}else{
			$registra = array(
				"codigoCliente"		=> $codigoCliente,
				"dataServico" 		=> $dataServico,
				"horaServico" 		=> $horaServico,
				"tipo" 				=> $tipoServico,
				"solicitacao" 		=> $solicitado,
				"detectado" 		=> $detectado,
				"solucao" 			=> $solucao,
				"previsaoConclusao" => $previsaoConclusao,
				"dataConclusao" 	=> $dataConclusao,
				"status" 			=> $status,
				"nomeTecnico" 		=> $nomeTecnico,
				"dataCadastro" 		=> $dataCadastro,
				"usuarioCadastro" 	=> $usuarioCadastro,
			);

			$this->funcoes->do_insert($registra, 'servicos');

			$mensagem[0] = '<strong>Parabéns!</strong> Você cadastrou um Serviço!';
			$mensagem[1] = 'alert-success';
		}

		$dados = array(
			'tela' 		=> 'novoservico',
			'titulo' 	=> 'Novo Serviço',
			'descricao' => ' - Cadastro de um novo serviço',
			'infos' 	=> $pegaInfos,
			'servicos' 	=> $tipoServicoCad,
			'mensagem' 	=> $mensagem,
		);

		$this->load->view('servico',$dados);

	}

	public function editarServico(){

		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador'){
			redirect(base_url().'login');
		}

		# pega o nome do usuario que tem na session e passa >
		$nome = $this->session->userdata('username');
		# pega o nome da variavel aqui de cima, e faz uma pesquisa completa no banco de dados 'user'
		$pegaInfos = $this->usuario->pegaUsuario($nome);

		// lista os servicos cadastrados
		$tipoServicoCad = $this->funcoes->mostraTiposServicos();

		$mensagem = [];

		$this->form_validation->set_rules('codigoServico', 		'codigoServico', 		'trim|required');
		$this->form_validation->set_rules('dataServico', 		'dataServico', 			'trim|required');
		$this->form_validation->set_rules('horaServico', 		'horaServico', 			'trim');
		$this->form_validation->set_rules('tipoServico', 		'tipoServico', 			'trim|required');
		$this->form_validation->set_rules('solicitacao', 		'solicitacao', 			'trim|required');
		$this->form_validation->set_rules('detectado', 			'detectado', 			'trim');
		$this->form_validation->set_rules('solucao', 			'solucao', 				'trim');
		$this->form_validation->set_rules('pervisaoConclusao', 	'pervisaoConclusao',	'trim');
		$this->form_validation->set_rules('dataConclusao', 		'dataConclusao', 		'trim');
		$this->form_validation->set_rules('status', 			'status', 				'trim');
		$this->form_validation->set_rules('nomeTecnico', 		'nomeTecnico', 			'trim');

		$id					= $this->input->post('codigoServico');
		$dataServico 		= $this->input->post('dataServico');
		$horaServico 		= $this->input->post('horaServico');
		$tipoServico 		= $this->input->post('tipoServico');
		$solicitacao 		= $this->input->post('solicitacao');
		$detectado 			= $this->input->post('detectado');
		$solucao 			= $this->input->post('solucao');
		$previsaoConclusao 	= $this->input->post('pervisaoConclusao');
		$dataConclusao 		= $this->input->post('dataConclusao');
		$status 			= $this->input->post('status');
		$nomeTecnico 		= $this->input->post('nomeTecnico');

		if( $this->form_validation->run() == FALSE ){
			if( validation_errors() ){
				$mensagem[0] = '<strong>Opa!</strong> Algo de errado aconteceu! ' . validation_errors();
				$mensagem[1] = 'alert-danger';
			}
		}else{

			$idServico = array("id"=>$id);

			$registra = array(
				"dataServico" 		=> $dataServico,
				"horaServico" 		=> $horaServico,
				"tipo" 				=> $tipoServico,
				"solicitacao" 		=> $solicitacao,
				"detectado" 		=> $detectado,
				"solucao" 			=> $solucao,
				"previsaoConclusao" => $previsaoConclusao,
				"dataConclusao" 	=> $dataConclusao,
				"status" 			=> $status,
				"nomeTecnico" 		=> $nomeTecnico,
			);

			$this->funcoes->do_update($registra, 'servicos', $idServico);

			$mensagem[0] = '<strong>Parabéns!</strong> Você editou um Serviço!';
			$mensagem[1] = 'alert-success';
		}

		$dados = array(
			'tela' 		=> 'editarServico',
			'titulo' 	=> 'Editar Serviço',
			'descricao' => ' - Edição de Serviço Cadastrado',
			'infos' 	=> $pegaInfos,
			'mensagem' 	=> $mensagem,
			'tipoServico'=> $this->funcoes->do_getAll('tiposervico'),
		);

		$this->load->view('servico',$dados);

	}

	public function excluirServico(){

		# verificação de usuario logado, e se sim, tem que ser no perfil de administrador
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador'){
			redirect(base_url().'login');
		}

		# pega o nome do usuario que tem na session e passa >
		$nome = $this->session->userdata('username');
		# pega o nome da variavel aqui de cima, e faz uma pesquisa completa no banco de dados 'user'
		$pegaInfos = $this->usuario->pegaUsuario($nome);

		$dados = array(
			'tela' => 'excluirServico',
			'titulo' => 'Excluir Serviço',
			'descricao' => ' - exclusão de registro de serviço',
			'infos' => $pegaInfos,
		);

		$this->load->view('servico',$dados);

	}// cliente

	

}// Porra Toda