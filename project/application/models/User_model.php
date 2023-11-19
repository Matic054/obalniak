<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load the database library
    }

    // to see if a user with given username and password exists
    public function check_user_credentials($username, $password) {
        $this->db->where('user_name', $username);
        $query = $this->db->get('User');

        if ($query->num_rows() > 0) {
            $hashFromDatabase = $query->row()->password;

            if (password_verify($password, $hashFromDatabase)) {
                return true;
            }
        }

        return false;    
     }

     // to retrive the user_name based on the user_id
     public function get_username_by_id($user_id) {
        $this->db->select('user_name');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('User');

        if ($query->num_rows() > 0) {
            return $query->row()->user_name;
        } else {
            return 'Unknown User';
        }
    }

    public function get_id_by_username($username){
        $this->db->select('user_id');
        $this->db->where('user_name', $username);
        $query = $this->db->get('User');
        return $query->row()->user_id;
    }

    //to add a new user
    public function insert_user($username, $email, $password) {
        $data = array(
            'user_name' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT), 
        );

        $this->db->insert('User', $data);
    }
}
