<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_user()
    {
        $query = $this->db->get('user');
        return $query->result_array();
    }

    public function get_user_by_id($id)
    {
        $query = $this->db->get_where('user', ['id' => $id]);
        return $query->row_array();
    }

    public function get_user_by_nip($nip)
    {
        $query = $this->db->get_where('user', ['nip' => $nip]);
        return $query->row_array();
    }

    public function get_user_by_role($role)
    {
        $query = $this->db->get_where('user', ['role_id' => $role]);
        return $query->result_array();
    }

    public function create_user()
    {
        $data = [
            'nip' => htmlspecialchars($this->input->post('nip', true)),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'role_id' => $this->input->post('role', true),
            'password' => md5($this->input->post('password1')),
        ];
        $this->db->insert('user', $data);
    }

    public function update_user($id)
    {
        $data = [
            'nip' => htmlspecialchars($this->input->post('nip', true)),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'role_id' => $this->input->post('role', true),
            'password' => md5($this->input->post('password1')),
        ];
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }

    public function delete_user($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }



}