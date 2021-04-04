<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function index()
    {
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->view('template/header');
        if ($this->session->userdata('logged_in')) {
            $username = get_cookie('username');
            $data = $this->file_model->userData($username);
            $this->load->view('profile', $data);
        } else {
            $this->load->view('login');
        }
        $this->load->view('profile');
        $this->load->view('template/footer');
    }
}
