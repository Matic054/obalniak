<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Routes_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load the database library
    }

    public function get_routes() {
        $query = $this->db->get('Routes');
        $routes = $query->result();
        return $routes;
    }

    public function create_route($route_data){
        $this->db->insert('Routes', $route_data);
    }


}