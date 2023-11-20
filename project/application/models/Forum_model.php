<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load the database library
    }

    public function get_posts() {
        $query = $this->db->get('Forum_post');

        // Add the user_name to each event in the result
        $posts = $query->result();
        $this->load->model('User_model');

        foreach ($posts as $post) {
            $post->username = $this->User_model->get_username_by_id($post->user_id);
        }

        return $posts;
    }

    public function get_forum_by_id($post_id){
        $this->db->where('post_id', $post_id);
        $query = $this->db->get('Forum_post');

        $post = $query->result();
        $this->load->model('User_model');

	    $post[0]->username = $this->User_model->get_username_by_id($post[0]->user_id);
        
        return $post;
    }

    public function get_post_images($post_id){
        $this->db->select('image');
        $this->db->where('post_id', $post_id);
        $query = $this->db->get('Forum_image');

        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        }

        return null;
    }

    public function get_comments($post_id){
        $this->db->where('post_id', $post_id);
        $this->db->order_by('created_at', 'asc');
        $query = $this->db->get('Forum_comment');

        $comments = $query->result();

        foreach ($comments as $comment) {
            $comment->username = $this->User_model->get_username_by_id($comment->user_id);
        }

        return $comments;
    }

    public function create_comment($comment_data){
        $this->db->insert('Forum_comment', $comment_data);
    }

    public function create_post($post_data) {
        $this->db->insert('Forum_post', $post_data);
        return $this->db->insert_id();
    }

    public function insert_post_image($post_id, $image_data){
        $data = array(
            'post_id' => $post_id,
            'image' => $image_data,
        );

        $this->db->insert('Forum_image', $data);
    }

}