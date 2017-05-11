<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Usuario extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}

	public function pegaUsuario( $username = NULL ){
		$query = $this->db->query("SELECT * FROM users where username = '$username'");
       return $query->result();
	}




}