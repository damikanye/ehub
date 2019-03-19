<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    function __construct() {
      parent::__construct();
      $this->load->library('form_validation');
      $this->load->model('UserModel');
  }

  /*
   * User account information
   */
  public function account(){
      $this->load->model('AdminModel');
      $data = array();
      if($this->session->userdata('isUserLoggedIn')){
          $data['user'] = $this->UserModel->getRows(array('id' => $this->session->userdata('userId')));
          $data['testScores'] = $this->AdminModel->fetchTestScore('test_scores');
          //load the view
          $this->load->view('dashboard_home', $data);
      } else{
          redirect('user/login');
      }
  }

  /*
   * User login
   */
  public function login(){
      // echo 'We\'re here';
      // var_dump($_SESSION);
      $data = array();
      if($this->session->userdata('success_msg')){
          $data['success_msg'] = $this->session->userdata('success_msg');
          $this->session->unset_userdata('success_msg');
      }
      if($this->session->userdata('error_msg')){
          $data['error_msg'] = $this->session->userdata('error_msg');
          $this->session->unset_userdata('error_msg');
      }
      if($this->input->post('submit')){
          $this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[5]|max_length[200]');
          $this->form_validation->set_rules('password', 'password', 'required|min_length[5]|max_length[60]');
          if ($this->form_validation->run() == true) {
              $con['returnType'] = 'single';
              $con['conditions'] = array(
                  'email'=> $this->input->post('email')
//                  'password' => md5($this->input->post('password'))
                  // ,'status' => '1'
              );



              $checkLogin = $this->UserModel->getRows($con);
              if($checkLogin) {

                  $getPass = $this->UserModel->fetchByEmail($checkLogin['email'], 'users');
                  foreach($getPass->result() as $userPass) {
                      $actualPass = $userPass->password;
                  }

                  if(password_verify($this->input->post('password'), $actualPass)) {

                      $this->session->set_userdata('isUserLoggedIn', TRUE);
                      $this->session->set_userdata('userId',$checkLogin['id']);
                      $this->session->set_userdata('username', $checkLogin['name']);
                      $this->session->set_userdata('email', $checkLogin['email']);
                      $this->session->set_userdata('group', $checkLogin['accessLevel']);
//                      $this->session->set_userdata('lastname', $checkLogin['lastName']);

//                      if($this->session->userdata('group') == 1) {
//                          redirect('user/account');
//                      } else {
//                          redirect('User/account');
//                      }
                      redirect('user/account');

                  } else {
                      $data['error_msg'] = 'Wrong email or password, please try again.';
                  }
              }

          }
      }
      //load the view
      $this->load->view('login', $data);
  }

  /*
   * User registration
   */
  public function registration(){
      $data = array();
      $userData = array();
//       echo "some";
      if($this->input->post('submit')){
//         echo "somesubmit";
          $this->form_validation->set_rules('name', 'Name', 'required|min_length[2]|max_length[200]');
          $this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[5]|max_length[200]');
          $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[60]');
          $this->form_validation->set_rules('institution', 'Institution', 'required|min_length[2]|max_length[200]');
          $this->form_validation->set_rules('department', 'Department', 'required|min_length[2]|max_length[200]');
          $this->form_validation->set_rules('course', 'Course', 'required|min_length[2]|max_length[200]');
          $this->form_validation->set_rules('accessLevel', 'accessLevel', 'required|min_length[1]|max_length[1]');

          $userData = array(
              'name' => strip_tags($this->input->post('name')),
              'email' => strip_tags($this->input->post('email')),
              'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
              'institution' => strip_tags($this->input->post('institution')),
              'department' => strip_tags($this->input->post('department')),
              'course' => strip_tags($this->input->post('course')),
              'accessLevel' => strip_tags($this->input->post('accessLevel')),
          );

          if($this->form_validation->run() == true){
              $con['returnType'] = 'single';
              $con['conditions'] = array(
                  'email'=> strip_tags($this->input->post('email'))
              );

              $checkLogin = $this->UserModel->getRows($con);

              if($checkLogin['email'] != strip_tags($this->input->post('email'))) {
                  $insert = $this->UserModel->insert($userData);
                  if($insert){
                      $this->session->set_userdata('success_msg', 'Your registration was successfully. Please login to your account.');

                      $this->session->set_userdata('isUserLoggedIn', TRUE);
                      $this->session->set_userdata('userId',$checkLogin['id']);
                      $this->session->set_userdata('username', $checkLogin['name']);
                      $this->session->set_userdata('email', $checkLogin['email']);
                      $this->session->set_userdata('group', $checkLogin['accessLevel']);
                      //redirect('account');
                    //$this->load->view('account');
                      // echo 'dsjndoi';
			account();
                  }else{
                      $data['error_msg'] = 'Some problems occured, please try again.';
                  }
              } else {
                  $data['error_msg'] = 'Email address already taken.';
              }


          } else {
            // echo 'Hi there';
          }

      }
      $data['user'] = $userData;
      //load the view
      $this->load->view('register', $data);
  }

  /*
   * User logout
   */
  public function logout(){
      $this->session->unset_userdata('isUserLoggedIn');
      $this->session->unset_userdata('userId');
      $this->session->sess_destroy();
      $this->load->view('home');
  }

  /*
   * Existing email check during validation
   */
  public function email_check($str){
      $con['returnType'] = 'count';
      $con['conditions'] = array('email'=>$str);
      $checkEmail = $this->UserModel->getRows($con);
      if($checkEmail > 0){
          $this->form_validation->set_message('email_check', 'The given email already exists.');
          return FALSE;
      } else {
          return TRUE;
      }
  }
}
