<?php
/**
 * Created by PhpStorm.
 * User: Imaxinacion
 * Date: 11/1/2018
 * Time: 2:06 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Authenticate extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('AuthenticateModel');
    }

    public function index() {
        $data = [
            'menu' => 'login'
        ];

        return $this->load->view('login', $data);
    }

    public function login() {
        $data = [];

        $data = [
            'menu' => 'login'
        ];

        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        if($this->input->post()){
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[5]|max_length[200]');
            $this->form_validation->set_rules('password', 'password', 'required|min_length[5]|max_length[60]');
            if ($this->form_validation->run() == true) {
                $con['returnType'] = 'single';
                $con['conditions'] = array(
                    'email'=> $this->input->post('email')
//                  'password' => md5($this->input->post('password'))
                    // ,'status' => '1'
                );



                $checkLogin = $this->AuthenticateModel->getRows($con);
                if($checkLogin) {

                    $getPass = $this->AuthenticateModel->fetchByEmail($checkLogin['email'], 'users');
                    foreach($getPass->result() as $userPass) {
                        $actualPass = $userPass->password;
                    }

                    if(password_verify($this->input->post('password'), $actualPass)) {

                        $this->session->set_userdata('isUserLoggedIn', TRUE);
                        $this->session->set_userdata('userId',$checkLogin['id']);
                        $this->session->set_userdata('fullname', $checkLogin['firstName']);
                        $this->session->set_userdata('email', $checkLogin['email']);
                        $this->session->set_userdata('acctType', $checkLogin['acctType']);

//                        if($this->session->userdata('acctType') == '') {
//                            redirect('Admin/dashboard');
//                        } else {
//                            redirect('User/account');
//                        }

                        switch($this->session->userdata('acctType')) {
                            case 'sme':
                                redirect(base_url().'Authenticate/shop');
                                break;
                            case 'individual':
                                redirect(base_url().'Authenticate/shop');
                                break;
                            case 'merchant':
                                redirect(base_url().'Admin');
                                break;
                            default:
                                redirect(base_url().'Home');
                                break;
                        }

                    } else{
                        $data['error_msg'] = 'Wrong email or password, please try again.';
                    }
                }

            }
        }

        return $this->load->view('login', $data);
    }

    public function test(){

        return $this->load->view('dashboard_home');
    }

    public function shop() {
        return $this->load->view('shop');
    }

    public function register() {
        $this->load->library('form_validation');
        $data = array();
        $userData = array();

        $data = [
            'menu' => 'register'
        ];

//        echo '6';
        if($this->input->post()){
//             echo "1";
            $this->form_validation->set_rules('fullname', 'Full Name', 'required|min_length[2]|max_length[200]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[5]|max_length[200]');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[60]');
            $this->form_validation->set_rules('acctType', 'Account Type', 'required|min_length[2]');
//            echo "2";
            $userData = [
                'fullname' => strip_tags($this->input->post('fullname')),
                'email' => strip_tags($this->input->post('email')),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'acctType' => strip_tags($this->input->post('acctType')),
            ];

//            echo "3";
            if($this->form_validation->run() == true){
                echo '577';
                $con['returnType'] = 'single';
                $con['conditions'] = [
                    'email'=> strip_tags($this->input->post('email'))
                ];

                $checkLogin = $this->AuthenticateModel->getRows($con);

//                echo "4";

                if($checkLogin['email'] != strip_tags($this->input->post('email'))) {
                    $insert = $this->AuthenticateModel->insert($userData);
                    if($insert){
                        $this->session->set_userdata('success_msg', 'Your registration was successfully. Please login to your account.');
                        redirect('Authenticate/login');
                        // echo 'dsjndoi';
                    }else{
                        $data['error_msg'] = 'Some problems occured, please try again.';
                    }
                } else {
                    $data['error_msg'] = 'Email address already taken.';
                }


            } else {
                 echo 'Hi there';
            }

        }

        $data['user'] = $userData;

//        var_dump($this->input->post());

        return $this->load->view('register', $data);
    }

    public function logout(){
        $this->session->unset_userdata('isUserLoggedIn');
        $this->session->unset_userdata('userId');
        $this->session->sess_destroy();
        redirect(base_url());
    }
}