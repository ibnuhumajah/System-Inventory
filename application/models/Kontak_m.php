<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak_m extends CI_Model
{

    public function get($id = null)
    {

        $this->db->from('tb_kontak');
        if ($id != null) {
            $this->db->where('kontak_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'nama_kontak' => $post['fullname'],
            'nomor_kontak' => $post['phone'],
            'whatsapp' => $post['wa'],
            'address' => $post['addr'],
        ];

        $this->db->insert('tb_kontak', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama_kontak' => $post['fullname'],
            'nomor_kontak' => $post['phone'],
            'whatsapp' => $post['wa'],
            'address' => $post['addr'],
        ];
        $this->db->where('kontak_id', $post['kontak_id']);
        $this->db->update('tb_kontak', $params);
    }

    public function del($id)
    {
        $this->db->where('kontak_id', $id);
        $this->db->delete('tb_kontak');
    }
}
