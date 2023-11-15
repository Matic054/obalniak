<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NavrhuController extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('navrhu');
		$this->load->view('templates/footer');
	}
}
