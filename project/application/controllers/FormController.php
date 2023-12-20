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
                if ($this->User_model->is_admin($username)){
                    $this->session->set_userdata('admin', TRUE);
                }else{
                    $this->session->set_userdata('admin', FALSE);
                }
                $photo = $this->User_model->get_profile_image($username);
                if ($photo[0]["profile_picture"] == null | strlen($photo[0]["profile_picture"]) < 10){
                    $this->session->set_userdata('has_photo', FALSE);
                } else {
                    $this->session->set_userdata('has_photo', TRUE);
                }
		        redirect('/');
            } else {
       		    redirect("/");
            }
        }
    }

    public function logOut() {
        $this->session->set_userdata('loggedIn', FALSE);
        $this->session->set_userdata('admin', FALSE);
        $this->session->set_userdata('has_photo', FALSE);
        redirect('/');
    }

    public function signin(){
        if ($this->session->userdata('has_photo')){
			$this->load->model('User_model');
			$data['photo'] = $this->User_model->get_profile_image($this->session->userdata('user_name'));
			$this->load->view('templates/header', $data);
			$this->load->view('signin');
		    $this->load->view('templates/footer');
		} else {
			$this->load->view('templates/header');
            $this->load->view('signin');
            $this->load->view('templates/footer');
		}
    }

    public function validateSigninData(){
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $password = $this->input->post('password');

            $image_tmp_name = $_FILES['image']['tmp_name'];
            $profile_image = file_get_contents($image_tmp_name);

	        $this->load->model('User_model');
            if (FALSE == $this->User_model->check_user_credentials($username, $password)){
                $this->User_model->insert_user($username, $email, $password, $phone, $profile_image);
            }
        }
        redirect('/');
    }

    public function form_report(){
        if ($this->session->userdata('has_photo')){
			$this->load->model('User_model');
			$data['photo'] = $this->User_model->get_profile_image($this->session->userdata('user_name'));
			$this->load->view('templates/header', $data);
			$this->load->view('create_report_form');
		    $this->load->view('templates/footer');
		} else {
			$this->load->view('templates/header');
            $this->load->view('create_report_form');
            $this->load->view('templates/footer');
		}
    }

    public function form_event(){
        if ($this->session->userdata('has_photo')){
			$this->load->model('User_model');
			$data['photo'] = $this->User_model->get_profile_image($this->session->userdata('user_name'));
			$this->load->view('templates/header', $data);
			$this->load->view('create_event_form');
		    $this->load->view('templates/footer');
		} else {
			$this->load->view('templates/header');
            $this->load->view('create_event_form');
            $this->load->view('templates/footer');
		}
    }

    public function form_alpine(){
        if ($this->session->userdata('has_photo')){
			$this->load->model('User_model');
			$data['photo'] = $this->User_model->get_profile_image($this->session->userdata('user_name'));
			$this->load->view('templates/header', $data);
			$this->load->view('create_alpine_form');
		    $this->load->view('templates/footer');
		} else {
			$this->load->view('templates/header');
            $this->load->view('create_alpine_form');
            $this->load->view('templates/footer');
		}
    }

    public function form_route(){
        $this->load->model('User_model');
		$data['users'] = $this->User_model->get_users();
        if ($this->session->userdata('has_photo')){
			$this->load->model('User_model');
			$data['photo'] = $this->User_model->get_profile_image($this->session->userdata('user_name'));
			$this->load->view('templates/header', $data);
			$this->load->view('create_route_form');
		    $this->load->view('templates/footer');
		} else {
			$this->load->view('templates/header');
            $this->load->view('create_route_form', $data);
            $this->load->view('templates/footer');
		}
    }


}
