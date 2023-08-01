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
        $query = $this->db->get('dokumen');
        return $query->result_array();
    }
}