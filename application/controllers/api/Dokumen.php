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
        $data = null;
        $dokumen = $this->input->get('nama_dokumen');
        $jenis = $this->input->get('jenis_dokumen');
        $karyawan = $this->input->get('nama_karyawan');
        if ($dokumen) {
            $data = $this->dokumen->get_dokumenByNamaDokumen($dokumen);
        } else if ($jenis) {
            $data = $this->dokumen->get_dokumenByJenisDokumen($jenis);
        } else if ($karyawan) {
            $data = $this->dokumen->get_dokumenByNamaKaryawan($karyawan);
        } else {
            $data = $this->dokumen->get_dokumen();
        }
        if ($data) {
            $this->response(
                $data,
                RestController::HTTP_OK
            );
        } else {
            $this->response(
                array(
                    "status" => "error",
                    "message" => "data dokumen tidak ditemukan",
                ),
                RestController::HTTP_NOT_FOUND
            );
        }
    }
    public function index_post()
    {
        $id = $this->post('id_karyawan');
        $jenis = $this->post('jenis');
        if (!$id) {
            $this->response(
                array(
                    "status" => "error",
                    "message" => "Nama Tidak Ditemukan"
                ),
                RestController::HTTP_BAD_REQUEST
            );
        } else if (!$jenis) {
            $this->response(
                array(
                    "status" => "error",
                    "message" => "Jenis Dokumen Tidak Ditemukan"
                ),
                RestController::HTTP_BAD_REQUEST
            );
        } else {
            $config['upload_path'] = './uploads/';
            $config['max_size'] = 10000;
            $this->load->library('upload', $config);
            $this->upload->set_allowed_types('*');
            if (!$this->upload->do_upload('file')) {
                $error = $this->upload->display_errors();
                $this->response(
                    array(
                        "status" => "error",
                        "message" => "Dokumen Gagal Ditambahkan",
                        "error" => $error,
                    ),
                    RestController::HTTP_BAD_REQUEST
                );
            } else {
                $uploaded_data = $this->upload->data();
                $data['nama_dokumen'] = $uploaded_data['file_name'];
                $data['path'] = 'uploads/' . $uploaded_data['file_name'];
                $data['id_karyawan'] = $id;
                $data['id_jenis_dokumen'] = $jenis;
                $this->dokumen->insert_dokumen($data);
                $this->response(
                    array(
                        "status" => "success",
                        "message" => "Dokumen Berhasil Ditambahkan",
                        "data" => array($data),
                    ),
                    RestController::HTTP_CREATED
                );
            }
        }
    }
    public function index_delete()
    {
        $id_dokumen = $this->input->get('id_dokumen');
        $data = $this->db->get_where('dokumen', ['id_dokumen' => $id_dokumen])->row_array();
        $path = $data['path'];
        if ($this->db->get_where('dokumen', ['id_dokumen' => $id_dokumen])->row_array() == null) {
            $this->response(
                array(
                    "status" => "error",
                    "title" => "Dokumen Gagal Dihapus",
                    "message" => "dokumen tidak ditemukan",
                ),
                RestController::HTTP_BAD_REQUEST
            );
        } else {
            $result = $this->dokumen->delete_dokumen($id_dokumen);
            unlink($path);
            if ($result) {
                $this->response(
                    array(
                        "status" => "success",
                        "title" => "Dokumen Berhasil Dihapus",
                        "message" => "dokumen " . $data['nama_dokumen'] . " berhasil dihapus",
                    ),
                    RestController::HTTP_OK
                );
            } else {
                $this->response(
                    array(
                        "status" => "error",
                        "title" => "Dokumen Gagal Dihapus",
                        "message" => "something went wrong",
                    ),
                    RestController::HTTP_INTERNAL_ERROR
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
        $result = $this->dokumen->insert_jenis($data);
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
    public function jenis_delete()
    {
        $jenis_dokumen = $this->input->get('jenis_dokumen');
        if (!$jenis_dokumen) {
            $this->response([
                'status' => false,
                'message' => 'Data gagal dihapus',
                'error' => 'jenis tidak boleh kosong',
            ], RestController::HTTP_BAD_REQUEST);
        } else if ($this->db->get_where('jenis_dokumen', ['jenis_dokumen' => $jenis_dokumen])->row_array() == null) {
            $this->response([
                'status' => false,
                'message' => 'Data gagal dihapus',
                'error' => 'jenis tidak ditemukan',
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            $data = $this->db->get_where('jenis_dokumen', ['jenis_dokumen' => $jenis_dokumen])->row_array();
            $row = $this->jenis_dokumen->delete_jenis($jenis_dokumen);
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
}