<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Bot_model extends CI_Model
{

    function fetch_botResponse($userInput)
    {
        $this->db->select('username');
        $this->db->from('userFiles');
        $this->db->group_by('userName');
        $this->db->order_by('username', 'DESC');
        return $this->db->get();
    }
}
