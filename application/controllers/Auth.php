<?php

class Auth extends CI_Controller
{

	public function logout()
	{
		unset($_SESSION);
		session_destroy();
		redirect("auth/login", "refresh");
	}

	public function login()
	{
		if ($_SESSION['user_logged'] == true) {
			redirect("user/profile");
		} else {
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

			if ($this->form_validation->run() == True) {
				$username = $_POST['username'];
				$password = md5($_POST['password']);
				$this->db->select('*');
				$this->db->from('users');
				$this->db->where(array('username' => $username, 'password' => $password));
				$query = $this->db->get();

				$user = $query->row();
				// if user exists
				if ($user->email) {
					//temporary message
					$this->session->set_flashdata("success", "You are logged in");

					//set sessions variables

					$_SESSION['user_logged'] = True;
					$_SESSION['username'] = $user->username;

					//redirect to profile page

					redirect("user/profile", "refresh");

				} else {
					$this->session->set_flashdata("error", "No such account exists");
					redirect("auth/login", "refresh");
				}
			}
		}


		$this->load->view('login');
	}

	public function register()
	{
		if ($_SESSION['user_logged'] == true) {
			redirect("user/profile");
		} else {


			if (isset($_POST['register'])) {
				$this->form_validation->set_rules('username', 'Username', 'required');
				$this->form_validation->set_rules('email', 'Email', 'required');
				$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
				$this->form_validation->set_rules('password', 'Confirm Password', 'required|min_length[5]|matches[password]');
				$this->form_validation->set_rules('phone', 'Phone', 'required|min_length[5]');
				// if form validation is true
				if ($this->form_validation->run() == True) {
					echo "Form validated";

					//add user in database

					$data = array(
						'username' => $_POST['username'],
						'email' => $_POST['email'],
						'password' => md5($_POST['password']),
						'gender' => $_POST['gender'],
						'created_date' => date('Y-m-d'),
						'phone' => $_POST['phone'],


					);
					$this->db->insert('users', $data);
					$this->session->set_flashdata("success", "Your account has been registered");
					redirect("auth/register", "refresh");
				}
			}
		}

		$this->load->view('register');
	}
}
