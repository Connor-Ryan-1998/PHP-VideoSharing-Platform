<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Video extends CI_Controller
{
    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('video', array('error' => ' ')); //if user already logined show login page
        $this->load->view('template/footer');
    }
    public function SearchVideo($videoId)
    {
        $this->load->view('template/header');
        $this->load->view('videodetail'); //if user already logined show login page
        $this->load->view('template/footer');
    }
}
