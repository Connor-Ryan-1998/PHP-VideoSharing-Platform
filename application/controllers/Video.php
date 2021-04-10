<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Video extends CI_Controller
{
    public function index()
    {
        $this->load->view('template/header');
        if (!$this->session->userdata('logged_in')) //check if user already login
        {
            if (get_cookie('remember')) { // check if user activate the "remember me" feature  
                $username = get_cookie('username'); //get the username from cookie
                $password = get_cookie('password'); //get the username from cookie
                if ($this->user_model->login($username, $password)) //check username and password correct
                {
                    $user_data = array('username' => $username, 'logged_in' => true);
                    $this->session->set_userdata($user_data); //set user status to login in session
                    $this->load->view('video', array('error' => ' ')); //if user already logined show upload page
                }
            } else {
                redirect('login'); //if user already logined direct user to home page
            }
        } else {
            $this->load->view('video', array('error' => ' ')); //if user already logined show login page
        }
        $this->load->view('template/footer');
    }
    public function SearchVideo($videoId)
    {
        $this->load->view('template/header');
        if (!$this->session->userdata('logged_in')) //check if user already login
        {
            if (get_cookie('remember')) { // check if user activate the "remember me" feature  
                $username = get_cookie('username'); //get the username from cookie
                $password = get_cookie('password'); //get the username from cookie
                if ($this->user_model->login($username, $password)) //check username and password correct
                {
                    $user_data = array('username' => $username, 'logged_in' => true);
                    $this->session->set_userdata($user_data); //set user status to login in session
                    $this->load->view('videodetail'); //if user already logined show upload page
                }
            } else {
                redirect('login'); //if user already logined direct user to home page
            }
        } else {
            $this->load->view('videodetail'); //if user already logined show login page
        }
        $this->load->view('template/footer');
    }
}
