<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Painel extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library(array('session'));
	}
	

	public function index()	{

		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador'){
			redirect(base_url().'login');
		}

		$dados = array(
			'tela' => 'content',
			'titulo' => 'Painel Administrativo',
			'descricao' => ' - Configurações do Sistema',
			'id' => $this->session->userdata('id_usuario'),
		);

		$this->load->view('painel',$dados);

	}//index


	public function cliente(){

		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador'){
			redirect(base_url().'login');
		}

		$dados = array(
			'tela' => 'cliente',
			'titulo' => 'Clientes',
			'descricao' => ' - Cadastro de clientes para execução de serviços'
		);

		$this->load->view('cliente',$dados);

	}// cliente

	public function tiposervico(){

		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador'){
			redirect(base_url().'login');
		}

		$dados = array(
			'tela' => 'tiposervico',
			'titulo' => 'Tipos de Serviços',
			'descricao' => ' - Cadastro de tipos de serviços'
		);

		$this->load->view('tiposervico',$dados);

	}// tipo servico

	public function valorservico(){

		$dados = array(
			'tela' => 'valorservico',
			'titulo' => 'Valores de Serviços',
			'descricao' => ' - Cadastro de valores de serviços'
		);

		$this->load->view('valorservico',$dados);

	}// valor servico


	public function servico(){

		$dados = array(
			'tela' => 'servico',
			'titulo' => 'Serviços',
			'descricao' => ' - Cadastro de Serviços'
		);

		$this->load->view('servico',$dados);

	}// servico



}
