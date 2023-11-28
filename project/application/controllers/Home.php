<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		if ($this->session->userdata('has_photo')){
			$this->load->model('User_model');
			$data['photo'] = $this->User_model->get_profile_image($this->session->userdata('user_name'));
			$this->load->view('templates/header', $data);
			$this->load->view('home');
			$this->load->view('templates/footer');
		} else {
			$this->load->view('templates/header');
			$this->load->view('home');
			$this->load->view('templates/footer');
		}
	}
}
