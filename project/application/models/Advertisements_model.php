<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advertisements_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load the database library
    }

    public function get_ads() {
        $query = $this->db->get('Advertisement');
        $ads = $query->result();
        return $ads;
    }

    public function get_displayed_ad(){
        $this->db->where('chosen', true);
        $query = $this->db->get('Advertisement');
        $ad = $query->result();
        return $ad;
    }

    public function chose($ad_id){
		$this->db->where('ad_id', $ad_id);
		$this->db->update('Advertisement', array('chosen' => true));

		$this->db->where('ad_id !=', $ad_id);
		$this->db->update('Advertisement', array('chosen' => false));
	}

    public function un_chose($ad_id){
        $this->db->where('ad_id', $ad_id);
		$this->db->update('Advertisement', array('chosen' => false));
    }

    public function delete_ad($ad_id){
        $this->db->where('ad_id', $ad_id);
        $this->db->delete('Advertisement');
    }

    public function create_ad($ad_data){
        $this->db->insert('Advertisement', $ad_data);
    }

}