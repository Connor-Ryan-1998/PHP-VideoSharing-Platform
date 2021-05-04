<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Bot_model extends CI_Model
{

    function fetch_botResponse($input)
    {
        $this->db->select('username');
        $this->db->from('users');
        return $this->db->get();
    }
}
