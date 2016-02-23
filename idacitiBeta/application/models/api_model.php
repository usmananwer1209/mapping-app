<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

$folder = dirname(dirname(__FILE__));
//require_once $folder . "/helpers/curl.php";
//require_once 'abstract_mongo_model.php';

class Api_model extends CI_Model {

    public $url;
    
    public function __construct(){
        parent::__construct();

        $this->load->helper('curl');
    }

    protected function clean_str($dataIn){

        $ds = str_replace('"', '', $dataIn);
        $ds = str_replace(' ', '', $ds);

        return $ds;
    }

    protected function myUrlEncode($string) {

            $entities = array('+', '%21', '%2A', '%27', '%28', '%29', '%3B', '%3A', '%40', '%26', '%3D', '%2B', '%24', '%2C', '%2F', '%3F', '%25', '%23', '%5B', '%5D', ',');
            $replacements = array('%20' ,'!', '*', "'", "(", ")", ";", ":", "@", "&amp;", "=", "+", "$", ",", "/", "?", "%", "#", "[", "]", "%2C");
            return str_replace($entities, $replacements, urlencode($string));

    }

    public function get_term_rules() {

        //$this->clean_str();

        $this->url = REST_API_TERM_RULES;
        $this->url = str_replace('{0}', API_TOKEN, $this->url);

        log_message('debug', 'Api_model-drilldown url: ' . $this->url);

        // no cache on drilldown

        $this->benchmark->mark('Api_model-drilldown_start');

        $_mycurl = new  mycurl($this->url);
        $_mycurl->useAuth(false);
        $_mycurl->createCurl();
        $result = (string)$_mycurl;

        $result = json_decode($result, true);

        // echo "<pre>";

        // print_r($result);

        // exit;

        $this->benchmark->mark('Api_model-drilldown_end');

        log_message('debug', 'Api_model-drilldown: ' . $this->benchmark->elapsed_time('Api_model-drilldown_start', 'Api_model-drilldown_end'));

        return $result;
    }

    public function get_term_rule($term_id) {

        //$this->clean_str();

        $this->url = REST_API_TERM_RULE;
        $this->url = str_replace('{0}', API_TOKEN, $this->url);
        $this->url = str_replace('{1}', $term_id, $this->url);

        log_message('debug', 'Api_model-drilldown url: ' . $this->url);

        // no cache on drilldown

        $this->benchmark->mark('Api_model-drilldown_start');

        $_mycurl = new  mycurl($this->url);
        $_mycurl->useAuth(false);
        $_mycurl->createCurl();
        $result = (string)$_mycurl;

        $result = json_decode($result, true);

        $this->benchmark->mark('Api_model-drilldown_end');

        log_message('debug', 'Api_model-drilldown: ' . $this->benchmark->elapsed_time('Api_model-drilldown_start', 'Api_model-drilldown_end'));

        return $result;
    }

    public function get_term_rule_coverge($term_id) {

        //$this->clean_str();

        $this->url = REST_API_TERM_RULE_COVERAGE;
        $this->url = str_replace('{0}', API_TOKEN, $this->url);
        $this->url = str_replace('{1}', $term_id, $this->url);

        log_message('debug', 'Api_model-drilldown url: ' . $this->url);

        // no cache on drilldown

        $this->benchmark->mark('Api_model-drilldown_start');

        $_mycurl = new  mycurl($this->url);
        $_mycurl->useAuth(false);
        $_mycurl->createCurl();
        $result = (string)$_mycurl;

        $result = json_decode($result, true);

        $this->benchmark->mark('Api_model-drilldown_end');

        log_message('debug', 'Api_model-drilldown: ' . $this->benchmark->elapsed_time('Api_model-drilldown_start', 'Api_model-drilldown_end'));

        return $result;
    }

    public function get_term_rule_coverage_sector_industry() {

        $term_id = trim($this->input->post('term_id'));

        if(strpos($this->input->post('sector'), '&') == true)
        {

            $sector = trim($this->myUrlEncode('"'.$this->input->post('sector').'"'));
        }
        else
        {   

            $sector = trim($this->myUrlEncode($this->input->post('sector')));
        
        } 

        if(strpos($this->input->post('industry'), '&') == true)
        {

            $industry = trim($this->myUrlEncode('"'.$this->input->post('industry').'"'));
        }
        else
        {   

            $industry = trim($this->myUrlEncode($this->input->post('industry')));
        
        }  

        $sic_code = trim($this->input->post('sic_code'));         

        $this->url = REST_API_TERM_RULE_COVERAGE_SECTOR_INDUSTRY;
        $this->url = str_replace('{0}', API_TOKEN, $this->url);
        $this->url = str_replace('{1}', $term_id, $this->url);
        $this->url = str_replace('{2}', $sector, $this->url);
        $this->url = str_replace('{3}', $industry, $this->url);
        $this->url = str_replace('{4}', $sic_code, $this->url);

        log_message('debug', 'Api_model-drilldown url: ' . $this->url);

        // no cache on drilldown

        $this->benchmark->mark('Api_model-drilldown_start');

        $_mycurl = new  mycurl($this->url);
        $_mycurl->useAuth(false);
        $_mycurl->createCurl();
        $result = (string)$_mycurl;

        $result = json_decode($result, true);

        $this->benchmark->mark('Api_model-drilldown_end');

        log_message('debug', 'Api_model-drilldown: ' . $this->benchmark->elapsed_time('Api_model-drilldown_start', 'Api_model-drilldown_end'));

        return $result;
    }

    public function get_view_term_rule($entity_id, $term_id) {

        $this->url = REST_API_VIEW_TERM_RULE;
        $this->url = str_replace('{0}', API_TOKEN, $this->url);
        $this->url = str_replace('{1}', $entity_id, $this->url);
        $this->url = str_replace('{2}', $term_id, $this->url);        

        log_message('debug', 'Api_model-drilldown url: ' . $this->url);

        // no cache on drilldown

        $this->benchmark->mark('Api_model-drilldown_start');

        $_mycurl = new  mycurl($this->url);
        $_mycurl->useAuth(false);
        $_mycurl->createCurl();
        $result = (string)$_mycurl;

        $result = json_decode($result, true);

        $this->benchmark->mark('Api_model-drilldown_end');

        log_message('debug', 'Api_model-drilldown: ' . $this->benchmark->elapsed_time('Api_model-drilldown_start', 'Api_model-drilldown_end'));

        return $result;
    }            

}

