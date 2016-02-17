<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Term_model extends CI_Model{

	public function __construct(){

        	parent::__construct();

        	$this->load->helper('curl');

	}  

	public function curl_responce($url){

                //echo $this->url = REST_API_ENTITY;
                //echo $this->url = str_replace('{0}', IDACITI_TOKEN, $this->url);                

        	$this->url = $url;

                log_message('debug', 'Api_model-get_companies_data url: ' . $this->url);

                $this->benchmark->mark('Api_model-get_companies_data_start');

                $_mycurl = new  mycurl($this->url);
                $_mycurl->useAuth(false);
                $_mycurl->createCurl();
                $result = (string)$_mycurl;

                $this->benchmark->mark('Api_model-get_companies_data_end');

                log_message('debug', 'Api_model-get_companies_data: ' . $this->benchmark->elapsed_time('Api_model-get_companies_data_start', 'Api_model-get_companies_data_end'));

                $result = json_decode($result, true);

                return $result;
		
	}

}
