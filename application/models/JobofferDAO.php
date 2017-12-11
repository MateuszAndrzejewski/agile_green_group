<?php

class JobofferDAO extends CI_Model
{

  public function get($job_offer_id = null, $is_active = null)
  {
      $this->db->select('jo.*, t.title, t.locale');

      if($job_offer_id !== null) $this->db->where('jo.id',$job_offer_id);
      if($is_active !== null) $this->db->where('jo.status',1);

      $this->db->join('test t', 't.id=jo.ref_test', 'left');
      $query = $this->db->get('job_offer jo');

      $job_offer = $query->result();

      return $job_offer;
  }

  public function delete($job_offer_id)
  {
    $this->db->delete('job_offer', array('id' => $job_offer_id));
  }

  public function insert($job_offer)
  {
    $this->db->insert('job_offer', $job_offer);

    return $this->db->insert_id();
  }

  public function update($job_offer)
  {
    if( is_object($job_offer_id) ) $id = $job_offer_id->id;
    else if( is_array($job_offer_id) ) $id = $job_offer_id['id'];

    $this->db->where('id', $job_offer_id);

    $this->db->update('job_offer');
  }

  public function change_status($id, $status)
  {
    $this->db->set('is_active', $status);
    $this->db->where('id', $id);

    $this->db->update('job_offer');
  }


  public function setRefTest($job_offer_id, $ref_test)
  {
    $this->db->set('ref_test', $ref_test);
    $this->db->where('id', $job_offer_id);
    $this->db->update('job_offer');
  }
}
