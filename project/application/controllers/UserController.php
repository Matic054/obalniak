<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {
	public function view_users()
	{
		$this->load->model('Advertisements_model');
		$data2['ad'] = $this->Advertisements_model->get_displayed_ad();

		$this->load->model('User_model');
		$data['users'] = $this->User_model->get_users();

		if ($this->session->userdata('has_photo')){
			$this->load->model('User_model');
			$data['photo'] = $this->User_model->get_profile_image($this->session->userdata('user_name'));
			$this->load->view('templates/header', $data);
			$this->load->view('users_view', $data);
		    $this->load->view('templates/footer', $data2);
		} else {
			$this->load->view('templates/header');
            $this->load->view('users_view', $data);
            $this->load->view('templates/footer', $data2);
		}
	}

	public function delete_user($user_id){
		$this->load->model('User_model');
		$this->User_model->delete_user($user_id);
	}

	public function make_admin($user_id){
		$this->load->model('User_model');
		$this->User_model->make_admin($user_id);
	}

	public function confirm_user($user_id){
		$this->load->model('User_model');
		$this->User_model->confirm_user($user_id);
	}
}
