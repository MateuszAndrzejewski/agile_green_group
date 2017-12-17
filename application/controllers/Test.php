<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	$this->load->helper('form');
    $this->load->library('form_validation');

	$this->load->model('userDAO');
    $this->load->model('testDAO');
    $this->load->model('jobofferDAO');
    $this->load->model('questionDAO');
	}

	public function index() { redirect('Test/list'); }

  public function list()
	{
		$viewData = array();
    	$viewData['tests'] = $this->testDAO->get();

		$viewData['view'] = 'test/list';
		$this->load->view('template', $viewData);
	}

	public function add()
	{
		$viewData = array();
	
		$viewData['view'] = 'test/add';
		$this->load->view('template', $viewData);
	}
	
	public function edit($test_id)
	{
		$viewData = array();
		if ($test_id != null) {
			$viewData['question'] = $this->questionDAO->get($test_id);
			$test = $this->testDAO->get($test_id) ;
			$viewData['test'] = $test ;
		}
		else {
			$viewData['question'] = "";
			$viewData['test'] = "" ;
		}

		$viewData['view'] = 'test/edit';
		$this->load->view('template', $viewData);
	}

	public function changestatus($id, $status)
	{
		$this->testDAO->change_status($id, $status);
		redirect('Test/list');
	}


	public function create()
	{
		$test = array();

		$test['title'] = $_POST['title'];
		$test['locale'] = $_POST['locale'];
		$test['is_active'] = $_POST['is_active'];

		$this->testDAO->insert($test);
		redirect('Test/list');
	}
	
	public function update()
	{
		$test = array();
	
		$test['title'] = $_POST['title'];
		$test['locale'] = $_POST['locale'];
		$test['is_active'] = $_POST['is_active'];
		$test['id'] = $_POST['test_id'];
		
		$this->testDAO->update($test);
		redirect('Test/list');
	}
	public function delete()
	{
		$test = array();
	
		$testId = $_POST['test_id'];
	
		$this->testDAO->delete($testId);
		redirect('Test/list');
	}

}
