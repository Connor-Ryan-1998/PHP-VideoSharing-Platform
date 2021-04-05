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
        echo "<script>console.log('" . json_encode($username) . "');</script>";
        // $this->db->where('username', $username);
        return $this->db->get();
    }
}
