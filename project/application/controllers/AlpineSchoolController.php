<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AlpineSchoolController extends CI_Controller {

	public function index()
	{
		$this->load->model('Alpine_model');
        $data['alpines'] = $this->Alpine_model->get_alpines();

		$this->load->view('templates/header');
		$this->load->view('alpines', $data);
		$this->load->view('templates/footer');
	}

	public function load_specific_alpine($alpine_id) {
        // Use $event_id to fetch the specific event from the database
        $this->load->model('Alpine_model');
        $data['alpine'] = $this->Alpine_model->get_alpine_by_id($alpine_id);
		$data['alpine_images'] = $this->Alpine_model->get_alpine_images($alpine_id);

		$this->load->view('templates/header');
		$this->load->view('alpine_view', $data);
		$this->load->view('templates/footer');
    }

	public function create(){
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $this->input->post('title');
            $text = $this->input->post('text');

			$this->load->model('User_model');
			$user_name = $this->session->userdata('user_name');
			$user_id = $this->User_model->get_id_by_username($user_name);
            $alpine_data = array(
				'user_id' => $user_id,
                'title' => $title,
                'text' => $text
            );

            $this->load->model('Alpine_model');
            $alpine_id = $this->Alpine_model->create_alpine($alpine_data);

            if ($alpine_id) {
                $this->load->library('upload');

                foreach ($_FILES['images']['name'] as $key => $image_name) {
                    $image_tmp_name = $_FILES['images']['tmp_name'][$key];
                    $image_data = file_get_contents($image_tmp_name);

                    $this->Alpine_model->insert_alpine_image($alpine_id, $image_data);
                }
				$this->load_specific_alpine($alpine_id);
            }
		}
	}

}
