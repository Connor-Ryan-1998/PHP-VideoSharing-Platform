<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registration extends CI_Controller
{
	public function index()
	{
		$data['error'] = "";
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->view('template/header');
		if (!$this->session->userdata('logged_in')) //check if user already login
		{
			if (get_cookie('remember')) { // check if user activate the "remember me" feature  
				$username = get_cookie('username'); //get the username from cookie
				$password = get_cookie('password'); //get the username from cookie
				if ($this->user_model->login($username, $password)) //check username and password correct
				{
					$user_data = array(
						'username' => $username,
						'logged_in' => true 	//create session variable
					);
					$this->session->set_userdata($user_data); //set user status to login in session
					$this->load->view('registration', $data); //if user already logined show main page
				}
			} else {
				$this->load->view('login', $data);	//if username password incorrect, show error msg and ask user to login
			}
		} else {
			$this->load->view('registration', $data); //if user already logined show main page
		}
		$this->load->view('template/footer');
	}
}
