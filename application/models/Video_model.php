<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
//put your code here
class Video_model extends CI_Model
{
    function fetchVideoDetail($videoId)
    {
        $query = $this->db->query("select id, filename, description from userFiles where id = {$videoId}");
        return $query->result();
    }
}
