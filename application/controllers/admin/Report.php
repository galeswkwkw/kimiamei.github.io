<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('level') != '1') {
			redirect('welcome');
		}
	}

	
	public function pdf($id_invoice)
	{
		$data['title'] = 'Invoice';
		$data['invoice'] = $this->model_invoice->get_id_invoice($id_invoice);
		$data['pesanan'] = $this->model_invoice->get_id_pesanan($id_invoice);
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "Invoice Bill.pdf";
		$this->pdf->load_view('admin/payment/pdf', $data);
	}

	public function reportproduct()
	{
		$data['title'] = 'Laporan Data Produk';
		$data['product'] = $this->model_pembayaran->get('product')->result();
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "Laporan Data Produk.pdf";
		$this->pdf->load_view('admin/report/reportdataproduk', $data);
	}
	public function reportinvoice()
	{
		$data['title'] = 'Laporan Penjualan';
		$data['invoice'] = $this->model_invoice->get();
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "Laporan Data Penjualan.pdf";
		$this->pdf->load_view('admin/report/reportpenjualan', $data);
	}
	public function reportpelanggan()
	{
		$data['title'] = 'Laporan Data Pelanggan';
		$data['invoice'] = $this->model_invoice->get();
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "Laporan Data Pelanggan.pdf";
		$this->pdf->load_view('admin/report/reportpelanggan', $data);
	}
}
