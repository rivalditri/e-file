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
        $this->form_validation->set_rules('nip', 'NIP', 'required|min_length[8]|max_length[8]|trim');
        $this->form_validation->set_rules('password', 'NIP', 'required|min_length[4]|trim');
        if($this->form_validation->run() == false){
            $this->load->view('auth/login_view');
        }else{
            $this->_login();
        }
    }

    private function _login()
    {
        $nip = $this->input->post('nip');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['nip' => $nip, 'password' => $password])->row_array();
        if($user){
            $this->load->view('dashboard/menu');
        }
    }
}