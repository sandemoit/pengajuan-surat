<?php

class Mahasiswa_model extends CI_Model
{
    function search_nim($nim)
    {
        $this->db->like('nim', $nim, 'both');
        $this->db->order_by('nim', 'ASC');
        $this->db->limit(10);
        return $this->db->get('mahasiswa')->result();
    }

    public function cek_mahasiswa($nim)
    {
        return $this->db->get_where('mahasiswa', array('nim' => $nim));
    }
}
