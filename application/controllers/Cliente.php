<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library(array('session'));

		$this->load->helper('form', 'funcoes_helper');
		#pegar as infos dos usuarios
		$this->load->model('usuario');

		$this->load->model('funcoes');

	}


	public function clientes(){

		# verificação de usuario logado, e se sim, tem que ser no perfil de administrador
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador'){
			redirect(base_url().'login');
		}

		# pega o nome do usuario que tem na session e passa >
		$nome = $this->session->userdata('username');
		# pega o nome da variavel aqui de cima, e faz uma pesquisa completa no banco de dados 'user'
		$pegaInfos = $this->usuario->pegaUsuario($nome);

		$dados = array(
			'tela' => 'cliente',
			'titulo' => 'Clientes',
			'descricao' => ' - Cadastro de clientes para execução de serviços',
			'infos' => $pegaInfos,
			'clientes' => $this->funcoes->mostraClientes(),
		);

		$this->load->view('cliente',$dados);

	}// cliente


	public function novo(){

		# verificação de usuario logado, e se sim, tem que ser no perfil de administrador
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador'){
			redirect(base_url().'login');
		}

		# pega o nome do usuario que tem na session e passa >
		$nome = $this->session->userdata('username');
		# pega o nome da variavel aqui de cima, e faz uma pesquisa completa no banco de dados 'user'
		$pegaInfos = $this->usuario->pegaUsuario($nome);

		// mensagem de aviso do cadastro
		$mensagem = [];

		// Regras de validacao
		$this->form_validation->set_rules('nome', 			'nome', 			'trim|required');
		$this->form_validation->set_rules('cpf', 			'cpf', 				'trim');
		$this->form_validation->set_rules('dataNascimento', 'dataNascimento',	'trim');
		$this->form_validation->set_rules('email', 			'email', 			'trim');
		$this->form_validation->set_rules('telefone', 		'telefone', 		'trim');
		$this->form_validation->set_rules('celular', 		'celular', 			'trim');
		$this->form_validation->set_rules('dataCadastro', 	'dataCadastro', 	'trim');
		$this->form_validation->set_rules('usuarioCadastro','usuarioCadastro',	'trim');



		$nome = $this->input->post('nome');
		$cpf = $this->input->post('cpf');
		$dataNascimento = $this->input->post('dataNascimento');
		$email = $this->input->post('email');
		$telefone = $this->input->post('telefone');
		$celular = $this->input->post('celular');
		$dataCadastro = $this->input->post('dataCadastro');
		$usuarioCadastro = $this->input->post('usuarioCadastro');

		if( $this->form_validation->run() == FALSE ){
			if( validation_errors() ){
				$mensagem[0] = '<strong>Opa!</strong> Algo de errado aconteceu! ' . validation_errors();
				$mensagem[1] = 'alert-danger';
			}
		}else{
			
			$registra = array(
				"nome" => $nome,
				"cpf" => $cpf,
				"dataNascimento" => $dataNascimento,
				"email" => $email,
				"telefone" => $telefone,
				"celular" => $celular,
				"dataCadastro" => $dataCadastro,
				"usuarioCadastro" => $usuarioCadastro,
			);

			$this->funcoes->cadastraCliente($registra);

			$mensagem[0] = '<strong>Parabéns!</strong> Você cadastrou um novo Cliente!';
			$mensagem[1] = 'alert-success';
		}


		$dados = array(
			'tela' => 'novo',
			'titulo' => 'Cadastrar Cliente',
			'descricao' => ' - Cadastro de clientes para execução de serviços',
			'infos' => $pegaInfos,
			'mensagem' => $mensagem,
		);

		$this->load->view('cliente',$dados);

	}// cliente


	public function ficha(){

		# verificação de usuario logado, e se sim, tem que ser no perfil de administrador
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador'){
			redirect(base_url().'login');
		}

		# pega o nome do usuario que tem na session e passa >
		$nome = $this->session->userdata('username');
		# pega o nome da variavel aqui de cima, e faz uma pesquisa completa no banco de dados 'user'
		$pegaInfos = $this->usuario->pegaUsuario($nome);

		$dados = array(
			'tela' => 'ficha',
			'titulo' => 'Ficha do Cliente',
			'descricao' => ' - Ficha com as informações completas do cliente',
			'infos' => $pegaInfos,
			'clientes' => $this->funcoes->mostraClientes(),
		);

		$this->load->view('cliente',$dados);

	}// cliente


	public function editar(){

		# verificação de usuario logado, e se sim, tem que ser no perfil de administrador
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador'){
			redirect(base_url().'login');
		}

		# pega o nome do usuario que tem na session e passa >
		$nome = $this->session->userdata('username');
		# pega o nome da variavel aqui de cima, e faz uma pesquisa completa no banco de dados 'user'
		$pegaInfos = $this->usuario->pegaUsuario($nome);

		$mensagem = [];

		$this->form_validation->set_rules('nome', 			'nome', 			'trim|required');
		$this->form_validation->set_rules('cpf', 			'cpf', 				'trim');
		$this->form_validation->set_rules('dataNascimento', 'dataNascimento',	'trim');
		$this->form_validation->set_rules('email', 			'email', 			'trim');
		$this->form_validation->set_rules('telefone', 		'telefone', 		'trim');
		$this->form_validation->set_rules('celular', 		'celular', 			'trim');
		$this->form_validation->set_rules('dataCadastro', 	'dataCadastro', 	'trim');


		$id = $this->input->post('id');
		$nome = $this->input->post('nome');
		$cpf = $this->input->post('cpf');
		$dataNascimento = $this->input->post('dataNascimento');
		$email = $this->input->post('email');
		$telefone = $this->input->post('telefone');
		$celular = $this->input->post('celular');
		$dataCadastro = $this->input->post('dataCadastro');


		if( $this->form_validation->run() == FALSE ){
			if( validation_errors() ){
				$mensagem[0] = '<strong>Opa!</strong> Algo de errado aconteceu! ' . validation_errors();
				$mensagem[1] = 'alert-danger';
			}
		}else{
			
			$registra = array(
				"nome" => $nome,
				"cpf" => $cpf,
				"dataNascimento" => $dataNascimento,
				"email" => $email,
				"telefone" => $telefone,
				"celular" => $celular,
				"dataCadastro" => $dataCadastro,
			);

			$this->funcoes->editaCliente($registra, $id);

			$mensagem[0] = '<strong>Parabéns!</strong> Você editou o registro de um cliente!';
			$mensagem[1] = 'alert-success';
		}


		$dados = array(
			'tela' => 'editar',
			'titulo' => 'Editar Cliente',
			'descricao' => ' - Ficha com as informações completas do cliente',
			'infos' => $pegaInfos,
			'mensagem' => $mensagem,
		);

		$this->load->view('cliente',$dados);

	}// cliente



}
