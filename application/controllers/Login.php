<?php
defined('BASEPATH') or exit('No direct script access allowed');

class login extends CI_Controller
{
	public function index()
	{
		$data['error'] = "";
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->view('template/header');
		if (!$this->session->userdata('logged_in')) {
			if (get_cookie('remember')) {
				$username = get_cookie('username');
				$password = get_cookie('password');
				if ($this->user_model->login($username, $password)) {
					$user_data = array(
						'username' => $username,
						'logged_in' => true
					);
					$this->session->set_userdata($user_data);
					$this->load->view('video', array('error' => ' '));
				}
			} else {
				$this->load->view('login', $data);
			}
		} else {
			$this->load->view('video', array('error' => ' '));
		}
		$this->load->view('template/footer');
	}
	public function check_login()
	{
		$this->load->model('user_model');
		$data['error'] = "<div class=\"alert alert-danger\" role=\"alert\"> Incorrect username or passwrod!! </div> ";
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->view('template/header');
		$username = $this->input->post('username');

		///TODO: May need to review below.
		$password = password_hash($this->input->post('password'), "sha256");
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
