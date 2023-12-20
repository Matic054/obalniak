<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventsController extends CI_Controller {

	public function index()
	{
		$this->load->model('Event_model');
        $data['events'] = $this->Event_model->get_events();

        if ($this->session->userdata('has_photo')){
			$this->load->model('User_model');
			$data['photo'] = $this->User_model->get_profile_image($this->session->userdata('user_name'));
			$this->load->view('templates/header', $data);
			$this->load->view('events', $data);
		    $this->load->view('templates/footer');
		} else {
			$this->load->view('templates/header');
            $this->load->view('events', $data);
            $this->load->view('templates/footer');
		}
	}

	public function load_specific_event($event_id) {
        $this->load->model('Event_model');
        $data['event'] = $this->Event_model->get_event_by_id($event_id);
		$data['event_images'] = $this->Event_model->get_event_images($event_id);

        if ($this->session->userdata('has_photo')){
			$this->load->model('User_model');
			$data['photo'] = $this->User_model->get_profile_image($this->session->userdata('user_name'));
			$this->load->view('templates/header', $data);
			$this->load->view('event_view', $data);
		    $this->load->view('templates/footer');
		} else {
			$this->load->view('templates/header');
            $this->load->view('event_view', $data);
            $this->load->view('templates/footer');
		}
    }

	public function create(){
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $this->input->post('title');
            $text = $this->input->post('text');

			$this->load->model('User_model');
			$user_name = $this->session->userdata('user_name');
			$user_id = $this->User_model->get_id_by_username($user_name);
            $event_data = array(
				'user_id' => $user_id,
                'title' => $title,
                'text' => $text
            );

            $this->load->model('Event_model');
            $event_id = $this->Event_model->create_event($event_data);

            if ($event_id) {
                $this->load->library('upload');
				//var_dump($_FILES['images']['name']);
                foreach ($_FILES['images']['name'] as $key => $image_name) {
                    $image_tmp_name = $_FILES['images']['tmp_name'][$key];
                    $image_data = file_get_contents($image_tmp_name);

                    $this->Event_model->insert_event_image($event_id, $image_data);
                }
				$this->load_specific_event($event_id);
            }
		}
	}

	public function delete_event($event_id){
		$this->load->model('Event_model');
		$this->Event_model->delete_event($event_id);
		$this->Event_model->delete_event_image($event_id);
		redirect("/index.php/events");
	}
}
