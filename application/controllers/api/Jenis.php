<?php
use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/RestController.php';

defined('BASEPATH') or exit('No direct script access allowed');

class jenis extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dokumen_model', 'jenis');
        // $this->load->helper(array('form', 'url'));
    }

    public function index_post()
    {
        $jenis = $this->post('jenisdokumen');
        $kode = $this->post('kodejenisdokumen');
        $data['kode_jenis_dokumen'] = $kode;
        $data['jenis_dokumen'] = $jenis;
        $result = $this->jenis->insert_jenis($data);
        if ($result) {
            $this->response(
                array(
                    "status" => "success",
                    "message" => "jenis berhasil ditambahkan",
                    "data" => array($data),
                ),
                RestController::HTTP_CREATED
            );
        } else {
            $this->response(
                array(
                    "status" => "error",
                    "message" => "jenis gagal ditambahkan",
                    "error" => "something went wrong",
                ),
                RestController::HTTP_BAD_REQUEST
            );
        }
    }

    public function index_get()
    {
        $jenis = $this->jenis->get_jenis();
        if ($jenis) {
            $this->response(
                $jenis,
                RestController::HTTP_OK
            );
        }
    }

    public function index_delete()
    {
        $jenis_dokumen = $this->input->get('id_jenis_dokumen');
        $data = $this->db->get_where('jenis_dokumen', ['id_jenis_dokumen' => $jenis_dokumen])->row_array();
        $row = $this->jenis->delete_jenis($jenis_dokumen);
        if ($row === true) {
            $this->response([
                'status' => true,
                'message' => 'Data berhasil dihapus',
                'data' => array($data)
            ], RestController::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Data gagal dihapus',
                'error' => $row,
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
}