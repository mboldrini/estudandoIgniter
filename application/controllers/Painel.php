<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Painel extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library(array('session'));

		$this->load->helper('form', 'funcoes_helper');
		#pegar as infos dos usuarios
		$this->load->model('usuario');

		$this->load->model('funcoes');

	}
	

	public function index()	{

		# verificação de usuario logado, e se sim, tem que ser no perfil de administrador
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador'){
			redirect(base_url().'login');
		}

		# pega o nome do usuario que tem na session e passa >
		$nome = $this->session->userdata('username');
		# pega o nome da variavel aqui de cima, e faz uma pesquisa completa no banco de dados 'user'
		$pegaInfos = $this->usuario->pegaUsuario($nome);

		$dados = array(
			'tela' => 'content',
			'titulo' => 'Painel Administrativo',
			'descricao' => ' - Configurações do Sistema',
			'infos' => $pegaInfos,
			'qtdCliCad' => $this->funcoes->count_CliCad(),
			'qtdTipSer' => $this->funcoes->count_TipSer(),
			'qtdSerCad' => $this->funcoes->count_SerCad(),
		);

		$this->load->view('painel',$dados);

	}//index


	public function cliente(){

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
		);

		$this->load->view('cliente',$dados);

	}// cliente

	public function tiposervico(){

		# verificação de usuario logado, e se sim, tem que ser no perfil de administrador
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador'){
			redirect(base_url().'login');
		}


		# pega o nome do usuario que tem na session e passa >
		$nome = $this->session->userdata('username');
		# pega o nome da variavel aqui de cima, e faz uma pesquisa completa no banco de dados 'user'
		$pegaInfos = $this->usuario->pegaUsuario($nome);

		// Regras de validacao
		$this->form_validation->set_rules('servico', 'Serviço', 'trim|required');
		$this->form_validation->set_rules('contabil', 'Contábil', 'trim|required');
		$this->form_validation->set_rules('data', 'Data', 'trim|required');
		$this->form_validation->set_rules('usuario', 'Usuário', 'trim|required');

		if( $this->form_validation->run() == FALSE ){
			if( validation_errors() ){
				
			}
		}else{
			
		}


		$dados = array(
			'tela' => 'tiposervico',
			'titulo' => 'Tipos de Serviços',
			'descricao' => ' - Cadastro de tipos de serviços',
			'infos' => $pegaInfos,
		);

		$this->load->view('tiposervico',$dados);

	}// tipo servico

	public function valorservico(){

		# pega o nome do usuario que tem na session e passa >
		$nome = $this->session->userdata('username');
		# pega o nome da variavel aqui de cima, e faz uma pesquisa completa no banco de dados 'user'
		$pegaInfos = $this->usuario->pegaUsuario($nome);

		$dados = array(
			'tela' => 'valorservico',
			'titulo' => 'Valores de Serviços',
			'descricao' => ' - Cadastro de valores de serviços',
			'infos' => $pegaInfos,
		);

		$this->load->view('valorservico',$dados);

	}// valor servico


	public function servico(){

		$dados = array(
			'tela' => 'servico',
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



}
