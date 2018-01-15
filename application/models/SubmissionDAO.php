<?php

class SubmissionDAO extends CI_Model
{
	public function get($test_id, $submission_id = null)
	{
		$this->db->select('*');
		if($submission_id !== null) $this->db->where('id', $submission_id);
		$this->db->where('ref_test', $test_id);
		$query = $this->db->get('submission');
		
		$submission = $query->result();
		
		return $submission;
	}
	
	public function getById($submission_id)
	{
		$this->db->select('*');
		if($submission_id !== null) $this->db->where('id', $submission_id);
		$query = $this->db->get('submission');
		
		$submission = $query->result();
		
		return $submission;
	}
	
	public function delete($submission_id)
	{
		$this->db->delete('submission', array('id' => $submission_id));
	}
	
	public function insert($submission)
	{
		$this->db->set($submission);
		$this->db->insert('submission');

		return $this->db->insert_id();
	}
	
	public function update($submission)
	{
		if( is_object($submission) ) $id = $submission->id;
		else if( is_array($submission) ) $id = $submission['id'];

		$this->db->set($submission);
		$this->db->where('id', $id);

		$this->db->update('submission');
	}
	
	public function grade($submission_id, $grade)
	{
		$this->db->set('grade', $grade);
		$this->db->where('id', $submission_id);
		$this->db->update('submission');
	}
}