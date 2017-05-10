<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Painel extends CI_Controller {

	public function index()	{

		$dados = array(
			'tela' => 'content',
			'titulo' => 'Painel Administrativo',
			'descricao' => ' - Painel de Configurações do Sistema'
		);

		$this->load->view('painel',$dados);

	}


}
