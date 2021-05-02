<?php
defined('BASEPATH') or exit('No direct script access allowed');

class resetpassword extends CI_Controller
{
    public function index()
    {
        $data['error'] = "";
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->view('template/header');
        $this->load->view('resetpassword', $data);
        $this->load->view('template/footer');
    }

    public function resetPasswordVerify()
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('user_model');

        $data['error'] = "<div class=\"alert alert-danger\" role=\"alert\"> Password is not strong enough, please ensure password is greater than 5 characters and at least one number</div>";

        $resetEmail = $this->input->post('emailAddress');
        $resetToken = $this->input->post('resetToken');
        $resetPassword = $this->input->post('newPassword');

        $this->load->view('template/header');
        if (strlen($resetToken) < 5 or !(1 === preg_match('~[0-9]~', $resetToken))) {
            $this->load->view('resetpassword', $data);
        }
        if ($this->user_model->resetPassword($resetEmail, $resetToken, $resetPassword)) {
            $data['error'] = "<div class=\"alert alert-danger\" role=\"alert\"> Password has been reset. Please log in</div>";
            $this->load->view('login', $data);
        } else {
            $data['error'] = "<div class=\"alert alert-danger\" role=\"alert\"> There was an error in the reset. Please review the Token or remaining time</div>";
            $this->load->view('resetpassword', $data);
        }

        $this->load->view('template/footer');
    }
}
