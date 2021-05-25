<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * author ryanadi
 */

class Welcome extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Loginreg');
		$this->load->library('form_validation');

	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email' );

		$this->form_validation->set_rules('password', 'Password', 'required|trim' );

		if ($this->form_validation->run() == false) {

			$data['title'] = "Mejapintar";
			$this->load->view('page/logreg_header', $data);
			$this->load->view('loginregis/login');
			$this->load->view('page/logreg_footer');
		} 
		else {

			
			$this->_login();
		}

	}


	private function _login()
	{

		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$user = $this->db->get_where('mejauser', ['email' => $email])->row_array();

		if ($user) {

			
			if ($user['activate'] == 1) {

				
				if (password_verify($password, $user['password'])) {

					$data = [
						'email' => $user['email'],
						'role' => $user['role'],
					];

					$this->session->set_userdata($data);
					if ($user['role'] == 1) {

						redirect('admin/home');
					} else {
						redirect('user');
					}} 

				else {

					$this->session->set_flashdata('message', '<div class="alert alert-danger mx-auto" role="alert">Try Again!! Wrong Password!!</div>');
					redirect('welcome');
				}}
			 else {

				if (password_verify($password, $user['password'])) {

					$this->session->set_flashdata('message', '<div class="alert alert-danger mx-auto" role="alert">Your Account is not activate! Maybe its blocked by Admin!!</div>');
					redirect('welcome');
				}
				else {

					$this->session->set_flashdata('message', '<div class="alert alert-danger mx-auto" role="alert">Try Again!! Wrong Password!!</div>');
					redirect('welcome');
				}}
		} 
		else {

			$this->session->set_flashdata('message', '<div class="alert alert-danger mx-auto" role="alert">Your Account is not registered!! </div>');
			redirect('welcome');
		}
	}

	public function registration()
	{

		$this->form_validation->set_rules('username', 'Username', 'required|trim' );


		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[mejauser.email]', [
			'is_unique' => 'This email has already registered! Try another email!'
		]);

		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[password2]', [
			'min_length' => 'Password is too short! Its needed at least 8 character!',
			'matches' => 'Password doesnt match! Try again!'
		]);

		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');

		if ($this->form_validation->run() == false) {

			$data['title'] = "Mejapintar";
			$this->load->view('page/logreg_header', $data);
			$this->load->view('loginregis/register');
			$this->load->view('page/logreg_footer');
		} 
		else {

			$this->Model_Loginreg->registration();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulations! your account has been created. Please login!</div>');
			redirect('welcome');
		}
	}

	public function logout()
	{

		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role');
		redirect('guest');
	}

	//statement if you dont have an access
	public function donthaveaccess()
	{

		$this->session->set_flashdata('message_error', '<div class="alert alert-danger mx-auto" role="alert">You dont have an access!!</div>');
		$data['title'] = "Mejapintar";
		$this->load->view('page/logreg_header', $data);
		$this->load->view('page/error_access');
		$this->load->view('page/logreg_footer');
	}

	//if you arent login
	public function errorlogin()
	{

		$this->session->set_flashdata('message_error', '<div class="alert alert-danger mx-auto" role="alert">You arent login! Please login first!</div>');
		$data['title'] = "Mejapintar";
		$this->load->view('page/logreg_header', $data);
		$this->load->view('page/error_login');
		$this->load->view('page/logreg_footer');
	}

}
