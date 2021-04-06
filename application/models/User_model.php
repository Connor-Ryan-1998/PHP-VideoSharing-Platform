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
        // $this->db->where('username', $username);
        $query = $this->db->query("SELECT * FROM users;");
        foreach ($query->result() as $row) {
            echo $row->title;
            echo $row->name;
            echo $row->body;
        }
        return $this->db->get('users');
    }
}
