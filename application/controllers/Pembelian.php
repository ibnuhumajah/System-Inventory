<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->helper('redirect');
        $this->load->helper('indo_currency');
        $this->load->library('form_validation');
        $this->load->model('pembelian_m', 'model');
    }

    public function index()
    {
        $this->template->load('template', 'pembelian/pembelian_form');
    }

    public function hasil()
    {
        $data['row'] = $this->model->get();
        $this->template->load('template', 'pembelian/pembelian_data', $data);
    }

    public function add()
    {
        $this->form_validation->set_message('required', '%s masih kosong, silakan isi');

        if ($this->form_validation->run() == FALSE) {
            $this->input->post(null, TRUE);
            $this->model->add();
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('pembelian/hasil');
        } else {
            if ($this->db->trans_status() == FALSE) {
                echo "<script>alert('Data Gagal Disimpan');
                 window.location='" . site_url('pembelian') . "';</script>";
            }
        }
    }

    public function view($id)
    {
        $pembelian = $this->model->pembelian($id);
        $data['row'] = $pembelian;
        $this->template->load('template', 'pembelian/pembelian_detail', $data);
    }

    public function del_pembeli($id)
    {
        $this->model->del_pembeli($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('pembelian/hasil');
    }

    public function del_pembelian($id)
    {
        $this->model->del_pembelian($id);
        if ($this->db->affected_rows() > 0) {
            redirect($this->uri->uri_string());
        }
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect_back();
    }

    // edit
    public function ubah($id)
    {
        $data['row'] = $this->model->getEdit($id);
        $this->template->load('template', 'pembelian/pembelian_edit', $data);
    }

    public function ubahdata()
    {
        $post = $this->input->post(null, TRUE);
        $this->model->ubah($post);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil diubah');
        } else {
            $this->session->set_flashdata('success', 'Data berhasil diubah');
            redirect('pembelian/hasil');
        }
    }

    // end edit

    public function pdf($id)
    {
        $this->load->library('pdfgen');

        $data['row'] = $this->model->pembelian($id);
        $this->pdfgen->generate('laporan/laporan_pembelian', $data);
    }

    public function pdf2($id)
    {
        $this->load->library('pdfgen');

        $data['row'] = $this->model->pembelian($id);
        $this->pdfgen->generate4('laporan/laporan_pembelian', $data);
    }

    public function excel()
    {
        $pembeli = $this->model->get()->result();
        require(APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $objPHPExcel = new PHPExcel();

        $objPHPExcel->getProperties()->setCreator("Mutiara Botol");
        $objPHPExcel->getProperties()->setLastModifiedBy("Mutiara Botol");
        $objPHPExcel->getProperties()->setTitle("Data Pembelian");
        // $objPHPExcel->getProperties()->setSubject("");
        // $objPHPExcel->getProperties()->setDescription("");

        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setTitle("Data Pembelian");
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(17);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'No.');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Nama Pembeli');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Tanggal');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Total Pembayaran');
        // $styles = array('widths' => [3, 20, 30, 40]);
        $baris = 2;
        $x = 1;
        foreach ($pembeli as $data) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $baris, $x);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $baris, ucwords($data->nama_pembeli));
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $baris, indo_date($data->tanggal_pembeli));
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $baris, $data->harga_total_pembeli);
            $x++;
            $baris++;
        }


        $filename = "Data-Pembelian" . date("d-m-Y-H-i-s") . ".xlsx";

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $writer->save('php://output');
        exit;
    }
}
