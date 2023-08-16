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
        $query = $this->db->get_where('karyawan', ['nip' => $nip]);
        return $query->result_array();
    }

    public function get_karyawan_by_role($role)
    {
        $query = $this->db->get_where('karyawan', ['role_id' => $role]);
        return $query->result_array();
    }

    public function update_karyawan($id)
    {
        $data = [
            'nip' => htmlspecialchars($this->input->post('nip', true)),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'role_id' => $this->input->post('role', true),
            'password' => md5($this->input->post('password1')),
        ];
        $this->db->where('id', $id);
        $this->db->update('karyawan', $data);
    }

    public function delete_karyawan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('karyawan');
    }



}