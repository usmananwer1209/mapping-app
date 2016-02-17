<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Term_rule_type_model extends CI_Model{

        public function __construct(){

                parent::__construct();

        }  

        public function get_type(){

                $get_type = $this->db->get('term_rule_type');

                return $get_type->result_array();
                
        }

}        
