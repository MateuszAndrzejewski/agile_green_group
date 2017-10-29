<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
    $this->load->library('form_validation');
		
		$this->load->model('userDAO');
	}

	public function index()
	{
		$viewData = array();
		$viewData['view'] = 'mainpage';
		$this->load->view('template', $viewData);
	}

	public function login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('email');

		$user = $this->userDAO->authorize($email, $password);

		if( !empty($user) )
		{
			$this->session->set_userdata('is_authorized', true);
			$this->session->set_userdata($user);

			redirect('auth/index'); // ekran po zalogowaniu
		}
		else redirect('auth/index'); // powrót do strony głównej
	}


}
