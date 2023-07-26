<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['title'] = 'admin - e-file perumda tugu tirta';
        $this->load->view('dashboard/menu_admin', $data);
    }

    public function registration()
    {
        $data['title'] = 'admin - e-file perumda tugu tirta';
        $this->form_validation->set_rules('nip', 'NIP', 'required|min_length[8]|max_length[8]|trim|is_unique[user.nip]', [
            'is_unique' => 'NIP ini sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|min_length[4]|trim|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|min_length[4]|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('dashboard/menu_admin', $data);
        } else {
            $this->_addUser();
        }
    }

    private function _adduser()
    {
        $data = [
            'nip' => htmlspecialchars($this->input->post('nip', true)),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'role_id' => $this->input->post('role', true),
            'password' => md5($this->input->post('password1')),
        ];
        $this->db->insert('user', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun anda telah dibuat. Silahkan Login</div>');
        $this->load->view('dashboard/menu_admin');
    }
}