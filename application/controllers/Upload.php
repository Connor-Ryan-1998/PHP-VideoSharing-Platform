<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Upload extends CI_Controller
{
    public function index()
    {
        $this->load->view('template/header');
        if (!$this->session->userdata('logged_in')) {
            if (get_cookie('remember')) {
                $username = get_cookie('username');
                $password = get_cookie('password');
                if ($this->user_model->login($username, $password)) {
                    $user_data = array('username' => $username, 'logged_in' => true);
                    $this->session->set_userdata($user_data);
                    $this->load->view('file', array('error' => ' '));
                }
            } else {
                redirect('login'); //if user already logined direct user to home page
            }
        } else {
            $this->load->view('file', array('error' => ' ')); //if user already logined show login page
        }
        $this->load->view('template/footer');
    }
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
        $this->load->model('video_model');
        $videoId = $this->input->cookie('videoDetailId', false);
        $comments = $this->input->post('comments');
        $user = $this->session->userdata('username') ?? $_SERVER['REMOTE_ADDR'];
        $this->video_model->submitUserComment($videoId, $comments, $user);
    }
}
