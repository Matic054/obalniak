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
        $this->load->model('User_model');
        foreach ($routes as $route) {
            $route->username = $this->User_model->get_username_by_id($route->user_id);
        }
        return $routes;
    }

    public function create_route($route_data){
        $this->db->insert('Routes', $route_data);
    }

    public function delete_route($user_id, $date){
        $where_conditions = array(
            'user_id' => $user_id,
            'date' => $date
        );
        
        $this->db->where($where_conditions);
        $this->db->delete('Routes');
    }


}