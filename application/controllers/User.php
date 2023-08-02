<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'e-file perumda tugu tirta';
        $this->load->view('dashboard/menu_user');
    }
    public function sk()
    {
            $data['title'] = 'admin - e-link perumda tugu tirta';
            $data['dokumen'] = $this->dokumen_model->get_dokumen();
            $this->load->view('sk/menu_sk');
    }
}
