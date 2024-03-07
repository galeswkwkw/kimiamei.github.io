<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('level') != '2') {
			redirect('welcome');
		}
	}


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
		$this->load->view('layout/user/header', $data);
		$this->load->view('dashboard', $data);
		$this->load->view('layout/user/footer');
	}

	public function index()
	{
		$data['title'] = 'Dashboard User';
		$data['product'] = $this->model_pembayaran->get('product')->result();
		$this->load->view('layout/user/header', $data);
		$this->load->view('dashboard', $data);
		$this->load->view('layout/user/footer');
	}

	public function cart($id)
	{
		$product = $this->model_pembayaran->find($id);

		$data = array(
			'id'      => $product->id_brg,
			'qty'     => 1,
			'price'   => $product->harga,
			'name'    => $product->nama_brg,
			'options' => array(
				'keterangan' => $product->keterangan,
				'kategori' => $product->kategori,
				'gambar' => $product->gambar
			)
		);

		$this->cart->insert($data);
		$_SESSION["sukses"] = 'Pesanan telah disimpan di keranjang';
		redirect('dashboard');
	}

	public function detail_cart()
	{
		$data['title'] = 'Detail Cart';
		$this->load->view('layout/user/header', $data);
		$this->load->view('cart', $data);
		$this->load->view('layout/user/footer');
	}
public $api_key = '5c31cf8a3e31ebe3c3d075535de93023';
public function checkout()
{
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: 5c31cf8a3e31ebe3c3d075535de93023"
        ),
        CURLOPT_SSL_VERIFYPEER => true, // Setel opsi ini ke true
        CURLOPT_CAINFO => "C:\\Users\\Kristiawan\\Downloads\\cacert.pem" // Tentukan jalur ke sertifikat root
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        //echo "cURL Error #:" . $err;
		$data['kota'] = array('error'=>true);
    } else {
        //echo $response;
		$data['kota'] = json_decode($response);
    }
	//print_r($data['kota']);


		$data['title'] = 'Checkout Product';
		$this->load->view('layout/user/header', $data);
		$this->load->view('checkout', $data);
		$this->load->view('layout/user/footer');
	}

	public function checkout_proccess()
	{
		$asal_kota = $this->input->post('asal');
		$tujuan_kota = $this->input->post('tujuan');
		$berat = $this->input->post('berat');
		$ekspedisi = $this->input->post('ekspedisi');
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "origin=399"."&destination=".$tujuan_kota."&weight=".$berat."&courier=".$ekspedisi,
			CURLOPT_HTTPHEADER => array(
				"content-type: application/x-www-form-urlencoded",
				"key: 5c31cf8a3e31ebe3c3d075535de93023"
			),
			CURLOPT_SSL_VERIFYPEER => true, // Setel opsi ini ke true
			CURLOPT_CAINFO => "C:\\Users\\Kristiawan\\Downloads\\cacert.pem" // Tentukan jalur ke sertifikat root
		));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
			//echo "cURL Error #:" . $err;
			$data['success_pay'] = array('error'=>true);
		} else {
			//echo $response;
			$data['success_pay'] = json_decode($response);
		}
		//print_r($data['success_pay']);
		$this->load->view('layout/user/header', $data);
		$this->load->view('success_pay',$data);
		
		$data['title'] = 'Payment Notification';
		$is_processed = $this->model_invoice->index();
		if ($is_processed) {
			$this->cart->destroy();
			
			
			$this->load->view('layout/user/footer');
		} else {
			echo "Maaf, Pesanan Anda Gagal Di Proses!";
		}
	}
	

	public function clear()
	{
		$this->cart->destroy();
		$_SESSION["sukses"] = 'Pesanan berhasil di hapus';
		redirect('dashboard');
	}
}
