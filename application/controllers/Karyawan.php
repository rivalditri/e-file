<?php
defined('BASEPATH') or exit('No direct script access allowed');

class karyawan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('karyawan_model');
    }

    public function index()
    {
        $data = array();
        $data = $this->karyawan_model->get_karyawan();
        echo json_encode($data);
    }

    public function getByNip()
    {
        $data = html_entity_decode($this->input->get('nip'));
        $data = $this->karyawan_model->get_karyawan_by_nip($data);
        echo json_encode($data);
    }
}