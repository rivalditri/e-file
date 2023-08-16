<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dokumen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dokumen_model');
    }
    public function index()
    {
        $data['title'] = 'admin - e-link perumda tugu tirta';
        $data['dokumen'] = $this->dokumen_model->get_dokumen();
        $this->load->view('dashboard/menu_dokumen', $data);
    }

}