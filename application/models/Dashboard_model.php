<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

    function fetch_users()
    {
        $this->db->select('username');
        $this->db->from('userFiles');
        $this->db->group_by('userName');
        $this->db->order_by('username', 'DESC');
        return $this->db->get();
    }

    function fetch_chart_data($user)
    {
        // $this->db->where('username', $user);
        $this->db->select('COUNT(*) AS FileUploadedCount');
        $this->db->select('CAST(CreatedDateTime AS DATE) AS dateCreated');
        $this->db->group_by('dateCreated');
        return $this->db->get('userFiles');
    }
}
