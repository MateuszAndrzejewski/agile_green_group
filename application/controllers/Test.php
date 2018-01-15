<?php
//defined('BASEPATH') OR exit('No direct script access allowed');
require('fpdf.php');
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
	public function getPDF($test_id) {
		$pdf = new FPDF('P','mm','A4');
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);
		$test = $this->testDAO->get($test_id);
		$title = $test[0]->title;
		$locale = $test[0]->locale;
		$active = $test[0]->is_active == 1 ? "Yes" : "No";
		$questions = $this->questionDAO->get($test_id);
		
		$pdf->Cell(0,10, $title,0,1,'C');
		$pdf->Cell(0,10,'Locale: ' . $locale,0,1,'L');
		$pdf->Cell(0,10,'Activated: ' . $active,0,1,'L');
		
		$iterator = 0;
		foreach($questions as $question) {
			$iterator ++;
			$type = $question->type;
			$title = $question->title;
			$content = $question->content;
			
			$stringToInsert = $iterator . ". " . $title . " (" . $type .  "): " . $content;
			$pdf->Cell(0,10,$stringToInsert,0,1,'L');
		}
		
		$pdf->Output();
	}
	public function getCSV($test_id) {
		header('Content-Type: application/excel');
		header('Content-Disposition: attachment; filename="test.csv"');
		

		$test = $this->testDAO->get($test_id);
		$title = $test[0]->title;
		$locale = $test[0]->locale;
		$active = $test[0]->is_active == 1 ? "Yes" : "No";
		$questions = $this->questionDAO->get($test_id);
		$fp = fopen('php://output', 'w');
		
		$data = array(
				"title: ". $title . ",locale: " .$locale . ",Activated: " . $active . "" 
		);
		array_push($data, " ");
		array_push($data, "no.,title,type,content");
		$iterator = 0;
		foreach($questions as $question) {
			$iterator ++;
			$type = $question->type;
			$title = $question->title;
			$content = $question->content;
				
			$stringToInsert = $iterator . "," . $title . "," .$type . "," . $content;
			array_push($data, $stringToInsert);
			
		}
		
		foreach ( $data as $line ) {
		    $val = explode(",", $line);
		    fputcsv($fp, $val);
		}
		fclose($fp);
	}
	public function getXLS($test_id) {
		header ( "Content-type: application/vnd.ms-excel" );
		header ( "Content-Disposition: attachment; filename=test.xls" );
		
		$returnHTML = "<table>";
		
		$test = $this->testDAO->get($test_id);
		$title = $test[0]->title;
		$locale = $test[0]->locale;
		$active = $test[0]->is_active == 1 ? "Yes" : "No";
		$questions = $this->questionDAO->get($test_id);

		$data = array(
				"title: ". $title . ",locale: " .$locale . ",Activated: " . $active . ""
		);
		array_push($data, " ");
		array_push($data, "no.,title,type,content");
		$iterator = 0;
		foreach($questions as $question) {
			$iterator ++;
			$type = $question->type;
			$title = $question->title;
			$content = $question->content;
		
			$stringToInsert = $iterator . "," . $title . "," .$type . "," . $content;
			array_push($data, $stringToInsert);
				
		}
		

		foreach ( $data as $line ) {
			$val = explode(",", $line);
			$returnHTML = $returnHTML . '<tr>';
			
			foreach ($val as $cell) {
				$returnHTML = $returnHTML . '<td>';
				$returnHTML = $returnHTML  . $cell;
				$returnHTML = $returnHTML . '</td>';
			}
			$returnHTML = $returnHTML . '</tr>';
		}
		
		$returnHTML = $returnHTML . "</table>";
		
		echo $returnHTML;
		}

}
