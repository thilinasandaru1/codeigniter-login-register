<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if($this->session->has_userdata('user_logged') && $this->session->has_userdata('user_id'))
		{
			redirect("profile");
		}
	}

	public function index()
	{
		$this->login();
	}

	public function login()
	{
		$this->form_validation->set_rules("username", "username", "required");
		$this->form_validation->set_rules("password", "password", "required");

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('layout/header');
			$this->load->view('login');
			$this->load->view('layout/footer');
		}
		else
		{
			//check user in database
			$username = $this->input->post('username');

			$this->db->select('*');
			$this->db->from('users');
			$this->db->where(array('user_name'=>$username));
			$query = $this->db->get();

			if($query->num_rows() == 1)
			{
				$user = $query->row_array();
				if(password_verify($this->input->post('password'), $user['password']))
				{
					$this->session->set_flashdata('success', 'You are logged in');

					//set session variables
					$userlogin = array(
						'username' => $user['user_name'],
						'user_id' => $user['user_id'],
						'email' => $user['email'],
						'user_logged' => TRUE
					);

					$this->session->set_userdata($userlogin);

					redirect('profile');
				}
				else
				{
					$this->session->set_flashdata('error', 'Invalid Credentials');
					redirect('/', 'refresh');
				}
			}
			else
			{
				$this->session->set_flashdata('error', 'Invalid Credentials - username wedariy');
				redirect('/', 'refresh');
			}

		}
	}

	public function register()
	{
		// form validation
		$this->form_validation->set_rules("username", "username", "required");
		$this->form_validation->set_rules("email", "email", "required|valid_email");
		$this->form_validation->set_rules("password", "password", "required|min_length[8]");
		$this->form_validation->set_rules("password2", "confirm password", "matches[password]");
		$this->form_validation->set_rules("phone", "phone", "required");
		$this->form_validation->set_rules("gender", "gender", "required");

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('layout/header');
			$this->load->view('register');
			$this->load->view('layout/footer');
		}
		else
		{
			//hash password
			$hash_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

			// save data in database
			$data = array(
				'user_name' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'gender' => $this->input->post('gender'),
				'phone' => $this->input->post('phone'),
				'created_at' => date('Y-m-d'),
				'password' => $hash_password

			);

			$this->db->insert('users', $data);
			$this->session->set_flashdata('success', 'Your account has been registered, you can log now!');
			redirect('register', 'refresh');
		}
	}
}
