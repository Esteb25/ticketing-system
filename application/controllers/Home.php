<?php
defined('BASEPATH')or exit('No direct script access allowed');
class Home extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('template');
        date_default_timezone_set('Asia/Manila');
        // check if user is logged in
        if(!$this->session->userdata('user_id'))
        {
            return redirect('login');
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Ticketing System | Home',
            'header_title' => 'Home'
        ];
        $this->template->render_view('home', $data);
    }
}