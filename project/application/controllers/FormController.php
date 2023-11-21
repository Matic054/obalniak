<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FormController extends CI_Controller {

    public function index() {
        $this->load->view('home');
    }

    public function validateLoginData() {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

	    $this->load->model('User_model');
            if ($this->User_model->check_user_credentials($username, $password)){
                $this->session->set_userdata('loggedIn', TRUE);
		        $this->session->set_userdata('user_name', $username);
            }
            redirect('/');
        } else {
            redirect('/');        
	    }
    }

    public function logOut() {
        $this->session->set_userdata('loggedIn', FALSE);
        redirect('/');
    }

    public function signin(){
        $this->load->view('templates/header');
		$this->load->view('signin');
		$this->load->view('templates/footer');
    }

    public function validateSigninData(){
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');

	        $this->load->model('User_model');
            if (FALSE == $this->User_model->check_user_credentials($username, $password)){
                $this->User_model->insert_user($username, $email, $password);
                $this->session->set_userdata('loggedIn', TRUE);
		        $this->session->set_userdata('user_name', $username);
            }
            redirect('/');
        } else {
            redirect('/');        
	    }
    }
    public function form_event(){
        $this->load->view('templates/header');
		$this->load->view('create_event_form');
		$this->load->view('templates/footer');
    }

}
