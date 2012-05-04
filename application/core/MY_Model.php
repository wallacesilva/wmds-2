<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model{

	protected $table_name = null;

	function __construct(){

    parent::__construct();
    
  }

  function get_table_name(){

  	return $this->table_name;

  }

	/**
	 * @author Wallace Silva <contato [at] wallacesilva [dot] com>
	 * @param array $where Recebe um array com as chaves e valores referente as condicoes (where do SQL)
	 * @param array $order Recebe um array com as chaves e valores refente a ordenacao (order by do SQL)
	 * @param integer $limit Recebe valor de quanto devem ser retornados (limit do SQL), default 10
	 * @param integer $offset Recebe valor de qual deve ser o primeiro registro para comecar a retornar (limit do SQL), default 0
	 */
	function fetchAll($where=null, $order=null, $limit=10, $offset=0){

		if( !empty($where) && is_array($where) ){
				
			foreach ($where as $key => $value) 
				$this->db->where($key, $value);

		} 

		if( !empty($order) && is_array($order) ){

			foreach ($order as $key => $value) 
				$this->db->order_by($key, $value);

		}

		$this->db->limit($limit, $offset);

		$result = $this->db->get($this->table_name);

		return $result->result();

	}

	/**
	 * @author Wallace Silva <contato [at] wallacesilva [dot] com>
	 * @param integer/array $ids Recebe id ou ids a serem buscado
	 */
	function find($ids=null){

		if( is_null($ids) || ( is_integer($ids) && $ids < 1 ) )
			return false;

		if( is_array($ids) )
			foreach ($ids as $id) 
				$this->db->where('id', $id);
		
		$result = $this->db->get($this->table_name);

		return $result->result();

	}

	/**
	 * Save salva dados passados por parametro, verifica se existe no array o id e faz update ou insert automaticamente
	 * @author Wallace Silva <contato [at] wallacesilva [dot] com>
	 * @param array $data Dados para serem inseridos/atualizados 
	 */
	function save($data=null, $return_id=true){

		if( !is_array($data) )
			return false;

		$result = false;

		if( !isset($data['id']) )
			$result = $this->insert($data, $return_id);
		else 			
			$result = $this->update($data);

		return $result;

	}

	/**
	 * Insert dados passados por parametro
	 * @author Wallace Silva <contato [at] wallacesilva [dot] com>
	 * @param array $data Dados para serem inseridos
	 */
	function insert($data=null, $return_id=true){

		if( !is_array($data) )
			return false;

		if( isset($data['id']) )
			unset( $data['id'] );

		$return = $this->db->insert($this->table_name, $data); 

		if( $return_id ){
			
			$return = $this->db->insert_id();
			return $return;

		}	else {

			return $return->result();

		}

	}

	/**
	 * Update dados passados por parametro
	 * @author Wallace Silva <contato [at] wallacesilva [dot] com>
	 * @param array $data Dados para serem inseridos
	 */
	function update($data=null){

		if( !is_array($data) || !isset($data['id']) )
			return false;

		$this->db->where('id', $data['id']);
		unset($data['id']);

		$return = $this->db->update($this->table_name, $data); 

		return $return;

	}
	
	/**
	 * Delete - Remove id passado por parametro
	 * @author Wallace Silva <contato [at] wallacesilva [dot] com>
	 * @param integer $id Dados para ser removido
	 */
	function delete($id=null){

		if( is_null($id) || $id < 1 )
			return false;

		$this->db->where('id',$id);
		$return = $this->db->delete($this->table_name);

		return $return;

	}

	function mergeObject($object=null, $obj_return=null){

		if( !is_object($object) )
			$object = new stdClass;

		$val_return = array();

  	foreach ($obj_return as $obj) {

  		$obj_temp = clone $object;
  		
  		foreach($obj as $k => $v) $obj_temp->$k = $v;

  		$val_return[] = $obj_temp;

  	}

  	return $val_return;



	}

}

?>