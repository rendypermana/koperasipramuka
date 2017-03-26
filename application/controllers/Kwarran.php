<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* --------------------------------------------
Author : Rendy Permana
Email  : rendypermana153@gmail.com 
-----------------------------------------------*/

class Kwarran extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('group') != '1'){
			$this->session->set_flashdata('error','Maaf, anda belum login!');
			redirect('login');
		}

		//load model kwarran
		$this->load->model('model_kwarran');
		
	}

	//controller untuk menampilkan semua kwarran
	public function index()
	{
		$data['kwarrans'] = $this->model_kwarran->semua_kwarran();
		$this->load->view('admin/kwarran_index', $data);
	}

	//controller untuk tambah kwarran
	public function tambah()
	{
		$this->form_validation->set_rules('kwarran', 'Kwarran', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('admin/kwarran_tambah');	
		}else{
			$data_kwarran = array(
					'kwarran'	=> set_value('kwarran')
				);
				$this->model_kwarran->tambah_kwarran($data_kwarran);
				$this->session->set_flashdata('add','<div class="alert alert-success"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Data berhasil ditambah</div>');
				redirect('kwarran');		
		}
	}

	//controller untuk merubah kwarran
	public function ubah($id_kwarran)
	{
		$this->form_validation->set_rules('kwarran', 'Kwarran', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['kwarrans'] = $this->model_kwarran->find_id($id_kwarran);
			$this->load->view('admin/kwarran_edit', $data);
		 } else {
					$data_kwarran =	array(
						'kwarran'	=> set_value('kwarran')
					);
					$this->model_kwarran->rubah($id_kwarran, $data_kwarran);
					$this->session->set_flashdata('edit','<div class="alert alert-success"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Data berhasil diubah</div>');
					redirect('kwarran');
				
			}  
			
	}

	//controller untuk menghapus kwarran
	public function hapus($id_kwarran)
	{
		$this->model_kwarran->hapus($id_kwarran);
		$this->session->set_flashdata('delete','<div class="alert alert-success"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Data berhasil dihapus</div>');
		redirect('kwarran');
	}
}

