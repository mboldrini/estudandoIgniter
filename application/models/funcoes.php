<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Funcoes extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}

	#conta os tipos de serviços cadastrados
	public function count_TipSer(){
		$query = $this->db->query('SELECT * FROM tiposervico');
		return $query->num_rows();
	}
	# conta a quantidade de clientes cadastrados
	public function count_CliCad(){
		$query = $this->db->query('SELECT * FROM clientes');
		return $query->num_rows();
	}
	# conta a quantidade de servicos cadastrados
	public function count_serCad(){
		$query = $this->db->query('SELECT * FROM servicos');
		return $query->num_rows();
	}


	public function cadastraTipoServico($dados = NULL){
		if($dados != NULL){
			$this->db->insert('tiposervico', $dados );			
		}
	}


	public function mostraTiposServicos(){
		$query = $this->db->get('tiposervico');
		if( $query->num_rows() > 0){
			return $query->result();
		}

	}


	public function pegaTipoServico( $id = NULL ){
		if( $id != NULL ){
			/* seleciona no DB onde o campo ID == $id */
			$this->db->where('id',$id);
			
			/* mostra apenas 1 resultado, e TEM q ser 1 resultado pois ID é unico */
			$this->db->limit(1);
			
			/* pega a tabela aluno */
			return $this->db->get('tiposervico');
		}else{
			return FALSE;			
		}
	}



	public function atualizaTipoServico($dados, $condicao){

			$this->db->where('id',$condicao);
			/* atualiza o banco de dados aluno com os $dados usando a $condição */
			$this->db->update('tiposervico',$dados);
			
			/* ao terminar de editar o registro vai para a tela de alunos cadastrados */
			return $this->db->affected_rows();
			
	}
	

	public function cadastraCliente($dados = NULL){
		if($dados != NULL){
			$this->db->insert('clientes', $dados );			
		}
	}

	// mostra todos os clientes cadastrados
	public function mostraClientes(){
		$query = $this->db->get('clientes');
		if( $query->num_rows() > 0){
			return $query->result();
		}
	}

	// pega as informacoes apenas de um cliente especifico
	public function pegaFichaCliente( $id = NULL ){
		if( $id != NULL ){
			/* seleciona no DB onde o campo ID == $id */
			$this->db->where('id',$id);
			
			/* mostra apenas 1 resultado, e TEM q ser 1 resultado pois ID é unico */
			$this->db->limit(1);
			
			/* pega a tabela aluno */
			return $this->db->get('clientes');
		}else{
			return FALSE;			
		}
	}

	public function editaCliente($dados, $condicao){

			$this->db->where('id',$condicao);
			/* atualiza o banco de dados aluno com os $dados usando a $condição */
			$this->db->update('clientes',$dados);
			/* ao terminar de editar o registro vai para a tela de alunos cadastrados */
			return $this->db->affected_rows();
			
	}





	// funcao publica para exclusao de um id de qualquer tabela
	public function do_delete($id, $tabela, $redireciona){

			// $id 			=> é o id a ser excluido
			// $tabela 		=> qual tabela será afetada 
			// $redireciona => vai redirecionar pra onde depois de executar tudo

			$this->db->delete($tabela,$id);

			redirect( base_url() . $redireciona );
			
	}// funcao do_delete


	public function do_get( $id, $tabela ){
		if( $id != NULL ){
			/* seleciona no DB onde o campo ID == $id */
			$this->db->where('id',$id);
			
			/* mostra apenas 1 resultado, e TEM q ser 1 resultado pois ID é unico */
			$this->db->limit(1);
			
			/* pega a tabela aluno */
			return $this->db->get($tabela)->row();
		}else{
			return FALSE;			
		}
	}

	public function do_getAll($tabela){
		$query = $this->db->get($tabela);
		if( $query->num_rows() > 0){
			return $query->result();
		}
	}


	public function do_insert($dados, $tabela){
		if($dados != NULL){
			$this->db->insert($tabela, $dados );			
		}
	}


}