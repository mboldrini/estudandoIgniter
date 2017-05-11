<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Funcoes extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}

	public function count_TipSer(){

		$query = $this->db->query('SELECT * FROM tiposervico');
		return $query->num_rows();

	}


	public function count_CliCad(){

		$query = $this->db->query('SELECT * FROM clientes');
		return $query->num_rows();

	}

	public function count_serCad(){
		$query = $this->db->query('SELECT * FROM servicos');
		return $query->num_rows();
	}



}