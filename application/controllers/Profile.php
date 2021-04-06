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
            $this->load->model('user_model');
            $username = $_SESSION['username'];
            $data = $this->user_model->userData($username);
            echo "<script>console.log('" . json_encode(array_keys($data)) . "');</script>";
            $this->load->view('profile', $data);
        } else {
            $this->load->view('login');
        }
        $this->load->view('template/footer');
    }
}
