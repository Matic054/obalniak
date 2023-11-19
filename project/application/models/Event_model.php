<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load the database library
    }


    public function get_events() {
        $query = $this->db->get('Event');

        // Add the user_name to each event in the result
        $events = $query->result();
        $this->load->model('User_model');

        foreach ($events as $event) {
            $event->username = $this->User_model->get_username_by_id($event->user_id);
        }

        return $events;
    }

    public function get_event_by_id($event_id) {
        // Your query to get a specific event by ID
        $this->db->where('event_id', $event_id);
        $query = $this->db->get('Event');

        $event = $query->result();
        $this->load->model('User_model');

	    $event[0]->username = $this->User_model->get_username_by_id($event[0]->user_id);
        
        return $event;
    }

    public function get_event_images($event_id){
        $this->db->select('image');
        $this->db->where('event_id', $event_id);
        $query = $this->db->get('Event_image');

        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        }

        //$event_images = $query->result();

        return null;
    }

    public function get_comments($event_id){
        $this->db->where('event_id', $event_id);
        $this->db->order_by('created_at', 'asc');
        $query = $this->db->get('Event_comment');

        $comments = $query->result();

        foreach ($comments as $comment) {
            $comment->username = $this->User_model->get_username_by_id($comment->user_id);
        }

        return $comments;
    }

    public function create_event($event_data) {
        $this->db->insert('Event', $event_data);
        return $this->db->insert_id();
    }

    public function insert_event_image($event_id, $image_path) {
        $data = array(
            'event_id' => $event_id,
            'image' => $image_path, // Assuming image is a path, adjust accordingly
        );

        $this->db->insert('Event_image', $data);
    }

}
