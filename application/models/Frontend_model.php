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
        $query = 'SELECT * FROM pengajuan_surat';

        return $this->db->query($query)->row_array();
    }
}
