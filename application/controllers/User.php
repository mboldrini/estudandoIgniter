<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library(array('session'));

		$this->load->helper('form', 'funcoes_helper');
		#pegar as infos dos usuarios
		$this->load->model('usuario');

		$this->load->model('funcoes');

	}


	public function listar(){

		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador'){
			redirect(base_url().'login');
		}

		# pega o nome do usuario que tem na session e passa >
		$nome = $this->session->userdata('username');
		# pega o nome da variavel aqui de cima, e faz uma pesquisa completa no banco de dados 'user'
		$pegaInfos = $this->usuario->pegaUsuario($nome);

		$dados = array(
			'tela' => 'listar',
			'titulo' => 'Usuários Cadastrados',
			'descricao' => ' - Lista de Usuários cadastrados no sistema',
			'infos' => $pegaInfos,
			'usuarios' => $this->funcoes->do_getAll('users'),
		);

		$this->load->view('user',$dados);

	}// valor servico


	public function novo(){

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
		$this->form_validation->set_rules('sobrenome', 		'nome', 			'trim|required');
		$this->form_validation->set_rules('descricao', 		'descricao', 		'trim|required');
		$this->form_validation->set_rules('user', 			'user', 			'trim|required');
		$this->form_validation->set_rules('password', 		'password', 		'trim|required');
		//$this->form_validation->set_rules('passwordconfirm','passwordconfirm', 	'trim|required|match[password]');

		$perfil 	= "administrador";
		$nome 		= $this->input->post('nome');
		$sobrenome 	= $this->input->post('sobrenome');
		$descricao 	= $this->input->post('descricao');
		$user 		= $this->input->post('user');
		$password 	= sha1( $this->input->post('password') );

		if( $this->form_validation->run() == FALSE ){
			if( validation_errors() ){
				$mensagem[0] = '<strong>Opa!</strong> Algo de errado aconteceu! ' . validation_errors();
				$mensagem[1] = 'alert-danger';
			}
		}else{
			
			$registra = array(
				"perfil" => $perfil,
				"username" => $user,
				"password" => $password,
				"nome" => $nome,
				"sobrenome" => $sobrenome,
				"descricao" => $descricao,
			);

			$this->funcoes->do_insert($registra, "users");

			$mensagem[0] = '<strong>Parabéns!</strong> Você cadastrou um novo Usuário!';
			$mensagem[1] = 'alert-success';
		}


		$dados = array(
			'tela' => 'novo',
			'titulo' => 'Cadastrar Usuário',
			'descricao' => ' - Cadastrar novo usuário no sistema',
			'infos' => $pegaInfos,
			'mensagem' => $mensagem,
		);

		$this->load->view('user',$dados);

	}// valor servico


	public function editar(){

		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador'){
			redirect(base_url().'login');
		}

		# pega o nome do usuario que tem na session e passa >
		$nome = $this->session->userdata('username');
		# pega o nome da variavel aqui de cima, e faz uma pesquisa completa no banco de dados 'user'
		$pegaInfos = $this->usuario->pegaUsuario($nome);

		$mensagem = [];

		// Regras de validacao
		$this->form_validation->set_rules('id', 			'id', 				'trim|required');
		$this->form_validation->set_rules('nome', 			'nome', 			'trim|required');
		$this->form_validation->set_rules('sobrenome', 		'nome', 			'trim|required');
		$this->form_validation->set_rules('descricao', 		'descricao', 		'trim|required');
		$this->form_validation->set_rules('username', 		'username', 		'trim|required');

		$id 		= $this->input->post('id');
		$nome 		= $this->input->post('nome');
		$sobrenome 	= $this->input->post('sobrenome');
		$descricao 	= $this->input->post('descricao');
		$username 		= $this->input->post('username');

		if( $this->form_validation->run() == FALSE ){
			if( validation_errors() ){
				$mensagem[0] = '<strong>Opa!</strong> Algo de errado aconteceu! ' . validation_errors();
				$mensagem[1] = 'alert-danger';
			}
		}else{
			$idUser = array("id"=>$id);
			$tabela = "users";
			$registra = array(
				"username" => $username,
				"nome" => $nome,
				"sobrenome" => $sobrenome,
				"descricao" => $descricao,
			);

			$this->funcoes->do_update($registra, $tabela, $idUser);

			$mensagem[0] = '<strong>Parabéns!</strong> Você editou um Usuário!';
			$mensagem[1] = 'alert-success';
		}

		$dados = array(
			'tela' => 'editar',
			'titulo' => 'Usuários Cadastrados',
			'descricao' => ' - Lista de Usuários cadastrados no sistema',
			'infos' => $pegaInfos,
			'mensagem' => $mensagem,
		);

		$this->load->view('user',$dados);

	}// valor servico


	public function excluir(){

		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador'){
			redirect(base_url().'login');
		}

		# pega o nome do usuario que tem na session e passa >
		$nome = $this->session->userdata('username');
		# pega o nome da variavel aqui de cima, e faz uma pesquisa completa no banco de dados 'user'
		$pegaInfos = $this->usuario->pegaUsuario($nome);

		$dados = array(
			'tela' => 'excluir',
			'titulo' => 'Usuários Cadastrados',
			'descricao' => ' - Lista de Usuários cadastrados no sistema',
			'infos' => $pegaInfos,
			'usuarios' => $this->funcoes->do_getAll('users'),
		);

		$this->load->view('user',$dados);

	}// valor servico
	


	

}// Porra Toda