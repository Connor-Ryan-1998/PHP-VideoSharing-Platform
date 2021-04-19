<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model
{

    // Log in
    public function login($username, $password)
    {
        // Validate
        $this->db->select('password');
        $this->db->where('username', $username);
        $result = $this->db->get('users')->result_array();
        foreach ($result as $row) {
            $value = password_hash($password, PASSWORD_DEFAULT);
            echo "<script>console.log('Debug Objects: {$value}   {$row['password']}' );</script>";
            if (password_verify($password, $row['password'])) {
                return true;
            } else {
                return false;
            }
        }
    }
    public function userData($username)
    {
        $query = $this->db->select('*')->from('users')->where('username', $username)->get();
        return $query->result_array();
    }
}
