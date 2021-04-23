<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Upload extends CI_Controller
{
    public function do_upload()
    {
        $this->load->model('file_model');
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'mp4';
        $config['max_size'] = 10000;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('userfile')) {
            $this->load->view('template/header');
            $data = array('error' => $this->upload->display_errors());
            $this->load->view('file', $data);
            $this->load->view('template/footer');
        } else {
            $this->file_model->upload($this->upload->data('file_name'), $this->upload->data('full_path'), $this->session->userdata('username'), $this->input->post('description'));
            $this->load->view('template/header');
            $this->load->view('file', array('error' => 'File upload success. <br/>'));
            $this->load->view('template/footer');
        }
    }
    public function upload_comment()
    {
        $this->load->helper('form');
        $this->load->helper('url');

        $this->load->model('video_model');
        $videoId = $this->input->cookie('videoDetailId', false);
        $comments = $this->input->post('comments');
        $user = $this->session->userdata('username') ?? $_SERVER['REMOTE_ADDR'];
        $this->video_model->submitUserComment($videoId, $comments, $user);
    }
}
