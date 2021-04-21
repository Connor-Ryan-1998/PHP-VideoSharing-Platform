<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
//put your code here
class Video_model extends CI_Model
{
    function fetchVideoDetail($videoId)
    {
        $query = $this->db->query("select id, filename, description from userFiles where id = {$videoId}");
        return $query->result();
    }
    function fetchVideoDetailComments($videoId)
    {
        $query = $this->db->query("select comments, user from videoComments where videoId = {$videoId}");
        return $query->result();
    }

    function submitUserComment($videoId, $comments, $user)
    {
        $data = array(
            'videoId' => $videoId,
            'comments' => $comments,
            'user' => $user
        );
        $this->db->insert('videoComments', $data);
        redirect($this->uri->uri_string());
    }
}
