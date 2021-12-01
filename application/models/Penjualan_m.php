<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('tb_penjual');
        if ($id != null) {
            $this->db->where('id_penjual', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function penjualan($id)
    {
        $this->db->select('*');
        $this->db->from('tb_penjualan');
        $this->db->join('tb_penjual', 'tb_penjual.id_penjual = tb_penjualan.id_penjual', 'left');
        $this->db->where('tb_penjual.id_penjual', $id);
        return $this->db->get()->result();
    }

    public function add()
    {
        $this->db->trans_start();
        $data  = array(
            'nama_penjual' => $this->input->post('nama', true),
            'tanggal_penjual' => $this->input->post('tanggal', true),
            'harga_total_penjual' => $this->input->post('harga_total', true)
        );
        $this->db->insert('tb_penjual', $data);

        $last_id = $this->db->insert_id();
        $nama = $_POST['nama_barang'];
        $satuan = $_POST['total_satuan'];
        $harga = $_POST['harga_satuan'];
        $jenis = $_POST['jenis_satuan'];
        $total = $_POST['total_harga'];
        $result = array();
        $index = 0;
        foreach ($nama as $row) {
            $result[] = array(
                'id_penjual' => $last_id,
                'jual_barang' => $row,
                'jual_total' => $satuan[$index],
                'jual_satuan' => $harga[$index],
                'jual_jenis' => $jenis[$index],
                'jual_harga' => $total[$index],
            );
            $index++;
        }
        $this->db->insert_batch('tb_penjualan', $result);
        $this->db->trans_complete();
    }

    // edit
    public function getEdit($id)
    {
        $this->db->select('*');
        $this->db->from('tb_penjualan');
        $this->db->join('tb_penjual', 'tb_penjual.id_penjual = tb_penjualan.id_penjual', 'left');
        $this->db->where('tb_penjual.id_penjual', $id);
        return $this->db->get()->result();
    }

    public function ubah($post)
    {
        $this->db->trans_start();
        $data  = array(
            'nama_penjual' => $post['nama'],
            'tanggal_penjual' => $post['tanggal'],
            'harga_total_penjual' => $post['harga_total']
        );
        $this->db->where('id_penjual', $post['id_penjual']);
        $this->db->update('tb_penjual', $data);

        $id2 = $post['id_penjualan'];
        $nama = $post['nama_barang'];
        $satuan = $post['total_satuan'];
        $harga = $post['harga_satuan'];
        $jenis = $_POST['jenis_satuan'];
        $total = $post['total_harga'];
        $result = array();
        for ($index = 0; $index < sizeof($id2); $index++) {
            $result[] = array(
                'id_penjualan' => $id2[$index],
                'jual_barang' => $nama[$index],
                'jual_total' => $satuan[$index],
                'jual_satuan' => $harga[$index],
                'jual_jenis' => $jenis[$index],
                'jual_harga' => $total[$index],
            );
        }
        $this->db->update_batch('tb_penjualan', $result, 'id_penjualan');
        $this->db->trans_complete();
    }
    // end edit

    public function del_penjual($id)
    {
        $this->db->where('id_penjual', $id);
        $this->db->delete('tb_penjual');
    }

    public function del_penjualan($id)
    {
        $this->db->where('id_penjualan', $id);
        $this->db->delete('tb_penjualan');
    }
}
