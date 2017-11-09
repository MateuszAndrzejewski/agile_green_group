<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

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

	public function register()
	{
		$user = $_POST['user_details'];

		if( $this->userDAO->is_email_used($user['email']) )
		{
			$message = array(
				'code' => 403,
				'type' => 'danger',
				'icon' => 'glyphicon glyphicon-alert',
				'title' => '<strong>Błąd: E-mail</strong><br><br>',
				'body' => 'Podany adres e-mail już istnieje w systemie.'
			);
		}
		else if( !empty($user) )
		{
			$user['role'] = 'candidate';
			$user['password'] = hash('sha512', $user['role']);

			$this->userDAO->insert($user);

			$message = array(
				'code' => 200,
				'type' => 'success',
				'icon' => 'glyphicon glyphicon-ok',
				'title' => "<strong>".$user['firstname']." ".$user['lastname']."</strong><br><br>",
				'body' => 'Twoje konto zostało utworzone. Możesz teraz zalogować się do serwisu.'
			);
		}

		echo json_encode($message);
	}


}
