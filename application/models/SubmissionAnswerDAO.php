<?php

class SubmissionAnswerDAO extends CI_Model
{
	public function get($submission_id)
	{
		$this->db->select('*');
		$this->db->where('ref_submission', $submission_id);
		$query = $this->db->get('submission_answer');
		
		$submission_answer = $query->result();
		
		return $submission_answer;
	}
	
	public function delete($submission_answer_id)
	{
		$this->db->delete('submission_answer', array('id' => $submission_answer_id));
	}
	
	public function insert($submission_answer)
	{
		$this->db->set($submission_answer);
		$this->db->insert('submission_answer');

		return $this->db->insert_id();
	}
	
	public function update($submission_answer)
	{
		if( is_object($submission_answer) ) $id = $submission_answer->id;
		else if( is_array($submission_answer) ) $id = $submission_answer['id'];

		$this->db->set($submission_answer);
		$this->db->where('id', $id);

		$this->db->update('submission_answer');
	}
}