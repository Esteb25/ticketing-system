<?php
defined('BASEPATH')or exit('No direct script access allowed');
class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user_model');
        $this->load->library('session');
        $this->load->helper('url');

        date_default_timezone_set('Asia/Manila');
        // check user is already logged in
        if($this->session->userdata('user_id')) {
            return redirect('home');
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Ticketing System | Login',
        ];
        $this->load->view('login',$data);
    }

    public function auth()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user_query = $this->user_model->validate_user($username, $password);
        if ($user_query->num_rows() > 0) {
            $user = $user_query->row();
            $user_id = $user->id;

            // check if user is active
            if($user->is_active == 1) {
                // set user session
                $this->session->set_userdata('user_id', $user_id);
                redirect('home', 'refresh');
            } else {
                $this->session->set_flashdata('msg','User account is Inactive');
                redirect('login','refresh');
            }
        } else {
            $this->session->set_flashdata('msg', 'Username or Password incorrect');
            redirect('login');
        }
    }
}