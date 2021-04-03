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
		$this->load->view('registration');
		$this->load->view('template/footer');
	}
}
