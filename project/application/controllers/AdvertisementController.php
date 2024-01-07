<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdvertisementController extends CI_Controller {

	public function index()
	{
		$this->load->model('Advertisements_model');
		$data['ads'] = $this->Advertisements_model->get_ads();

		$this->load->model('Advertisements_model');
		$data2['ad'] = $this->Advertisements_model->get_displayed_ad();
		if ($this->session->userdata('has_photo')){
			$this->load->model('User_model');
			$data['photo'] = $this->User_model->get_profile_image($this->session->userdata('user_name'));
			$this->load->view('templates/header', $data);
			$this->load->view('advertisements', $data);
		    $this->load->view('templates/footer', $data2);
		} else {
			$this->load->view('templates/header');
            $this->load->view('advertisements', $data);
            $this->load->view('templates/footer', $data2);
		}
	}

	public function delete_ad($ad_id){
		$this->load->model('Advertisements_model');
		$this->Advertisements_model->delete_ad($ad_id);
		redirect("index.php/advertisements");
	}

	public function set_ad($ad_id){
		$this->load->model('Advertisements_model');
		$this->Advertisements_model->chose($ad_id);
		redirect("index.php/advertisements");
	}

	public function un_set_ad($ad_id){
		$this->load->model('Advertisements_model');
		$this->Advertisements_model->un_chose($ad_id);
		redirect("index.php/advertisements");
	}

	public function create(){
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $url = $this->input->post('title');

			$this->load->model('User_model');
			$user_name = $this->session->userdata('user_name');
			$user_id = $this->User_model->get_id_by_username($user_name);

			if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
				// Access the details of the uploaded file
				$tmpFilePath = $_FILES["image"]["tmp_name"];
				$fileName = $_FILES["image"]["name"];
				$fileSize = $_FILES["image"]["size"];
				$fileType = $_FILES["image"]["type"];
		
				// Read the file content
				$fileContent = file_get_contents($tmpFilePath);
			}

			$ad_data = array(
				'user_id' => $user_id,
				'url' => $url,
				'image' => $fileContent
			);

            $this->load->model('Advertisements_model');
            $this->Advertisements_model->create_ad($ad_data);
			redirect("index.php/advertisements");
		}
	}

}
