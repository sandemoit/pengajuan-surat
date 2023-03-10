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

    public function findById($id)
    {
        $query = $this->db->get_where('pengajuan_surat', ['id' => $id])->row_array();
        return $query;
    }

    public function showById($id)
    {
        $this->db->select('*');
        $this->db->join('mahasiswa', 'mahasiswa.nim=pengajuan_surat.NIM');
        $query = $this->db->get('pengajuan_surat', ['id' => $id])->row_array();
        return $query;
    }
}
