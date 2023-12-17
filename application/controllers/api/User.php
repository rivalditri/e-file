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

    public function index_get()
    {
        $user = $this->user->get_user();
        if ($user) {
            $this->response(
                $user,
                RestController::HTTP_OK
            );
        } else {
            $this->response([
                'status' => false,
                'message' => 'Data tidak ditemukan',
            ], RestController::HTTP_NOT_FOUND);
        }
    }

    public function index_post()
    {
        $nip = $this->post('nip');
        $nama = $this->post('nama');
        $pw = $this->post('password1');
        $role_id = $this->post('role_id');

        if (!$nip || !$nama || !$pw || !$role_id) {
            $this->response([
                'status' => false,
                'message' => 'Data gagal ditambahkan',
                'error' => 'Data tidak boleh kosong',
            ], RestController::HTTP_BAD_REQUEST);
        } else {
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
                    'status' => 'success',
                    'message' => 'Data berhasil ditambahkan',
                    'data' => $data,
                ], RestController::HTTP_CREATED);
            } else {
                $this->response(
                    array(
                        'status' => 'error',
                        'message' => 'Data gagal ditambahkan',
                        'error' => 'something went wrong',
                    )
                    , RestController::HTTP_BAD_REQUEST
                );
            }
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
        // if (!$nip) {
        //     $this->response([
        //         'status' => false,
        //         'message' => 'Data gagal dihapus',
        //         'error' => 'nip tidak boleh kosong',
        //     ], RestController::HTTP_BAD_REQUEST);
        // } else if ($this->db->get_where('user', ['nip' => $nip])->row_array() == null) {
        //     $this->response([
        //         'status' => false,
        //         'message' => 'Data gagal dihapus',
        //         'error' => 'nip tidak ditemukan',
        //     ], RestController::HTTP_BAD_REQUEST);
        // } else {
            $data = $this->db->get_where('user', ['nip' => $nip])->row_array();
            $row = $this->user->deleteUser($nip);
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
    // }

    // public function delete($nip) {
    //     // Lakukan penghapusan data dalam model
    //     $result = $this->user_model->deleteUser($nip);
    //     $data = array();

    //     // Berikan respons JSON
    //     if ($result) {
    //         $response['status'] = 'success';

    //         // Ambil data yang ingin Anda tampilkan dan tambahkan ke dalam array $data
    //         $data['message'] = 'Data berhasil dihapus.';
    //         $data['deleted_nip'] = $nip;

    //         // Jika Anda ingin mengambil data lain, lakukan pengambilan di sini

    //     } else {
    //         $response['status'] = 'error';
    //         $data['message'] = 'Terjadi kesalahan saat menghapus data.';
    //     }

    //     // Gabungkan data dengan respons JSON
    //     $response['data'] = $data;

    //     // Keluarkan respons JSON
    //     echo json_encode($response);
    // }
}