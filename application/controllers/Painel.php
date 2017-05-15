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



}
