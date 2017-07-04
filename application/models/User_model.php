<?php
/**
 *
 */
class User_model extends CI_Model
{

  function __construct()
  {
    $this->load->database();
  }

  public function register($enc_password)
  {
    // user data array
    $data = [
      'name' => $this->input->post('name'),
      'zipcode' => $this->input->post('zipcode'),
      'email' => $this->input->post('email'),
      'username' => $this->input->post('username'),
      'password' => $enc_password,
    ];
    return $this->db->insert('users', $data);
  }

  public function login($username, $password)
  {
    // validate
    $this->db->where('username', $username);
    $this->db->where('password', $password);
    $result = $this->db->get('users');
    if ($result->num_rows() == 1) {
      return $result->row(0)->id;
    } else {
      return false;
    }
  }

  function check_username_exists($username)
  {
    $query = $this->db->get_where('users', ['username' => $username]);
    return empty($query->row_array());
  }

  function check_email_exists($email)
  {
    $query = $this->db->get_where('users', ['email' => $email]);
    return empty($query->row_array());
  }
}
