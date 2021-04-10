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
            $this->load->view('profile', $data[0]);
        } else {
            $this->load->view('login');
        }
        $this->load->view('template/footer');
    }
    public function updatePersonnelData()
    {
        $this->load->model('user_model');        //load user model
        $data['error'] = "<div class=\"alert alert-danger\" role=\"alert\"> Incorrect username or passwrod!! </div> ";
        $this->load->helper('form');
        $this->load->helper('url');
        $username = $this->input->post('emailAddress');
        $password = $this->input->post('password');
        if (!$this->session->userdata('logged_in')) {    //Check if user already login
            if ($this->user_model->login($username, $password)) //check username and password
            {
                $user_data = array(
                    'username' => $username,
                    'logged_in' => true     //create session variable
                );
                $this->session->set_userdata($user_data); //set user status to login in session
                redirect('login', $data); // direct user home page
            } else {
                $this->load->view('login', $data);    //if username password incorrect, show error msg and ask user to login
            }
        } else { {
                redirect('login'); //if user already logined direct user to home page
            }
            $this->load->view('template/footer');
        }
    }
}
