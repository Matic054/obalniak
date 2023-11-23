<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alpine_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load the database library
    }

    public function get_alpine_by_id($alpine_id) {
        $this->db->where('alpine_id', $alpine_id);
        $query = $this->db->get('Alpine_school');

        $alpine = $query->result();
        $this->load->model('User_model');

	    $alpine[0]->username = $this->User_model->get_username_by_id($alpine[0]->user_id);
        
        return $alpine;
    }

    public function get_alpine_images($alpine_id){
        $this->db->select('image');
        $this->db->where('alpine_id', $alpine_id);
        $query = $this->db->get('Alpine_image');

        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        }

        //$event_images = $query->result();

        return null;
    }

    public function get_alpines() {
        $query = $this->db->get('Alpine_school');

        // Add the user_name to each event in the result
        $alpines = $query->result();
        //var_dump($events);
        $this->load->model('User_model');

        foreach ($alpines as $alpine) {
            $alpine->username = $this->User_model->get_username_by_id($alpine->user_id);
        }

        return $alpines;
    }

    public function create_alpine($alpine_data) {
        $this->db->insert('Alpine_school', $alpine_data);
        return $this->db->insert_id();
    }

    public function insert_alpine_image($alpine_id, $image) {
        $data = array(
            'alpine_id' => $alpine_id,
            'image' => $image, 
        );

        $this->db->insert('Alpine_image', $data);
    }

}