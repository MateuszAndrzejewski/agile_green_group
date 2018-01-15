<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Controller {

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

	public function index() { redirect('question/list'); }

  public function list($test_id)
	{
		$viewData = array();
    	$viewData['questions'] = $this->questionDAO->get($test_id);
    	$viewData['test'] = $test_id;
    	
		$viewData['view'] = "question/list";
		$this->load->view('template', $viewData);
	}

	public function add($test_id)
	{
		$viewData = array();

		$viewData['view'] = 'question/add';
		$viewData['test_id'] = $test_id;
		$this->load->view('template', $viewData);
	}
	public function edit($question_id)
	{
		$viewData = array();
		if ($question_id != null) {
			$question = $this->questionDAO->getById($question_id) ;
			$viewData['question'] = $question ;
		}
		else {
			$viewData['question'] = "";
			$viewData['hoho'] = "hoho";
		}
	
		$viewData['view'] = 'question/edit';
		$this->load->view('template', $viewData);
	}
	
	public function update()
	{
		$question = array();
	
		$question['ref_test'] = $_POST['ref_test'];
		$test_id = $_POST['ref_test'];
		$question['type'] = $_POST['type'];
		$question['title'] = $_POST['title'];
		$question['content'] = $_POST['content'];
		$question['id'] = $_POST['question_id'];
	
		$this->questionDAO->update($question);
		redirect("question/list/$test_id");
	}
	
	public function create()
	{
		$question = array();

		$question['ref_test'] = $_POST['ref_test'];
		$test_id = $_POST['ref_test'];
		$question['type'] = $_POST['type'];
		$question['title'] = $_POST['title'];
		$question['content'] = $_POST['content'];
		
		$this->questionDAO->insert($question);
		redirect("Question/list/$test_id");
	}
	public function delete()
	{
		$test = array();
	
		$question_id = $_POST['question_id'];
	
		$this->questionDAO->delete($question_id);
		redirect('Test/list');
	}

}
