<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->helper('redirect');
        $this->load->helper('indo_currency');
        $this->load->model('penjualan_m', 'model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->template->load('template', 'penjualan/penjualan_form');
    }

    public function hasil()
    {
        $data['row'] = $this->model->get();
        $this->template->load('template', 'penjualan/penjualan_data', $data);
    }

    public function view($id)
    {
        $data['row'] = $this->model->penjualan($id);
        $this->template->load('template', 'penjualan/penjualan_detail', $data);
    }

    public function add()
    {
        $this->form_validation->set_message('required', '%s masih kosong, silakan isi');

        if ($this->form_validation->run() == FALSE) {
            $this->input->post(null, TRUE);
            $this->model->add();
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('penjualan/hasil');
        } else {
            if ($this->db->trans_status() == FALSE) {
                echo "<script>alert('Data Gagal Disimpan');
                 window.location='" . site_url('penjualan') . "';</script>";
            }
        }
    }

    public function del_penjual($id)
    {
        $this->model->del_penjual($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('penjualan/hasil');
    }

    public function del_penjualan($id)
    {
        $this->model->del_penjualan($id);
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
        $this->template->load('template', 'penjualan/penjualan_edit', $data);
    }

    public function ubahdata()
    {
        $post = $this->input->post(null, TRUE);
        $this->model->ubah($post);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil diubah');
        } else {
            $this->session->set_flashdata('success', 'Data berhasil diubah');
            redirect('penjualan/hasil');
        }
    }

    // end edit

    public function pdf($id)
    {
        $this->load->library('pdfgen');

        $data['row'] = $this->model->penjualan($id);
        $this->pdfgen->generate2('laporan/laporan_penjualan', $data);
    }

    public function pdf2($id)
    {
        $this->load->library('pdfgen');

        $data['row'] = $this->model->penjualan($id);
        $this->pdfgen->generate3('laporan/laporan_penjualan', $data);
    }

    public function excel()
    {
        $penjual = $this->model->get()->result();
        require(APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $objPHPExcel = new PHPExcel();

        $objPHPExcel->getProperties()->setCreator("Mutiara Botol");
        $objPHPExcel->getProperties()->setLastModifiedBy("Mutiara Botol");
        $objPHPExcel->getProperties()->setTitle("Data Penjualan");
        // $objPHPExcel->getProperties()->setSubject("");
        // $objPHPExcel->getProperties()->setDescription("");

        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setTitle("Data Penjualan");
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(17);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'No.');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Nama Penjual');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Tanggal');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Total Pembayaran');
        // $styles = array('widths' => [3, 20, 30, 40]);
        $baris = 2;
        $x = 1;
        foreach ($penjual as $data) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $baris, $x);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $baris, ucwords($data->nama_penjual));
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $baris, indo_date($data->tanggal_penjual));
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $baris, $data->harga_total_penjual);
            $x++;
            $baris++;
        }


        $filename = "Data-Penjualan" . date("d-m-Y-H-i-s") . ".xlsx";

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $writer->save('php://output');
        exit;
    }
}
