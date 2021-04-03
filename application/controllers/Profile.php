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
        $this->load->view('profile');
        $this->load->view('template/footer');
    }
}
