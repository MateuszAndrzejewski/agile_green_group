<?php

class JobOfferDAO extends CI_Model
{

  public function get($job_offer_id)
  {
      $this->db->select('*');
      $this->db->where('id',$job_offer_id);
      $query = $this->db->get('job_offer');

      $job_offer = $query->result();

      return $job_offer;
  }

  public function delete($job_offer_id)
  {
    $this->db->delete('job_offer', array('id' => $job_offer_id));
  }

  public function insert($job_offer)
  {
    $this->db->set($job_offer);
    $this->db->insert('job_offer');

    return $this->db->insert_id();
  }

  public function update($job_offer)
  {
    if( is_object($job_offer_id) ) $id = $job_offer_id->id;
    else if( is_array($job_offer_id) ) $id = $job_offer_id['id'];

    $this->db->set($job_offer);
    $this->db->where('id', $job_offer_id);

    $this->db->update('job_offer');
  }


  public function setRefTest($job_offer_id, $ref_test)
  {
    $this->db->set('ref_test', $ref_test);
    $this->db->where('id', $job_offer_id);
    $this->db->update('job_offer');
  }
