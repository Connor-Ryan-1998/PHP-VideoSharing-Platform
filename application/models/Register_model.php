<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Register_model extends CI_Model
{
    public function register_user($username, $emailAddress, $password)
    {
        $data = array(
            'username' => $username,
            'emailAddress' => $emailAddress,
            'password' => $password
        );
        $query = $this->db->insert('users', $data);
    }
}
