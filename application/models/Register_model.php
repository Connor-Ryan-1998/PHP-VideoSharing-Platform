<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Register_model extends CI_Model
{
    public function register_user($username, $emailAddress, $password)
    {
        ///Hash Password
        $password = password_hash($password, PASSWORD_DEFAULT);

        //Get Max id
        $this->db->select_max('id');
        $result = $this->db->get('users')->result_array();
        foreach ($result as $row) {
            $data = array(
                'id' => $row['id'],
                'username' => $username,
                'emailAddress' => $emailAddress,
                'password' => $password
            );
        }
        //Insert New Record
        $query = $this->db->insert('users', $data);
    }
}
