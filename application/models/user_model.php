<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
//put your code here
class User_model extends CI_Model
{

    // Log in
    public function login($username, $password)
    {
        // Validate
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $result = $this->db->get('users');

        if ($result->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
    public function userData($username)
    {
        $this->db->select("*");
        $this->db->from("users");
        $this->db->or_like('username', $username);
        $query =  $this->db->get();
        return $query->result_array();
    }
}
