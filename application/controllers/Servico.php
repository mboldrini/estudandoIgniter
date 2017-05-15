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

		# pega o nome do usuario que tem na session e passa >
		$nome = $this->session->userdata('username');
		# pega o nome da variavel aqui de cima, e faz uma pesquisa completa no banco de dados 'user'
		$pegaInfos = $this->usuario->pegaUsuario($nome);

		$mensagem = [];


		$dados = array(
			'tela' => 'editarTipo',
			'titulo' => 'Editar Tipos de Serviços',
			'descricao' => ' - Editar Tipos de Serviços já Cadastrados',
			'infos' => $pegaInfos,
		);

		$this->load->view('servico',$dados);

	}




	public function valor(){

		# pega o nome do usuario que tem na session e passa >
		$nome = $this->session->userdata('username');
		# pega o nome da variavel aqui de cima, e faz uma pesquisa completa no banco de dados 'user'
		$pegaInfos = $this->usuario->pegaUsuario($nome);

		$dados = array(
			'tela' => 'valor',
			'titulo' => 'Valores de Serviços',
			'descricao' => ' - Cadastro de valores de serviços',
			'infos' => $pegaInfos,
		);

		$this->load->view('servico',$dados);

	}// valor servico



	public function servicos(){

		$dados = array(
			'tela' => 'serv',
			'titulo' => 'Serviços',
			'descricao' => ' - Cadastro de Serviços',
			'infos' => $pegaInfos,
		);

		# pega o nome do usuario que tem na session e passa >
		$nome = $this->session->userdata('username');
		# pega o nome da variavel aqui de cima, e faz uma pesquisa completa no banco de dados 'user'
		$pegaInfos = $this->usuario->pegaUsuario($nome);

		$this->load->view('servico',$dados);

	}// servico


	

}// Porra Toda