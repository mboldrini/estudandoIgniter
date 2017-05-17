<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library(array('session'));

		$this->load->helper('form', 'funcoes_helper');
		#pegar as infos dos usuarios
		$this->load->model('usuario');

		$this->load->model('funcoes');

	}


	public function novo(){

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




	


	

}// Porra Toda