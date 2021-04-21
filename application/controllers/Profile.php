<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function index()
    {
        $data['error'] = "";
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->view('template/header');
        $data['error'] = "<div class=\"alert alert-danger\" role=\"alert\"> Please Login to view this page! </div> ";
        if ($this->session->userdata('logged_in')) {
            $this->load->model('user_model');
            $username = $_SESSION['username'];
            $data = $this->user_model->userData($username);
            $this->load->view('profile', $data[0]);
        } else {
            $this->load->view('login', $data);
        }
        $this->load->view('template/footer');
    }
    public function updatePersonnelData()
    {
        $this->load->model('user_model');
        $this->load->helper('form');
        $this->load->helper('url');

        $username = $this->input->post('username');
        $emailAddress = $this->input->post('emailAddress');
        $verificationCode = $this->input->post('verificationCode');
        $user_data = array(
            'username' => $username,
            'emailAddress' => $emailAddress,
            'verificationCode' => $verificationCode
        );
        $this->user_model->updateUserData($user_data);
        $this->index();
    }
}
