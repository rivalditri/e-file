<?php
use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/RestController.php';

defined('BASEPATH') or exit('No direct script access allowed');

class user extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model', 'user');
    }

    public function index_post()
    {
        $nip = $this->post('nip');
        $nama = $this->post('nama');
        $pw = $this->post('password1');
        $role_id = $this->post('role_id');

        $password = md5($pw);
        $data = [
            'nip' => $nip,
            'nama' => $nama,
            'role_id' => $role_id,
            'password' => $password
        ];
        $row = $this->user->create_user($data);
        if ($row === true) {
            $this->response([
                'status' => true,
                'message' => 'Data berhasil ditambahkan',
                'data' => $data,
            ], RestController::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Data gagal ditambahkan',
                'error' => $row,
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function update_post()
    {
        $nip = $this->post('nip');
        $nama = $this->post('nama');
        $pw = $this->post('password1');
        $role_id = $this->post('role_id');

        $password = md5($pw);
        $data = [
            'nip' => $nip,
            'nama' => $nama,
            'role_id' => $role_id,
            'password' => $password
        ];
        if (!$nip || !$nama || !$pw || !$role_id) {
            $this->response([
                'status' => false,
                'message' => 'Data gagal diubah',
                'error' => 'Data tidak boleh kosong',
            ], RestController::HTTP_BAD_REQUEST);
        } else if ($this->db->get_where('user', ['nip' => $nip])->row_array() == null) {
            $this->response([
                'status' => false,
                'message' => 'Data gagal diubah',
                'error' => 'nip tidak ditemukan',
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            $row = $this->user->update_user($data, $nip);
            if ($row === true) {
                $this->response([
                    'status' => true,
                    'message' => 'Data berhasil diubah',
                    'data' => $data,
                ], RestController::HTTP_CREATED);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'Data gagal diubah',
                    'error' => $row,
                ], RestController::HTTP_BAD_REQUEST);
            }
        }
    }

    public function index_delete()
    {
        $nip = $this->input->get('nip');
        if (!$nip) {
            $this->response([
                'status' => false,
                'message' => 'Data gagal dihapus',
                'error' => 'nip tidak boleh kosong',
            ], RestController::HTTP_BAD_REQUEST);
        } else if ($this->db->get_where('user', ['nip' => $nip])->row_array() == null) {
            $this->response([
                'status' => false,
                'message' => 'Data gagal dihapus',
                'error' => 'nip tidak ditemukan',
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            $data = $this->db->get_where('user', ['nip' => $nip])->row_array();
            $row = $this->user->delete_user($nip);
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