<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Term_rule_source_model extends CI_Model{

	public function __construct(){

        	parent::__construct();

	}  

	public function get_source(){

                $get_source = $this->db->get('term_rule_source');

                return $get_source->result_array();
		
	}

}
