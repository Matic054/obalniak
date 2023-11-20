<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NavrhuController extends CI_Controller {

	public function index()
	{
		$this->load->model('Forum_model');
        $data['posts'] = $this->Forum_model->get_posts();

		$this->load->view('templates/header');
		$this->load->view('navrhu', $data);
		$this->load->view('templates/footer');
	}

	public function load_specific_post($post_id){
		$this->load->model('Forum_model');
        $data['forum_post'] = $this->Forum_model->get_forum_by_id($post_id);
		$data['post_images'] = $this->Forum_model->get_post_images($post_id);
		$data['comments'] = $this->Forum_model->get_comments($post_id);

		$this->load->view('templates/header');
		$this->load->view('forum_post_view', $data);
		$this->load->view('templates/footer');
	}

	public function create(){
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $this->input->post('title');
            $text = $this->input->post('text');

			$this->load->model('User_model');
			$user_name = $this->session->userdata('user_name');
			$user_id = $this->User_model->get_id_by_username($user_name);
            $post_data = array(
				'user_id' => $user_id,
                'title' => $title,
                'text' => $text
            );

            $this->load->model('Forum_model');
            $post_id = $this->Forum_model->create_post($post_data);

            if ($post_id) {
                $this->load->library('upload');

                foreach ($_FILES['images']['name'] as $key => $image_name) {
                    $image_tmp_name = $_FILES['images']['tmp_name'][$key];
                    $image_data = file_get_contents($image_tmp_name);

                    $this->Forum_model->insert_post_image($post_id, $image_data);
                }
				$this->load_specific_post($post_id);
            }
		}
	}

	public function add_comment($post_id){
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $text = $this->input->post('text');
            $this->load->model('User_model');
            $user_name = $this->session->userdata('user_name');
            $user_id = $this->User_model->get_id_by_username($user_name);
            $comment_data = array(
                'post_id' => $post_id,
				'user_id' => $user_id,
                'comment_text' => $text
            );
            $this->load->model('Forum_model');
            $this->Forum_model->create_comment($comment_data);
            $this->load_specific_post($post_id);
		}
	}

}
