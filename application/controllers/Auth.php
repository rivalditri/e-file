<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['title'] = 'Login Page E-file Perumda Air Minum Tugu Tirta';
        $this->form_validation->set_rules('nip', 'NIP', 'required|min_length[8]|max_length[8]|trim');
        $this->form_validation->set_rules('password', 'NIP', 'required|min_length[4]|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login_view', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $nip = $this->input->post('nip');
        $pwd = md5($this->input->post('password'));
        $user = $this->db->get_where('user', ['nip' => $nip, 'password' => $pwd])->row_array();
        if ($user) {
            $data = [
                'nip' => $user['nip'],
                'nama' => $user['nama'],
            ];
            $this->session->set_userdata($data);
            if ($user['role_id'] == 1) {
                redirect('admin');
            } else {
                redirect('user');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NIP atau Password salah!</div>');
            redirect('auth');
        }
    }
}