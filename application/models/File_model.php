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
        echo "<script>console.log('Debug Objects: " . $username . "' );</script>";
        ///Takes Videos you have interected with from a profile and reccomends others from the same creator
        $query = $this->db->query("CREATE TEMPORARY TABLE interactedCreators(
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            creatorUsername varchar(150)
         );
         
         INSERT INTO interactedCreators(creatorUsername)
         SELECT uf.username FROM userFiles uf LEFT join videoComments vC on uf.id = vC.videoId
         WHERE vC.user = {$username};
         
         SELECT uF.id, uF.filename, uF.createddatetime, uF.username FROM userFiles uF inner join interactedCreators iC ON uF.username = iC.creatorUsername
         WHERE uF.id NOT IN (SELECT vC.videoId FROM videoComments vC WHERE vC.user = {$username})
         ");
        return $query->result();
    }
}
