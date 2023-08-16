<?php
use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/RestController.php';

defined('BASEPATH') or exit('No direct script access allowed');

class karyawan extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('karyawan_model', 'karyawan');
    }

    public function index_get()
    {
        $karyawan = $this->karyawan->get_karyawan();
        if ($karyawan) {
            $this->response(
                $karyawan,
                RestController::HTTP_OK
            );
        }
    }
}