<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user_model');
        $this->load->model('karyawan_model');
    }
    public function index()
    {
        $data['title'] = 'admin e-link perumda tugu tirta';
        $data['karyawan'] = $this->karyawan_model->get_karyawan();
        $this->load->view('dashboard/menu_admin', $data);
    }

    public function registration()
    {
        $data['title'] = 'admin - e-link perumda tugu tirta';
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
            $this->user_model->create_user();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User berhasil ditambahkan</div>');
            $this->load->view('dashboard/menu_admin');
        }
    }
    public function logOut()
    {
        $data['title'] = 'admin - e-link perumda tugu tirta';
        $data['dokumen'] = $this->dokumen_model->get_dokumen();
        $this->load->view('auth/login_view', $data);
    }

    // public function profile()
    // {
    //     $data['title'] = 'admin - e-link perumda tugu tirta';
    //     $data['dokumen'] = $this->dokumen_model->get_dokumen();
    //     $this->load->view('dashboard/menu_user', $data);
    // }
}