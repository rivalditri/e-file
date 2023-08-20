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
        $this->load->helper(array('form', 'url'));
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
    public function index_post()
    {
        $id = $this->post('id');
        $jenis = $this->post('jenis');
        if (!$id) {
            $this->response(
                array(
                    "status" => "failed",
                    "message" => "id tidak boleh kosong"
                ),
                RestController::HTTP_BAD_REQUEST
            );
        } else if (!$jenis) {
            $this->response(
                array(
                    "status" => "failed",
                    "message" => "jenis tidak boleh kosong"
                ),
                RestController::HTTP_BAD_REQUEST
            );
        } else {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'pdf|doc|docx|jpg|png|jpeg';
            $config['max_size'] = 10000;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('file')) {
                $error = array('error' => $this->upload->display_errors());
                $this->response(
                    array(
                        "status" => "failed",
                        "message" => "dokumen gagal ditambahkan",
                        "data" => array($error),
                    ),
                    RestController::HTTP_BAD_REQUEST
                );
            } else {
                $uploaded_data = $this->upload->data();
                $file_ext = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
                $data['nama_dokumen'] = $uploaded_data['file_name'];
                $data['path'] = $uploaded_data['full_path'];
                $data['id_karyawan'] = $id;
                $data['id_jenis_dokumen'] = $jenis;
                $this->dokumen->insert_dokumen($data);
                $this->response(
                    array(
                        "status" => "success",
                        "message" => "dokumen berhasil ditambahkan",
                        "data" => array($data),
                    ),
                    RestController::HTTP_CREATED
                );
            }
        }
    }

    public function jenis_post()
    {
        $jenis = $this->post('jenisdokumen');
        $kode = $this->post('kodejenisdokumen');
        $data['kode_jenis_dokumen'] = $kode;
        $data['jenis_dokumen'] = $jenis;
        $this->dokumen->insert_jenis($data);
        $this->response(
            array(
                "status" => "success",
                "message" => "jenis berhasil ditambahkan",
                "data" => array($data),
            ),
            RestController::HTTP_CREATED
        );
    }

    public function jenis_get()
    {
        $jenis = $this->dokumen->get_jenis();
        if ($jenis) {
            $this->response(
                $jenis,
                RestController::HTTP_OK
            );
        }
    }
}