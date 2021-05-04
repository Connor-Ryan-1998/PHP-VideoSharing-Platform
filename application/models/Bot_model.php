<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Bot_model extends CI_Model
{

    function fetch_botResponse($userInput)
    {
        $query = $this->db->query('CALL getBotResponse(?)', $userInput);
        return $query->result();
    }
}
