<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Frontend_model extends CI_Model
{
    public function insert_p_surat($data)
    {
        $query = $this->db->insert('pengajuan_surat', $data);
        if ($query) {
            return true;
            return $query;
        } else {
            return false;
        }
    }

    public function findByNoSurat($nosurat)
    {
        $query = $this->db->get_where('pengajuan_surat', ['nosurat' => $nosurat])->row_array();
        return $query;
    }

    public function showByNoSurat($nosurat)
    {
        $this->db->select('*');
        $this->db->join('karyawan', 'karyawan.nosurat=pengajuan_surat.NOSURAT');
        $query = $this->db->get('pengajuan_surat', ['nosurat' => $nosurat]);
        return $query->row_array();
    }
}
