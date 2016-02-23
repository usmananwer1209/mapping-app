<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');


class abstract_controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('users_model', 'users');
		//$this->load->model('user_circles_model', 'user_circles');		
		$this->load->model('user_companies_model', 'user_companies');

	}
	public function user(){
		$user = $this->session->userdata('user');
		return $user;
	}
	public function user_id(){
		$user = $this->session->userdata('user');

		if (!empty($user))
			return $user->id;
	}
	public function security($current) {
		$user = $this->session->userdata('user');
		if (!empty($user)) {
			if (has_acces($user, $current)) {
				$page_data = array();
				$page_data['current'] = $current;
				$page_data['description'] = '';
				$page_data['user'] = $user;
				$page_data['user_company'] = $this->user_companies->list_users_company(1,'',1,$user->id);
				$page_data['avatar'] = $this->users->get_avatar($user);
				//$page_data['my_recent_5_cards'] = $this->users->list_cards($user->id);
				//$page_data['my_recent_5_storyboards'] = $this->users->list_storyboards($user->id);
                                
				//var_dump($page_data['cards']);
				//$page_data['notifications'] = $this->user_circles->notifications($user->id);
				
				$page_data['notifications'] = array();

				return $page_data;
			} else
				redirect('authorization');
		} else
			redirect('login');
		return false;
	}


}