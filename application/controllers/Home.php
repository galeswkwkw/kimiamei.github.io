<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function search()
	{
		$key = $this->input->post('keyword');



		$data['title'] = 'List Product';
		if (!empty($key)) {
			// Perform search if keyword is provided
			$data['product'] = $this->db->query("SELECT * FROM product WHERE nama_brg LIKE '%$key%'")->result();
		} else {
			// Fetch all products if no keyword is provided
			$data['product'] = $this->db->get('product')->result();
		}
		$this->load->view('layout/home/header', $data);
		$this->load->view('home', $data);
		$this->load->view('layout/home/footer');
	}
	public function index()
	{
		$data['title'] = 'Home';
		$data['product'] = $this->model_pembayaran->get('product')->result();
		$this->load->view('layout/home/header', $data);
		$this->load->view('home', $data);
		$this->load->view('layout/home/footer');
	}
}
