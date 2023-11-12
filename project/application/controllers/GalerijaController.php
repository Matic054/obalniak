<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GalerijaController extends CI_Controller {

	public function index()
	{
		$this->load->view('galerija');
	}
}
