<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Term_rule_financial_model extends CI_Model{

        public function __construct(){

        parent::__construct();

        }  

        public function create_financial($financial_categories){

        $financial_categories_arr = $financial_categories;                

        // echo "<pre>";

        // print_r($financial_categories_arr);

        // exit;

                foreach($financial_categories_arr as $financial_categories)
                {        
                        foreach ($financial_categories as $d_c_a)
                        {        
                                $create_date = array(
                                        
                                        'name' => explode(":", $d_c_a['financialCategory'])[0],
                                        'sub_category_name' => explode(":", $d_c_a['financialCategory'])[1],                         
                                
                                );

                                $this->db->insert('financial_category',  $create_date);

                                break;
                        }
                }  

                return 1;              

        }

        public function get_financial(){

                $financial_category = $this->db->get('financial_category');

                return $financial_category->result_array(); 
                
        }

}