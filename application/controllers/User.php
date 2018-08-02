<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if(! $this->session->has_userdata('user_logged') && ! $this->session->has_userdata('user_id'))
		{
			$this->session->set_flashdata('error', 'Please login first to view this page');
			redirect("/");
		}
	}

	public function profile()
	{
		$this->load->view('layout/header');
		$this->load->view('auth/profile');
		$this->load->view('layout/footer');
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('user_logged');
		redirect('/');
	}
}
