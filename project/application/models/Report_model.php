<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load the database library
    }


    public function get_reports() {
        $query = $this->db->get('Report');

        // Add the user_name to each event in the result
        $reports = $query->result();
        $this->load->model('User_model');

        foreach ($reports as $report) {
            $report->username = $this->User_model->get_username_by_id($report->user_id);
        }

        return $reports;
    }

    public function get_report_by_id($report_id) {
        // Your query to get a specific event by ID
        $this->db->where('event_id', $report_id);
        $query = $this->db->get('Report');

        $report = $query->result();
        $this->load->model('User_model');

	    $report[0]->username = $this->User_model->get_username_by_id($report[0]->user_id);
        $report[0]->user_image = $this->User_model->get_profile_image($report[0]->username);
        
        return $report;
    }

    public function get_report_images($report_id){
        $this->db->select('image');
        $this->db->where('event_id', $report_id);
        $query = $this->db->get('Report_image');

        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        }

        return null;
    }

    public function get_comments($report_id){
        $this->db->where('event_id', $report_id);
        $this->db->order_by('created_at', 'asc');
        $query = $this->db->get('Report_comment');

        $comments = $query->result();

        foreach ($comments as $comment) {
            $comment->username = $this->User_model->get_username_by_id($comment->user_id);
        }

        return $comments;
    }

    public function create_report($report_data) {
        $this->db->insert('Report', $report_data);
        return $this->db->insert_id();
    }

    public function insert_report_image($report_id, $image) {
        $data = array(
            'event_id' => $report_id,
            'image' => $image, 
        );

        $this->db->insert('Report_image', $data);
    }

    public function create_comment($comment_data){
        $this->db->insert('Report_comment', $comment_data);
    }

    public function delete_report($report_id){
        $this->db->where('event_id', $report_id);
        $this->db->delete('Report');
    }

    public function delete_report_image($report_id){
        $this->db->where('event_id', $report_id);
        $this->db->delete('Report_image');
    }

    public function delete_report_comments($report_id){
        $this->db->where('event_id', $report_id);
        $this->db->delete('Report_comment');
    }

    public function delete_report_comment($comment_id){
        $this->db->where('comment_id', $comment_id);
        $this->db->delete('Report_comment');
    }

}
