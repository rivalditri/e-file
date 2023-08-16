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

    public function create_user($data)
    {
        $existing_data = $this->db->get_where('user', ['nip' => $data['nip']])->row();
        if (!$existing_data) {
            // Data is unique, proceed with insert
            return $this->db->insert('user', $data);
        } else {
            $error = array('error_message' => 'NIP sudah terdaftar');
            return $error;
        }
    }

    public function update_user($data, $nip)
    {
        $this->db->where('nip', $nip);
        return $this->db->update('user', $data);
    }

    public function delete_user($nip)
    {
        $this->db->where('nip', $nip);
        return $this->db->delete('user');
    }



}