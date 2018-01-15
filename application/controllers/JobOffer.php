<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class JobOffer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
    $this->load->library('form_validation');

		$this->load->model('userDAO');
    $this->load->model('testDAO');
    $this->load->model('jobofferDAO');
	}

	public function index() { redirect('JobOffer/list'); }

  public function list()
	{
		$viewData = array();
    $viewData['job_offers'] = $this->jobofferDAO->get();

		$viewData['view'] = 'joboffer/list';
		$this->load->view('template', $viewData);
	}

	public function add()
	{
		$viewData = array();
		$viewData['tests'] = $this->testDAO->get();

		$viewData['view'] = 'joboffer/add';
		$this->load->view('template', $viewData);
	}

	public function changestatus($id, $status)
	{
		$this->jobofferDAO->change_status($id, $status);
		redirect('JobOffer/list');
	}

	public function create()
	{
		$job_offer = array();

		$job_offer['position'] = $_POST['position'];
		$job_offer['description'] = $_POST['description'];
		$job_offer['ref_test'] = $_POST['ref_test'] == '0' ? null : $_POST['ref_test'];
		$job_offer['is_active'] = $_POST['is_active'];

		$this->jobofferDAO->insert($job_offer);
		redirect('JobOffer/list');
	}

}
