<?php
use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/RestController.php';

defined('BASEPATH') or exit('No direct script access allowed');

class dokumen extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dokumen_model', 'dokumen');
    }

    public function index_get()
    {
        $dokumen = $this->dokumen->get_dokumen();
        if ($dokumen) {
            $this->response(
                $dokumen,
                RestController::HTTP_OK
            );
        }
    }

    public function getByNip()
    {
        $data = html_entity_decode($this->input->get('nip'));
        $data = $this->dokumen_model->get_dokumen_by_nip($data);
        echo json_encode($data);
    }
}