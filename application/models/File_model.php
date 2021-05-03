<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class File_model extends CI_Model
{

    // upload file
    public function upload($filename, $path, $username, $description)
    {

        $data = array(
            'filename' => $filename,
            'path' => $path,
            'username' => $username,
            'description' => $description
        );
        $query = $this->db->insert('userFiles', $data);
    }
    function fetch_data($query)
    {
        if ($query == '') {
            return null;
        } else {
            $this->db->select("*");
            $this->db->from("userFiles");
            $this->db->like('filename', $query);
            $this->db->or_like('username', $query);
            $this->db->order_by('filename', 'DESC');
            return $this->db->get();
        }
    }
    public function userFiles($username)
    {
        $this->db->select("*");
        $this->db->from("userFiles");
        $this->db->equals('username', $username);
        $this->db->order_by('filename', 'DESC');
        return $this->db->get();
    }

    public function getfileNames($postData)
    {
        $response = array();

        if (isset($postData['search'])) {
            // Select record
            $this->db->select('*');
            $this->db->where("filename like '%" . $postData['search'] . "%' ");

            $records = $this->db->get('userFiles')->result();

            foreach ($records as $row) {
                $response[] = array("value" => $row->id, "label" => $row->filename);
            }
        }
        return $response;
    }

    function fetchRecentlyUploaded()
    {
        $query = $this->db->query("select id, filename, createddatetime, username from userFiles order by createddatetime desc");
        return $query->result();
    }

    function fetchReccomendedForUser()
    {
        $username = $this->session->userdata('username');
        ///Takes Videos you have interected with from a profile and reccomends others from the same creator
        $query = $this->db->query("SELECT TOP 10 id, filename, createddatetime, username from userFiles inner join videocomments");
        return $query->result();
    }
}
