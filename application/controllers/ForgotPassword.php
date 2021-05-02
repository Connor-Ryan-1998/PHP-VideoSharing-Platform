<?php
defined('BASEPATH') or exit('No direct script access allowed');

class forgotpassword extends CI_Controller
{
    public function index()
    {
        $data['error'] = "";
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->view('template/header');
        $this->load->view('forgotpassword', $data);
        $this->load->view('template/footer');
    }
    public function forgotPasswordFunction()
    {
        $this->load->model('user_model');
        $data['error'] = "<div class=\"alert alert-danger\" role=\"alert\"> Request success. Please check your email! </div> ";
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->view('template/header');
        $emailAddress = $this->input->post('emailAddress');
        if ($this->user_model->forgotPassword($emailAddress)) {
            $resetData = $this->user_model->forgotPasswordEmail($emailAddress);
            $this->emailForgotPassword($resetData, $emailAddress);
            $this->load->view('forgotpassword', $data);
        } else {
            $data['error'] = "<div class=\"alert alert-danger\" role=\"alert\"> Request failed. Email is incorrect! </div> ";
            $this->load->view('forgotpassword', $data);
        }
        $this->load->view('template/footer');
    }

    public function emailForgotPassword($resetData, $emailAddress)
    {
        $this->load->helper('url');
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'mailhub.eait.uq.edu.au',
            'smtp_port' => 25,
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE,
            'mailtype' => 'html',
            'starttls' => true,
            'newline' => "\r\n"
        );


        foreach ($resetData as $row) {
            $resetToken = $row['resetPasswordToken'];
            $resetTime =  $row['resetPasswordTime'];
        }
        $resetPasswordUrl = base_url();

        $message = "Hello {$emailAddress}: Please enter the reset token in the reset page: {$resetToken}. This token will be reset at {$resetTime} UTC \n 
        Please Visit to reset: {$resetPasswordUrl}resetPassword";

        $this->email->initialize($config);
        $this->email->from(get_current_user() . '@student.uq.edu.au', get_current_user());
        $this->email->to($emailAddress);
        $this->email->subject('PHP-VideoSharing-Platform Password Reset');
        $this->email->message($message);
        $this->email->send();
    }
}
