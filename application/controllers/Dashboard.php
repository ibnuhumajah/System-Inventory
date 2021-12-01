<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->helper('indo_currency');
		$this->load->model('penjualan_m');
	}

	public function index()
	{
		$data['row'] = $this->penjualan_m->get();
		$this->template->load('template', 'dashboard', $data);
	}
}
