<?php

class TestDAO extends CI_Model
{

  public function get($test_id)
  {
      $this->db->select('*');
      $this->db->where('id',$test_id);
      $query = $this->db->get('test');

      $test = $query->result();

      return $test;
  }

  public function delete($test_id)
  {
    $this->db->delete('test', array('id' => $test_id));
  }

  public function insert($test)
  {
    $this->db->set($test);
    $this->db->insert('test');

    return $this->db->insert_id();
  }

  public function update($test)
  {
    if( is_object($test) ) $id = $test->id;
    else if( is_array($test) ) $id = $test['id'];

    $this->db->set($test);
    $this->db->where('id', $id);

    $this->db->update('test');
  }

  public function activateTest($testId, $isActive)
  {
    $this->db->set('is_active', $isActive);
    $this->db->where('id', $testId);
    $this->db->update('test');
  }

}
