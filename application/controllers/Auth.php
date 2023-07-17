<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->load->view('auth/login_view');
    }

    public function login()
    {
        $this->form_validation->set_rules('nip', 'NIP', 'required|min_length[8]|max_length[8]|trim');
        if($this->form_validation->run() == false){
            $this->load->view('auth/login_view');
        }else{
            $this->load->view('dashboard/menu');
        }
    }
}