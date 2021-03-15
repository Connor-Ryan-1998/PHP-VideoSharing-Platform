<?php
defined('BASEPATH') or exit('No direct script access allowed');

class login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session'); //enable session
    }

    public function index()
    {
        $data['error'] = "";
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->view('template/header');
        $this->load->view('login', $data);
        $this->load->view('template/footer');
    }


    public function check_login()
    {
        $data['error'] = "<div class=\"alert alert-danger\" role=\"alert\"> Incorrect username or passwrod!! </div> ";
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->view('template/header');
        $username = $this->input->post('username'); //getting username from login form
        $password = $this->input->post('password'); //getting password from login form
        if ($username == "infs" && $password == "3202") {
            $this->load->view('index');
        } else {
            $this->load->view('login', $data);
        }
        $this->load->view('template/footer');
    }
}
