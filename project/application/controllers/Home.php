<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$this->load->model('Advertisements_model');
		$data2['ad'] = $this->Advertisements_model->get_displayed_ad();
		if ($this->session->userdata('has_photo')){
			$this->load->model('User_model');
			$data['photo'] = $this->User_model->get_profile_image($this->session->userdata('user_name'));
			$this->load->view('templates/header', $data);
			$this->load->view('home');
			$this->load->view('templates/footer', $data2);
		} else {
			$this->load->view('templates/header');
			$this->load->view('home');
			$this->load->view('templates/footer', $data2);
		}
	}
}
