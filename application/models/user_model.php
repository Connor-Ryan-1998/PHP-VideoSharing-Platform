<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function login($username, $password)
    {
        // construct sql query
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        // making query
        $query = $this->db->get('users');

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
}

?>"