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
            $this->load->view('auth/login', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $data['title'] = 'E-file Perumda Air Minum Tugu Tirta';
        $nip = $this->input->post('nip');
        $pwd = md5($this->input->post('password'));
        $user = $this->db->get_where('user', ['nip' => $nip, 'password' => $pwd])->row_array();
        if ($user) {
            $this->load->view('dashboard/menu1', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NIP atau Password salah!</div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules('nip', 'NIP', 'required|min_length[8]|max_length[8]|trim|is_unique[user.nip]', [
            'is_unique' => 'NIP ini sudah terdaftar!'
        ]);
        // $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        // $this->form_validation->set_rules('password1', 'Password', 'required|min_length[4]|trim|matches[password2]', [
        //     'matches' => 'Password tidak sama!',
        //     'min_length' => 'Password terlalu pendek!'
        // ]);
        // $this->form_validation->set_rules('password2', 'Password', 'required|min_length[4]|trim|matches[password1]');
        // if ($this->form_validation->run() == false) {
        //     $this->load->view('auth/register_view');
        // } else {
        // $this->_addUser();
        // }
        $data = [
            'nip' => htmlspecialchars($this->input->post('nip', true)),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'role_id' => $this->input->post('role', true),
            'password' => md5($this->input->post('password1')),
        ];
        $this->db->insert('user', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun anda telah dibuat. Silahkan Login</div>');
        redirect('auth');
    }
}