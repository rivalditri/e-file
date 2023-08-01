<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dokumen_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_dokumen()
    {
        $query = $this->db->select('*')->from('dokumen')->join('jenis_dokumen', 'jenis_dokumen.id_jenis_dokumen = dokumen.id_jenis_dokumen')->get();
        return $query->result_array();
    }
}