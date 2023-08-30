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
        $nip = $this->input->get('filterNIP');
        $nama = $this->input->get('filterNama');
        if ($nip) {
            $karyawan = $this->karyawan->get_karyawan_by_nip($nip);
        } else if ($nama) {
            $karyawan = $this->karyawan->get_karyawan_by_nama($nama);
        } else {
            $karyawan = $this->karyawan->get_karyawan();
        }
        if ($karyawan) {
            $this->response(
                $karyawan,
                RestController::HTTP_OK
            );
        } else {
            $this->response(
                array(
                    "status" => "error",
                    "message" => "data karyawan tidak ditemukan",
                ),
                RestController::HTTP_NOT_FOUND
            );
        }
    }

    //api/karyawan/edit
    //method post
    public function edit_post(){
        $id = $this->post('id');
        $nip = $this->post('nip');
        $nama_karyawan = $this->post('nama_karyawan');
        $kode_jabatan = $this->post('kode_jabatan');
        $jabatan = $this->post('jabatan');

        $data = [
            'id' =>$id,
            'nip' =>$nip,
            'nama_karyawan' => $nama_karyawan,
            'kode_jabatan' => $kode_jabatan,
            'jabatan' => $jabatan,
        ];

        $this->karyawan->update_karyawan($data);

        if($this->db->affected_rows() > 0){
            $this->response(
                array(
                    'status' => 'success',
                    'message' => 'Data berhasil diubah',
                    'data' => $data,
                ),
                RestController::HTTP_OK
            );
        }else{
            $this->response(
                array(
                    'status' => 'error',
                    'message' => 'Data gagal diubah',
                    'data' => $data,
                ),
                RestController::HTTP_BAD_REQUEST
            );
        }
    }

    public function index_post()
    {
        $nip = $this->post('nip');
        $nama = $this->post('nama_karyawan');
        $kode_jabatan = $this->post('kode_jabatan');
        $jabatan = $this->post('jabatan');

        if (!$nip || !$nama || !$kode_jabatan || !$jabatan) {
            $this->response(
                array(
                    "status" => "error",
                    "message" => "Data tidak boleh kosong",
                ),
                RestController::HTTP_BAD_REQUEST
            );
        } else {
            $data = [
                'nip' => $nip,
                'nama_karyawan' => $nama,
                'kode_jabatan' => $kode_jabatan,
                'jabatan' => $jabatan,
            ];
            $row = $this->karyawan->create_karyawan($data);
            if ($row === true) {
                $this->response(
                    array(
                        'status' => 'success',
                        'message' => 'Data berhasil ditambahkan',
                        'data' => $data,
                    ),
                    RestController::HTTP_CREATED
                );
            } else {
                $this->response(
                    array(
                        'status' => 'error',
                        'message' => 'Data gagal ditambahkan',
                        'error' => $row['error_message'],
                    ),
                    RestController::HTTP_BAD_REQUEST
                );
            }
        }

    }

    public function update_karyawan($data)
    {
        // $id = $data['id'];
        // $nip = $data['nip'];
        // $nama_karyawan = $data['nama_karyawan'];
        // $kode_jabatan = $data['kode_jabatan'];
        // $jabatan = $data['jabatan'];

        // $data_update[
        //     'nip' =>$nip,
        //     'nama_karyawan' => $nama_karyawan,
        //     'kode_jabatan' => $kode_jabatan,
        //     'jabatan' => $jabatan,
        // ];
        // $data = [
        //     // 'nip'=> htmlspecialchars($this->input->post('nip',true)),
        //     // 'nama'=> htmlspecialchars($this->input->post('nama',true)),
        //     // 'kode_jabatan'=> htmlspecialchars($this->input->post('kode_jabatan',true)),
        //     // 'jabatan'=> htmlspecialchars($this->input->post('jabatan',true)),
        // ];
        $this->db->where('id_karyawan',$data['id']);
        return $this->db->update('karyawan',$data);
    }

    public function index_delete()
    {
        $id_karyawan = $this->input->get('id_karyawan');
        if ($this->db->get_where('karyawan', ['id_karyawan' => $id_karyawan])->row_array() == null) {
            $this->response([
                'status' => 'error',
                'message' => 'Data gagal dihapus',
                'error' => 'karyawan tidak ditemukan',
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            $result = $this->karyawan->delete_karyawan($id_karyawan);
            if ($result) {
                $this->response(
                    array(
                        'status' => 'success',
                        'message' => 'Data berhasil dihapus',
                    )
                    , RestController::HTTP_OK
                );
            } else {
                $this->response(
                    array(
                        'status' => 'error',
                        'message' => 'Data gagal dihapus',
                    )
                    , RestController::HTTP_BAD_REQUEST
                );
            }
        }
    }
}