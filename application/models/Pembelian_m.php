<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('tb_pembeli');
        if ($id != null) {
            $this->db->where('id_pembeli', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function pembelian($id)
    {
        $this->db->select('*');
        $this->db->from('tb_pembelian');
        $this->db->join('tb_pembeli', 'tb_pembeli.id_pembeli = tb_pembelian.id_pembeli', 'left');
        $this->db->where('tb_pembeli.id_pembeli', $id);
        return $this->db->get()->result();
    }

    public function add()
    {
        $this->db->trans_start();
        $data  = array(
            'nama_pembeli' => $this->input->post('nama', true),
            'tanggal_pembeli' => $this->input->post('tanggal', true),
            'harga_total_pembeli' => $this->input->post('harga_total', true)
        );
        $this->db->insert('tb_pembeli', $data);

        $last_id = $this->db->insert_id();
        $nis = $_POST['nama_barang'];
        $nama = $_POST['total_satuan'];
        $telp = $_POST['harga_satuan'];
        $jenis = $_POST['jenis_satuan'];
        $alamat = $_POST['total_harga'];
        $result = array();
        $index = 0;
        foreach ($nis as $row) {
            $result[] = array(
                'id_pembeli' => $last_id,
                'beli_barang' => $row,
                'beli_total' => $nama[$index],
                'beli_satuan' => $telp[$index],
                'beli_jenis' => $jenis[$index],
                'beli_harga' => $alamat[$index],
            );
            $index++;
        }
        $this->db->insert_batch('tb_pembelian', $result);
        $this->db->trans_complete();
    }

    // edit
    public function getEdit($id)
    {
        $this->db->select('*');
        $this->db->from('tb_pembelian');
        $this->db->join('tb_pembeli', 'tb_pembeli.id_pembeli = tb_pembelian.id_pembeli', 'left');
        $this->db->where('tb_pembeli.id_pembeli', $id);
        return $this->db->get()->result();
    }

    public function ubah($post)
    {
        $this->db->trans_start();
        $data  = array(
            'nama_pembeli' => $post['nama'],
            'tanggal_pembeli' => $post['tanggal'],
            'harga_total_pembeli' => $post['harga_total']
        );
        $this->db->where('id_pembeli', $post['id_pembeli']);
        $this->db->update('tb_pembeli', $data);

        $id2 = $post['id_pembelian'];
        $nis = $post['nama_barang'];
        $nama = $post['total_satuan'];
        $telp = $post['harga_satuan'];
        $jenis = $post['jenis_satuan'];
        $alamat = $post['total_harga'];
        $result = array();
        for ($index = 0; $index < sizeof($id2); $index++) {
            $result[] = array(
                'id_pembelian' => $id2[$index],
                'beli_barang' => $nis[$index],
                'beli_total' => $nama[$index],
                'beli_satuan' => $telp[$index],
                'beli_jenis' => $jenis[$index],
                'beli_harga' => $alamat[$index],
            );
        }
        $this->db->update_batch('tb_pembelian', $result, 'id_pembelian');
        $this->db->trans_complete();
    }
    // end edit

    public function del_pembeli($id)
    {
        $this->db->where('id_pembeli', $id);
        $this->db->delete('tb_pembeli');
    }

    public function del_pembelian($id)
    {
        $this->db->where('id_pembelian', $id);
        $this->db->delete('tb_pembelian');
    }
}
