<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once('assets/dompdf/autoload.inc.php');

use Dompdf\Dompdf;

class Pdfgen
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    public function generate(
        $view,
        $data = array(),
        $filename = 'laporan_pembelian',
        $paper = array(0, 0, 467.7165, 595.2756),
        $orientation = 'landscape'
    ) {
        $dompdf = new Dompdf();
        $html = $this->ci->load->view($view, $data, TRUE);
        $dompdf->loadhtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        $dompdf->stream($filename .  ".pdf", array('Attachment' => FALSE));
    }

    public function generate2(
        $view,
        $data = array(),
        $filename = 'laporan_penjualan',
        $paper = array(0, 0, 467.7165, 595.2756),
        $orientation = 'landscape'
    ) {
        $dompdf = new Dompdf();
        $html = $this->ci->load->view($view, $data, TRUE);
        $dompdf->loadhtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        $dompdf->stream($filename . ".pdf", array('Attachment' => FALSE));
    }

    // public function generate2(
    //     $html,
    //     $filename,
    //     $paper,
    //     $orientation
    // ) {
    //     $dompdf = new Dompdf();
    //     $dompdf->loadhtml($html);
    //     $dompdf->setPaper($paper, $orientation);
    //     $dompdf->render();
    //     $dompdf->stream($filename, array('Attachment' => 0));
    // }

    public function generate3(
        $view,
        $data = array(),
        $filename = 'laporan_penjualan',
        $paper = array(0, 0, 467.7165, 595.2756),
        $orientation = 'potrait'
    ) {
        $dompdf = new Dompdf();
        $html = $this->ci->load->view($view, $data, TRUE);
        $dompdf->loadhtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        $dompdf->stream($filename . ".pdf", array('Attachment' => FALSE));
    }

    public function generate4(
        $view,
        $data = array(),
        $filename = 'laporan_pembelian',
        $paper = array(0, 0, 467.7165, 595.2756),
        $orientation = 'potrait'
    ) {
        $dompdf = new Dompdf();
        $html = $this->ci->load->view($view, $data, TRUE);
        $dompdf->loadhtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        $dompdf->stream($filename . ".pdf", array('Attachment' => FALSE));
    }
}
