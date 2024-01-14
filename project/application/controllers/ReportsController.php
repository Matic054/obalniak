<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportsController extends CI_Controller {

	public function index()
	{
        $this->load->model('Advertisements_model');
		$data2['ad'] = $this->Advertisements_model->get_displayed_ad();

		$this->load->model('Report_model');
        $data['reports'] = $this->Report_model->get_reports();

        if ($this->session->userdata('has_photo')){
			$this->load->model('User_model');
			$data['photo'] = $this->User_model->get_profile_image($this->session->userdata('user_name'));
			$this->load->view('templates/header', $data);
			$this->load->view('reports', $data);
		    $this->load->view('templates/footer', $data2);
		} else {
			$this->load->view('templates/header');
            $this->load->view('reports', $data);
            $this->load->view('templates/footer', $data2);
		}
	}

	public function load_specific_report($report_id) {
        $this->load->model('Advertisements_model');
		$data2['ad'] = $this->Advertisements_model->get_displayed_ad();

        $this->load->model('Report_model');
        $data['report'] = $this->Report_model->get_report_by_id($report_id);
		$data['report_images'] = $this->Report_model->get_report_images($report_id);
		$data['comments'] = $this->Report_model->get_comments($report_id);

        if ($this->session->userdata('has_photo')){
			$this->load->model('User_model');
			$data['photo'] = $this->User_model->get_profile_image($this->session->userdata('user_name'));
			$this->load->view('templates/header', $data);
			$this->load->view('report_view', $data);
		    $this->load->view('templates/footer', $data2);
		} else {
			$this->load->view('templates/header');
            $this->load->view('report_view', $data);
            $this->load->view('templates/footer', $data2);
		}
    }

	public function create(){
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $this->input->post('title');
            $text = $this->input->post('text');

            // Step 1: Insert Event Information
			$this->load->model('User_model');
			$user_name = $this->session->userdata('user_name');
			$user_id = $this->User_model->get_id_by_username($user_name);
            $report_data = array(
				'user_id' => $user_id,
                'title' => $title,
                'text' => $text
            );

            $this->load->model('Report_model');
            $report_id = $this->Report_model->create_report($report_data);

            // Step 2: Retrieve Event ID
            if ($report_id) {
                // Step 3: Insert Event Images
                $this->load->library('upload');
                foreach ($_FILES['images']['name'] as $key => $image_name) {
                    $image_tmp_name = $_FILES['images']['tmp_name'][$key];
                    $image_data = file_get_contents($image_tmp_name);

                    $this->Report_model->insert_report_image($report_id, $image_data);
                }
				$this->load_specific_report($report_id);
            }
		}
	}

    public function add_comment($report_id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $text = $this->input->post('text');
            $this->load->model('User_model');
            $user_name = $this->session->userdata('user_name');
            $user_id = $this->User_model->get_id_by_username($user_name);
            $comment_data = array(
                'event_id' => $report_id,
				'user_id' => $user_id,
                'comment_text' => $text
            );
            $this->load->model('Report_model');
            $this->Report_model->create_comment($comment_data);
            //to get just the report id from the url
            $parts = explode("/", current_url());
            $r_id = end($parts);
            redirect("/index.php/report/" . $r_id);
		}
    }

    public function delete_report($report_id){
        $this->load->model('Report_model');
		$this->Report_model->delete_report($report_id);
        $this->Report_model->delete_report_image($report_id);
        $this->Report_model->delete_report_comments($report_id);
        redirect("/index.php/reports");
    }

}
