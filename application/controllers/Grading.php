<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Grading extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('array');
		$this->load->library('form_validation');
		

		$this->load->model('userDAO');
		$this->load->model('testDAO');
		$this->load->model('jobofferDAO');
		$this->load->model('questionDAO');
		$this->load->model('submissionDAO');
		$this->load->model('submissionanswerDAO');
		$this->load->model('mailDAO');
	}

	public function list($test_id)
	{
		$submissions = $this->submissionDAO->get($test_id);
		
		foreach($submissions as $key => $submission)
		{
			$mail = $this->mailDAO->get($submission);
			$submissions[$key]->mail = $mail;
		}
		
		$viewData = array();
    	$viewData['submissions'] = $submissions;
		
		$viewData['view'] = 'grading/list_submissions';
		$this->load->view('template', $viewData);
	}
	
	public function viewSubmission($submission_id)
	{
		$submission = $this->submissionDAO->getById($submission_id)[0];
		$submissionQA = $this->submissionanswerDAO->get($submission->id);
		foreach($submissionQA as $key => $answer)
		{
			$question = $this->questionDAO->get($submission->ref_test, $answer->ref_question)[0];
			$submissionQA[$key]->question = $question;
		}
		
		$viewData = array();
		$viewData['submissionId'] = $submission_id;
		$viewData['submission'] = $submission;
		$viewData['submissionQA'] = $submissionQA;
		
		$viewData['view'] = 'grading/grade';
		$this->load->view('template', $viewData);
	}
	
	public function grade($submission_id)
	{
		$submission = $this->submissionDAO->getById($submission_id)[0];
		$submission_grade = $_POST['grade'];
		$this->submissionDAO->grade($submission_id, $submission_grade);
		redirect("Grading/list/$submission->ref_test");
	}
}
