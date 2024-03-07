<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tabeldata extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('level') != '1') {
			redirect('welcome');
		}
	}

	public function search()
	{
		$key = $this->input->post('keyword');



		$data['title'] = 'Data Pelanggan';
		if (!empty($key)) {
			// Perform search if keyword is provided
			$data['invoice'] = $this->db->query("SELECT * FROM transaction WHERE name LIKE '%$key%'")->result();
		} else {
			// Fetch all products if no keyword is provided
			$data['invoice'] = $this->model_invoice->get();
		}
		$this->load->view('layout/admin/header', $data);
		$this->load->view('admin/tabeldata/view', $data);
		$this->load->view('layout/admin/footer');
	}
	public function index()
	{
		$data['title'] = 'Data Pelanggan';
		$data['invoice'] = $this->model_invoice->get();
		$this->load->view('layout/admin/header', $data);
		$this->load->view('admin/tabeldata/view', $data);
		$this->load->view('layout/admin/footer');
	}

	public function detail($id_invoice)
	{
		$data['title'] = 'Detail Checkout';
		$data['invoice'] = $this->model_invoice->get_id_invoice($id_invoice);
		$data['pesanan'] = $this->model_invoice->get_id_pesanan($id_invoice);
		$this->load->view('layout/admin/header', $data);
		$this->load->view('admin/tabeldata/view', $data);
		$this->load->view('layout/admin/footer');
	}

	
}
