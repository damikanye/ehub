<?php
/**
 * Created by PhpStorm.
 * User: Imaxinacion
 * Date: 11/1/2018
 * Time: 8:06 PM
 */

class Admin extends CI_Controller {

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
        $this->load->model('AdminModel');
        $this->test = 'test_scores';
    }

    public function index() {
        $data = [];
        $data =  [
            'testScores' => $this->AdminModel->fetchTestScore('test_scores')
        ];

        $this->load->view('dashboard_home', $data);
    }

    public function test_scores() {
        $data = [];
        $data =  [
            'testScores' => $this->AdminModel->fetchTestScore('test_scores')
        ];

        $this->load->view('test_scores', $data);
    }

    public function add_test_score() {
        $data = array();

        if($this->input->post('submit')) {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[5]|max_length[200]');
            $this->form_validation->set_rules('fullname', 'Fullname', 'required|min_length[5]|max_length[60]');
            $this->form_validation->set_rules('score', 'Score', 'required');

            $userData = array(
                'fullname' => strip_tags($this->input->post('fullname')),
                'email' => strip_tags($this->input->post('email')),
                'score' => strip_tags($this->input->post('score')),
            );

            $insert = $this->AdminModel->insertProduct($userData);

            if($insert) {
                redirect('admin/test_scores');
            } else {
                'djssd';
            }

        }

        $this->load->view('add_test_score');
    }

    function edit_test_score() {
        if($_GET['id']) {

            @$id = $_GET['id'];
            $data = [];


            $data = [
                'testScores' => $this->AdminModel->getScoreRows($id, 'test_scores')
            ];


            if ($this->input->post('submit')) {
//                die();
//                $this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[5]|max_length[200]');
//                $this->form_validation->set_rules('fullname', 'Fullname', 'required|min_length[5]|max_length[60]');
//                $this->form_validation->set_rules('score', 'Score', 'required');

                $userData = array(
                    'fullname' => strip_tags($this->input->post('fullname')),
                    'email' => strip_tags($this->input->post('email')),
                    'score' => strip_tags($this->input->post('score')),
                );

                $edit = $this->AdminModel->updateData($id, 'test_scores', $userData);

                if ($edit) {
                    redirect('admin/test_scores');
                }
//                else {
//                    echo 'djssd';
//                    die();
//                }


            }

            $this->load->view('edit_test_score', $data);
        } else {
            redirect('admin/test_scores');
        }


    }

    public function delete_test_score() {
            @$id = $_GET['id'];

            $delete = $this->AdminModel->deleteData($id, 'id', $this->test);

            if ($delete) {
                redirect('admin/test_scores');
//                $this->session->set_userdata('admin_success_msg', 'Your category has been added successfully.');
//                redirect('Admin/test_scores');
            } else {
                //            redirect('Admin/category');
                $data['error_msg'] = 'Some problems occured, please try again.';

            }

        redirect('admin/test_scores');
    }

    public function exam_scores() {
        $data =  [
            'testScores' => $this->AdminModel->fetchTestScore('exam_scores')
        ];

        $this->load->view('exam_scores', $data);
    }

    public function add_exam_score() {
        $data = array();

        if($this->input->post('submit')) {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[5]|max_length[200]');
            $this->form_validation->set_rules('fullname', 'Fullname', 'required|min_length[5]|max_length[60]');
            $this->form_validation->set_rules('score', 'Score', 'required');

            $userData = array(
                'fullname' => strip_tags($this->input->post('fullname')),
                'email' => strip_tags($this->input->post('email')),
                'score' => strip_tags($this->input->post('score')),
            );

            $insert = $this->AdminModel->insertExam($userData);

            if($insert) {
                redirect('admin/exam_score');
            } else {
                'djssd';
            }

        }

        $this->load->view('add_exam_score');
//        echo 'kdls';
    }

    function edit_exam_score() {

        @$id = $_GET['id'];
        $data = [];


        $data =  [
            'testScores' => $this->AdminModel->getScoreRows($id, 'exam_scores')
        ];


        if($this->input->post('submit')) {
//                die();
//                $this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[5]|max_length[200]');
//                $this->form_validation->set_rules('fullname', 'Fullname', 'required|min_length[5]|max_length[60]');
//                $this->form_validation->set_rules('score', 'Score', 'required');

            $userData = array(
                'fullname' => strip_tags($this->input->post('fullname')),
                'email' => strip_tags($this->input->post('email')),
                'score' => strip_tags($this->input->post('score')),
            );

            $edit = $this->AdminModel->updateData($id, 'exam_scores', $userData);

            if($edit) {
                redirect('admin/exam_scores');
            }
//                else {
//                    echo 'djssd';
//                    die();
//                }



        }

        $this->load->view('edit_exam_score', $data);
// else {
//            redirect('admin/test_scores');
//        }

    }

    public function delete_exam_score() {
        @$id = $_GET['id'];

        $delete = $this->AdminModel->deleteData($id, 'id', 'exam_scores');

        if ($delete) {
            redirect('admin/exam_scores');
//                $this->session->set_userdata('admin_success_msg', 'Your category has been added successfully.');
//                redirect('Admin/test_scores');
        } else {
            //            redirect('Admin/category');
            $data['error_msg'] = 'Some problems occured, please try again.';

        }

        redirect('admin/exam_scores');
    }

    public function supervisors() {

        $this->load->view('supervisors');
    }

    public function counsellors() {

        $this->load->view('counsellors');
    }

}