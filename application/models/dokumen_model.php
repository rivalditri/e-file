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
        $query = $this->db->select('dk.id_dokumen, dk.nama_dokumen, jk.jenis_dokumen, k.nip, k.nama_karyawan, k.kode_jabatan, k.jabatan')
            ->from('dokumen AS dk')
            ->join('penyimpanan AS py', 'dk.id_dokumen = py.id_dokumen')
            ->join('jenis_dokumen AS jk', '(dk.id_jenis_dokumen = jk.id_jenis_dokumen)')
            ->join('karyawan AS k', '(py.id_karyawan = k.id_karyawan)')->get();
        return $query->result_array();
    }

    public function get_jenis()
    {
        $query = $this->db->select('*')
            ->from('jenis_dokumen')
            ->get();
        return $query->result_array();
    }

    public function get_dokumenIdentitas()
    {
        $query = $this->db->select('dk.nama_dokumen, jk.jenis_dokumen, k.nip, k.nama_karyawan, k.kode_jabatan, k.jabatan')
            ->from('dokumen AS dk')
            ->join('penyimpanan AS py', 'dk.id_dokumen = py.id_dokumen')
            ->join('jenis_dokumen AS jk', '(dk.id_jenis_dokumen = jk.id_jenis_dokumen)')
            ->join('karyawan AS k', '(py.id_karyawan = k.id_karyawan)')
            ->where('jk.id_jenis_dokumen', 4)
            ->get();
        return $query->result_array();
    }

    public function get_dokumenSK()
    {
        $query = $this->db->select('dk.nama_dokumen, jk.jenis_dokumen, k.nip, k.nama_karyawan, k.kode_jabatan, k.jabatan')
            ->from('dokumen AS dk')
            ->join('penyimpanan AS py', 'dk.id_dokumen = py.id_dokumen')
            ->join('jenis_dokumen AS jk', '(dk.id_jenis_dokumen = jk.id_jenis_dokumen)')
            ->join('karyawan AS k', '(py.id_karyawan = k.id_karyawan)')
            ->where('jk.id_jenis_dokumen', 1)
            ->get();
        return $query->result_array();
    }
    public function get_dokumenIjazah()
    {
        $query = $this->db->select('dk.nama_dokumen, jk.jenis_dokumen, k.nip, k.nama_karyawan, k.kode_jabatan, k.jabatan')
            ->from('dokumen AS dk')
            ->join('penyimpanan AS py', 'dk.id_dokumen = py.id_dokumen')
            ->join('jenis_dokumen AS jk', '(dk.id_jenis_dokumen = jk.id_jenis_dokumen)')
            ->join('karyawan AS k', '(py.id_karyawan = k.id_karyawan)')
            ->where('jk.id_jenis_dokumen', 2)
            ->get();
        return $query->result_array();
    }

    public function get_dokumenSertifikat()
    {
        $query = $this->db->select('dk.nama_dokumen, jk.jenis_dokumen, k.nip, k.nama_karyawan, k.kode_jabatan, k.jabatan')
            ->from('dokumen AS dk')
            ->join('penyimpanan AS py', 'dk.id_dokumen = py.id_dokumen')
            ->join('jenis_dokumen AS jk', '(dk.id_jenis_dokumen = jk.id_jenis_dokumen)')
            ->join('karyawan AS k', '(py.id_karyawan = k.id_karyawan)')
            ->where('jk.id_jenis_dokumen', 3)
            ->get();
        return $query->result_array();
    }

    public function get_dokumenByNip($nip)
    {
        $query = $this->db->select('dk.nama_dokumen, jk.jenis_dokumen, k.nip, k.nama_karyawan, k.kode_jabatan, k.jabatan')
            ->from('dokumen AS dk')
            ->join('penyimpanan AS py', 'dk.id_dokumen = py.id_dokumen')
            ->join('jenis_dokumen AS jk', '(dk.id_jenis_dokumen = jk.id_jenis_dokumen)')
            ->join('karyawan AS k', '(py.id_karyawan = k.id_karyawan)')
            ->where('k.nip', $nip)->get();
        return $query->result_array();
    }

    public function get_dokumenByJenisDokumen($jenis_dokumen)
    {
        $query = $this->db->select('dk.nama_dokumen, jk.jenis_dokumen, k.nip, k.nama_karyawan, k.kode_jabatan, k.jabatan')
            ->from('dokumen AS dk')
            ->join('penyimpanan AS py', 'dk.id_dokumen = py.id_dokumen')
            ->join('jenis_dokumen AS jk', '(dk.id_jenis_dokumen = jk.id_jenis_dokumen)')
            ->join('karyawan AS k', '(py.id_karyawan = k.id_karyawan)')
            ->where('jk.jenis_dokumen', $jenis_dokumen)->get();
        return $query->result_array();
    }

    public function get_dokumenByNamaDokumen($nama_dokumen)
    {
        $query = $this->db->select('dk.nama_dokumen, jk.jenis_dokumen, k.nip, k.nama_karyawan, k.kode_jabatan, k.jabatan')
            ->from('dokumen AS dk')
            ->join('penyimpanan AS py', 'dk.id_dokumen = py.id_dokumen')
            ->join('jenis_dokumen AS jk', '(dk.id_jenis_dokumen = jk.id_jenis_dokumen)')
            ->join('karyawan AS k', '(py.id_karyawan = k.id_karyawan)')
            ->where('dk.nama_dokumen', $nama_dokumen)->get();
        return $query->result_array();
    }

    public function get_dokumenByNamaKaryawan($nama_karyawan)
    {
        $query = $this->db->select('dk.nama_dokumen, jk.jenis_dokumen, k.nip, k.nama_karyawan, k.kode_jabatan, k.jabatan')
            ->from('dokumen AS dk')
            ->join('penyimpanan AS py', 'dk.id_dokumen = py.id_dokumen')
            ->join('jenis_dokumen AS jk', '(dk.id_jenis_dokumen = jk.id_jenis_dokumen)')
            ->join('karyawan AS k', '(py.id_karyawan = k.id_karyawan)')
            ->where('k.nama_karyawan', $nama_karyawan)->get();
        return $query->result_array();
    }

    public function insert_dokumen($data)
    {
        //inisialisasi data dokumen
        $dokumen = array(
            'id_jenis_dokumen' => $data['id_jenis_dokumen'],
            'nama_dokumen' => $data['nama_dokumen'],
            'path' => $data['path'],
        );
        //insert data dokumen
        $this->db->insert('dokumen', $dokumen);
        //get id dokumen
        $id_dokumen = $this->db->insert_id();
        //inisialisasi data penyimpanan
        $penyimpanan = array(
            'id_dokumen' => $id_dokumen,
            'id_karyawan' => $data['id_karyawan'],
        );
        //insert data penyimpanan
        return $this->db->insert('penyimpanan', $penyimpanan);
    }
    public function insert_jenis($data)
    {
        $jenis = array(
            'kode_jenis_dokumen' => $data['kode_jenis_dokumen'],
            'jenis_dokumen' => $data['jenis_dokumen'],
        );
        return $this->db->insert('jenis_dokumen', $jenis);
    }


}