<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Term_rule_decision_model extends CI_Model{

        public function __construct(){

        parent::__construct();

        }  

        public function create_decision($decision_categories){

        $decision_categories_arr = $decision_categories;                

        // echo "<pre>";

        // print_r($decision_categories_arr);

        // exit;

                foreach($decision_categories_arr as $decision_categories)
                {        
                        foreach ($decision_categories as $d_c_a)
                        {        
                                $create_date = array(
                                        
                                        'name' => explode(":", $d_c_a['decisionCategory'])[0],
                                        'sub_category_name' => explode(":", $d_c_a['decisionCategory'])[1],                         
                                
                                );

                                $this->db->insert('decision_category',  $create_date);

                                break;
                        }
                }  

                return 1;              

        }

        public function get_decision(){

                $decision_category = $this->db->get('decision_category');
                
                return $decision_category->result_array();
        }

}
