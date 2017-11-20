<?php

class UserDAO extends CI_Model
{

  public function get($user_id)
  {
      $this->db->select('*');
      $query = $this->db->get('user');

      $user = $query->result();

      return $user;
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
      $query = $this->db->get_where('mytable', array('email' => $email, 'password' => $password), 1);

      $user = $query->result();

      return $user;
  }


}
