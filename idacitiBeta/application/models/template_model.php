<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'abstract_model.php';

class Template_model extends Abstract_model{
	public function __construct(){
		parent::__construct();
		$this->table = 'list_kpis';
		}
	protected function set_object($data = array()){
		foreach($data as $index => $value){
			if(strcmp($index, 'id') == 0)
				$this->db->set($index,  $value);
			elseif(strcmp($index, 'name') == 0)
				$this->db->set($index,  $value);
			elseif(strcmp($index, 'description') == 0)
				$this->db->set($index,  $value);
			elseif(strcmp($index, 'kpis') == 0)
				$this->db->set($index,  $value);
			elseif(strcmp($index, 'user') == 0)
				$this->db->set($index,  $value);
			elseif(strcmp($index, 'is_template') == 0)
				$this->db->set($index,  $value);
			elseif(strcmp($index, 'company') == 0)
				$this->db->set($index,  $value);
			elseif(strcmp($index, 'public') == 0)
				$this->db->set($index,  $value);
			elseif(strcmp($index, 'creation_time') == 0){
				if(strcmp($value, 'now') == 0)
					$this->db->set($index, 'NOW()', false);
				else
					$this->db->set($index, $value);
				}
			elseif(strcmp($index, 'modification_time') == 0){
				if(strcmp($value, 'now') == 0)
					$this->db->set($index, 'NOW()', false);
				else
					$this->db->set($index, $value);
				}
			}
	}
	public function get_clone_name($name){
		$result = $this->db->query('SELECT name FROM '.$this->table.' WHERE is_template = 1 AND name LIKE "'.$name.'%" ');
		$names =  $result->result();
		if(count($names)>0){
			$i=1;
			foreach($names as $na){
				if($na->name != $name.''.$i){
					return $name.''.$i;
				}else{
					$i++;
				}
			}
			return $name.''.$i;
		}else{
			return $name.'1';
		}
	}
}