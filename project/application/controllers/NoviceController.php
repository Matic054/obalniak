<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NoviceController extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('novice');
		$this->load->view('templates/footer');
	}
}
