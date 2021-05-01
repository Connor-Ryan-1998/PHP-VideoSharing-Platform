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
        $this->load->view('forgotPassword');
        $this->load->view('template/footer');
    }
    public function forgotPasswordFunction()
    {
        $this->load->model('user_model');
        $data['error'] = "<div class=\"alert alert-danger\" role=\"alert\"> Incorrect username or passwrod!! </div> ";
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->view('template/header');
        $username = $this->input->post('username');

        $password = $this->input->post('password');
        if (!$this->session->userdata('logged_in')) {
            if ($this->user_model->login($username, $password)) {
                $user_data = array(
                    'username' => $username,
                    'logged_in' => true
                );
                $this->session->set_userdata($user_data);
                redirect('login');
            } else {
                $this->load->view('login', $data);
            }
        } else { {
                redirect('login');
            }
            $this->load->view('template/footer');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        redirect('login');
    }
}
