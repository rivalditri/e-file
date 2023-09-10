<?php
defined('BASEPATH') or exit('No direct script access allowed');

class karyawan_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_karyawan()
    {
        $query = $this->db->get('karyawan');
        return $query->result_array();
    }

    public function get_karyawan_by_id($id)
    {
        $query = $this->db->get_where('karyawan', ['id' => $id]);
        return $query->result_array();
    }

    public function get_karyawan_by_nip($nip)
    {
        $this->db->like('nip', $nip, 'both');
        return $this->db->get('karyawan')->result_array();
    }

    public function get_karyawan_by_nama($nama)
    {
        $this->db->like('nama_karyawan', $nama, 'both');
        return $this->db->get('karyawan')->result_array();
    }

    public function update_karyawan($data)
    {
        $this->db->where('id_karyawan', $data['id_karyawan']);
        $this->db->update('karyawan', $data);
        return $this->db->affected_rows();
    }


    public function delete_karyawan($id)
    {
        $this->db->where('id_karyawan', $id);
        return $this->db->delete('karyawan');
    }

    public function create_karyawan($data)
    {
        $existing_data = $this->db->get_where('karyawan', ['nip' => $data['nip']])->row();
        if (!$existing_data) {
            // Data is unique, proceed with insert
            return $this->db->insert('karyawan', $data);
        } else {
            $error = array('error_message' => 'NIP sudah terdaftar');
            return $error;
        }
    }
}