<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('kontak_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['row'] = $this->kontak_m->get();
        $this->template->load('template', 'kontak/kontak_data', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('fullname', 'Nama', 'required');
        $this->form_validation->set_rules('phone', 'Telepon', 'required|min_length[10]');
        $this->form_validation->set_rules('wa', 'Wa');
        $this->form_validation->set_rules('addr', 'Addr', 'required');

        $this->form_validation->set_message('required', '%s masih kosong, silakan isi');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'kontak/kontak_form');
        } else {
            $post = $this->input->post(null, TRUE);
            $this->kontak_m->add($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
            }
            redirect('kontak');
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('fullname', 'Nama');
        $this->form_validation->set_rules('phone', 'Telepon', 'min_length[10]');
        $this->form_validation->set_rules('wa', 'Wa');
        $this->form_validation->set_rules('addr', 'Addr');

        $this->form_validation->set_message('required', '%s masih kosong, silakan isi');

        if ($this->form_validation->run() == FALSE) {
            $query = $this->kontak_m->get($id);
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $this->template->load('template', 'kontak/kontak_edit', $data);
            } else {
                echo "<script>alert('Data tidak Ditemukan');</script>";
                echo "<script> window.location='" . site_url('kontak') . "';</script>";
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->kontak_m->edit($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data berhasil diupdate');
            }
            redirect('kontak');
        }
    }

    public function del($id)
    {
        $this->kontak_m->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('kontak');
    }

    public function excel()
    {
        $kontak = $this->kontak_m->get()->result();
        require(APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $objPHPExcel = new PHPExcel();

        $objPHPExcel->getProperties()->setCreator("Mutiara Botol");
        $objPHPExcel->getProperties()->setLastModifiedBy("Mutiara Botol");
        $objPHPExcel->getProperties()->setTitle("Data Kontak");
        // $objPHPExcel->getProperties()->setSubject("");
        // $objPHPExcel->getProperties()->setDescription("");

        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(17);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'No.');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Nama Kontak');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Nomor Kontak');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Nomor Whatsapp');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Alamat');
        // $styles = array('widths' => [3, 20, 30, 40]);
        $baris = 2;
        $x = 1;
        foreach ($kontak as $data) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $baris, $x);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $baris, ucwords($data->nama_kontak));
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $baris, $data->nomor_kontak);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $baris, $data->whatsapp);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $baris, ucwords($data->address));
            $x++;
            $baris++;
        }


        $filename = "Data-Kontak" . date("d-m-Y-H-i-s") . ".xlsx";

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $writer->save('php://output');
        exit;
    }
}
