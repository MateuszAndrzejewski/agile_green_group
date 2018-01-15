<?php

class questionDAO extends CI_Model
{

  public function get($test_id, $question_id = null)
  {
      $this->db->select('*');
      if($question_id !== null) $this->db->where('id', $question_id);
      $this->db->where('ref_test', $test_id);
      $query = $this->db->get('question');

      $question = $query->result();

      return $question;
  }
  public function getById($question_id)
  {
  	$this->db->select('*');
  	if($question_id !== null) $this->db->where('id', $question_id);
  	$query = $this->db->get('question');
  
  	$question = $query->result();
  
  	return $question;
  }
  public function delete($question_id)
  {
    $this->db->delete('question', array('id' => $question_id));
  }

  public function insert($question)
  {
    $this->db->set($question);
    $this->db->insert('question');

    return $this->db->insert_id();
  }

  public function update($question)
  {
    if( is_object($question) ) $id = $question->id;
    else if( is_array($question) ) $id = $question['id'];

    $this->db->set($question);
    $this->db->where('id', $id);

    $this->db->update('question');
  }
}
