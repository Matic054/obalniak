<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DogodkiController extends CI_Controller {

	public function index()
	{
		$this->load->model('Event_model');
        $data['events'] = $this->Event_model->get_events();

		$this->load->view('templates/header');
		$this->load->view('dogodki', $data);
		$this->load->view('templates/footer');
	}

	public function load_specific_event($event_id) {
        // Use $event_id to fetch the specific event from the database
        $this->load->model('Event_model');
        $data['event'] = $this->Event_model->get_event_by_id($event_id);
		$data['event_images'] = $this->Event_model->get_event_images($event_id);
		$data['comments'] = $this->Event_model->get_comments($event_id);

		$this->load->view('templates/header');
		$this->load->view('event_view', $data);
		$this->load->view('templates/footer');
    }

	public function create(){
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $this->input->post('title');
            $text = $this->input->post('text');

            // Step 1: Insert Event Information
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

            // Step 2: Retrieve Event ID
            if ($event_id) {
                // Step 3: Insert Event Images
                $this->load->library('upload');

                foreach ($_FILES['images']['name'] as $key => $image_name) {
                    $image_tmp_name = $_FILES['images']['tmp_name'][$key];
                    $image_data = file_get_contents($image_tmp_name);

                    $this->Event_model->insert_event_image($event_id, $image_data);
                }
				$this->load_specific_event($event_id);
            }
		}
	}

    public function add_comment($event_id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $text = $this->input->post('text');
            $this->load->model('User_model');
            $user_name = $this->session->userdata('user_name');
            $user_id = $this->User_model->get_id_by_username($user_name);
            $comment_data = array(
                'event_id' => $event_id,
				'user_id' => $user_id,
                'comment_text' => $text
            );
            $this->load->model('Event_model');
            $this->Event_model->create_comment($comment_data);
            $this->load_specific_event($event_id);
		}
    }
}
