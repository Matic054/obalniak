<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DogodkiController extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('dogodki');
		$this->load->view('templates/footer');
	}
}
