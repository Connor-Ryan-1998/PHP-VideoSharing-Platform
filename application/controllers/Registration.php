<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registration extends CI_Controller
{
	public function index()
	{
		$this->load->database();
		$data['error'] = "";
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->view('template/header');
		$this->load->view('registration', $data);
		$this->load->view('template/footer');
	}

	public function check_registration()
	{
		$this->load->model('register_model');
		$data['error'] = "<div class=\"alert alert-danger\" role=\"alert\"> Password is not strong enough, please ensure password is greater than 5 characters and at least one number</div>";
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->view('template/header');
		$username = $this->input->post('username');
		$emailAddress = $this->input->post('emailAddress');
		$password = $this->input->post('password');
		if (strlen($password) < 5 or !(1 === preg_match('~[0-9]~', $password))) {
			$this->load->view('registration', $data);
		} else {
			if ($this->register_model->register_user($username, $emailAddress, $password)) {
				$data['error'] = "<div class=\"alert\" role=\"alert\"> Account has been registered, please wait while we direct you to the login page</div>";
				$this->load->view('registration', $data);
				sleep(3);
				$this->load->view('login', $data);
			}
		}
		$this->load->view('template/footer');
	}
}
