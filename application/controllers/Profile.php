<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function index()
    {
        $this->load->database();
        $data['error'] = "";
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->view('template/header');
        $this->load->view('profile', $data);
        $this->load->view('template/footer');
    }
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session'); //enable session
    }
}
