<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nip')) {
            redirect('auth');
        }
        $this->load->model('dokumen_model');
    }
    public function index()
    {
        $data['title'] = 'User - e-link perumda tugu tirta';
        $this->load->view('dashboard/user/menu', $data);
    }
    public function sk()
    {
        $data['title'] = 'SK - e-link perumda tugu tirta';
        $data['dokumen'] = $this->dokumen_model->get_dokumenSK();
        $this->load->view('dashboard/user/menu_sk', $data);
    }

    public function identitas()
    {
        $data['title'] = 'Data Pribadi - e-link perumda tugu tirta';
        $data['dokumen'] = $this->dokumen_model->get_dokumenIdentitas();
        $this->load->view('dashboard/user/menu_identitas', $data);
    }

    public function ijazah()
    {
        $data['title'] = 'Ijazah - e-link perumda tugu tirta';
        $data['dokumen'] = $this->dokumen_model->get_dokumenIjazah();
        $this->load->view('dashboard/user/menu_ijazah', $data);
    }

    public function sertifikat()
    {
        $data['title'] = 'Sertifikat - e-link perumda tugu tirta';
        $data['dokumen'] = $this->dokumen_model->get_dokumenSertifikat();
        $this->load->view('dashboard/user/menu_sertifikat', $data);
    }

}