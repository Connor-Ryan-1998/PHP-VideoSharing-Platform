<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ajax extends CI_Controller
{
    public function fetch()
    {
        $this->load->model('file_model');
        $output = '';
        $query = '';
        if ($this->input->get('query')) {
            $query = $this->input->get('query');
        }
        $data = $this->file_model->fetch_data($query);
        if (!$data == null) {
            echo json_encode($data->result());
        } else {
            echo "";
        }
    }
    public function fileList()
    {
        // POST data
        $postData = $this->input->post();
        echo "<script>console.log('Debug Objects: fails before data is pulled' );</script>";
        // Get data
        $data = $this->file_model->getfileNames($postData);
        echo "<script>console.log('Debug Objects: fails after data is pulled' );</script>";
        echo json_encode($data);
    }
}
