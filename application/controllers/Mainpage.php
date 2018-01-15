<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Mainpage extends CI_Controller {

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
		$viewData['view'] = 'application';
		$this->load->view('template', $viewData);
	}


}
