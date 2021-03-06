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
        $this->load->model('file_model');
        $postData = $this->input->post();
        // Get data
        $data = $this->file_model->getfileNames($postData);
        echo json_encode($data);
    }
    public function fetchRecent()
    {
        $this->load->model('file_model');
        $data = $this->file_model->fetchRecentlyUploaded();
        echo json_encode($data);
    }
    public function fetchVideoDetail()
    {
        $this->load->model('video_model');
        $data = $this->video_model->fetchVideoDetail($this->input->cookie('videoDetailId', false));
        echo json_encode($data);
    }
    public function fetchVideoDetailComments()
    {
        $this->load->model('video_model');
        $data = $this->video_model->fetchVideoDetailComments($this->input->cookie('videoDetailId', false));
        echo json_encode($data);
    }
    public function fetchReccomended()
    {
        $this->load->model('file_model');
        $data = $this->file_model->fetchReccomendedForUser();
        echo json_encode($data);
    }

    public function botResponse()
    {

        $userInput = $this->input->post('input');
        $this->load->model('bot_model');
        $data = $this->bot_model->fetch_botResponse($userInput);
        echo json_encode($data);
    }
}
