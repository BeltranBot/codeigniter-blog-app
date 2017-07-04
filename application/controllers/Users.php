<?php
/**
 *
 */
class Users extends CI_Controller
{

  public function register()
  {
    $data['title'] = 'Sign up';

    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('zipcode', 'ZipCode', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_email_exists');
    $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('password2', 'Confirm Password', 'required|matches[password]');

    if ($this->form_validation->run() === false) {
      $this->load->view('templates/header');
      $this->load->view('users/register', $data);
      $this->load->view('templates/footer');
    } else {
      // Encrypt password
      $enc_password = md5($this->input->post('password'));
      $this->user_model->register($enc_password);
      // set message
      $this->session->set_flashdata('success_message', 'You are registered and can log in');
      redirect('posts');
    }
  }

  // login user
  public function login()
  {
    $data['title'] = 'Sign In';

    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() === false) {
      $this->load->view('templates/header');
      $this->load->view('users/login', $data);
      $this->load->view('templates/footer');
    } else {
      // Get username
      $username = $this->input->post('username');
      // Encrypt password
      $password = md5($this->input->post('password'));
      // login user
      $user_id = $this->user_model->login($username, $password);
      if ($user_id) {
        // create session
        $user_data = [
          'user_id' => $user_id,
          'username' => $username,
          'logged_in' => true
        ];
        $this->session->set_userdata($user_data);
        // set message
        $this->session->set_flashdata('success_message', 'You are now logged in.');
        redirect('posts');
      } else {
        // set message
        $this->session->set_flashdata('error_message', 'Login is invalid.');
        redirect('users/login');
      }
    }
  }

  public function logout()
  {
    // unset user data
    $this->session->unset_userdata('logged_in');
    $this->session->unset_userdata('user_id');
    $this->session->unset_userdata('username');
    // set message
    $this->session->set_flashdata('success_message', 'User logged out.');
      redirect('users/login');
  }

  public function check_username_exists($username)
  {
    $this->form_validation->set_message('check_username_exists', 'That username is taken please choose a different one.');
    return $this->user_model->check_username_exists($username);
  }

  public function check_email_exists($email)
  {
    $this->form_validation->set_message('check_email_exists', 'That email is taken please choose a different one.');
    return $this->user_model->check_email_exists($email);
  }
}
