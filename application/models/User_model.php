<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model
{

    // Log in
    public function login($username, $password)
    {
        // Validate
        $this->db->select('password');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $result = $this->db->get('users')->result_array();

        if (password_verify($password, $result[0])) {
            return true;
        } else {
            return false;
        }
    }
    public function userData($username)
    {
        $query = $this->db->select('*')->from('users')->where('username', $username)->get();
        return $query->result_array();
    }
}
