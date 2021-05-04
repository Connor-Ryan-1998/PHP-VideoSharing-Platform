<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Bot_model extends CI_Model
{

    function fetch_botResponse($userInput)
    {
        $this->db->query('select * from users');
        return $this->db->get();
    }
}
