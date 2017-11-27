<?php

class UserDAO extends CI_Model
{

  public function get($user_id)
  {
    $this->db->select('*');
    $this->db->where('id', $user_id);
    $query = $this->db->get('user');

    $user = $query->result();

    return $user;
  }

  public function is_email_used($email)
  {
    $this->db->select('*');
    $this->db->where('email', $email);
    $query = $this->db->get('user');

    $user = $query->result();

    if( !empty($user) ) return true;
    else return false;
  }

  public function delete($user_id)
  {
    $this->db->delete('user', array('id' => $user_id));
  }

  public function insert($user)
  {
    $this->db->set($user);
    $this->db->insert('user');

    return $this->db->insert_id();
  }

  public function update($user)
  {
    if( is_object($user) ) $id = $user->id;
    else if( is_array($user) ) $id = $user['id'];

    $this->db->set($user);
    $this->db->where('id', $id);

    $this->db->update('user');
  }

  public function authorize($email, $password)
  {
      $this->db->select('*');
      $this->db->where('email', $email);
      $this->db->where('password = sha2("'.$password.'", 512)');
      $query = $this->db->get('user');

      $user = $query->result()[0];
      
      return $user;
  }


}
