<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {
	public function view_users()
	{
		$this->load->model('User_model');
		$data['users'] = $this->User_model->get_users();

		if ($this->session->userdata('has_photo')){
			$this->load->model('User_model');
			$data['photo'] = $this->User_model->get_profile_image($this->session->userdata('user_name'));
			$this->load->view('templates/header', $data);
			$this->load->view('users_view', $data);
		    $this->load->view('templates/footer');
		} else {
			$this->load->view('templates/header');
            $this->load->view('users_view', $data);
            $this->load->view('templates/footer');
		}
	}
}
