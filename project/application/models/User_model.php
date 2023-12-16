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
            $user = $query->row();
            $hashFromDatabase = $user->password;

            if ($user->confirmed && password_verify($password, $hashFromDatabase)) {
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

    public function is_admin($username){
        $this->db->select('admin');
        $this->db->where('user_name', $username);
        $query = $this->db->get('User');
        return $query->row()->admin == 1;
    }

    //to add a new user
    public function insert_user($username, $email, $password, $phone, $profile_image) {
        $data = array(
            'user_name' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT), 
            'phone_number' => $phone,
            'profile_picture' => $profile_image
        );

        $this->db->insert('User', $data);
    }

    public function get_profile_image($username){
        $this->db->select('profile_picture');
        $this->db->where('user_name', $username);
        $query = $this->db->get('User');

        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        }

        return null;
    }

    public function get_users(){
        $query = $this->db->get('User');
        $users = $query->result();
        return $users;
    }

    public function delete_user($user_id){
        $this->db->where('user_id', $user_id);
        $this->db->delete('User');
        redirect("/index.php/users_view");
    }

    public function make_admin($user_id){
        $this->db->where('user_id', $user_id);
        $this->db->update('User', array('admin' => 1));
        redirect("/index.php/users_view");
    }

    public function confirm_user($user_id){
        $this->db->where('user_id', $user_id);
        $this->db->update('User', array('confirmed' => 1));

        redirect("/index.php/users_view");
    }
}
