<?php

class Karyawan_model extends CI_Model
{
    // function search_nim($nim)
    // {
    //     $this->db->like('nim', $nim, 'both');
    //     $this->db->order_by('nim', 'ASC');
    //     $this->db->limit(10);
    //     return $this->db->get('karyawan')->result();
    // }

    public function cek_karyawan($nosurat)
    {
        return $this->db->get_where('karyawan', array('nosurat' => $nosurat));
    }
}
