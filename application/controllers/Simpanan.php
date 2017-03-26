<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* --------------------------------------------
Author : Rendy Permana
Email  : rendypermana153@gmail.com 
-----------------------------------------------*/

class Simpanan extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('group') != '1'){
			$this->session->set_flashdata('error','Maaf, anda belum login!');
			redirect('login');
		}

		//load model kwarran
		$this->load->model('model_simpanan');
		//load model users
		$this->load->model('model_users');
		//load model kwarran
		$this->load->model('model_kwarran');
	}

	//controller untuk menampilkan semua simpanan
	public function index()
	{
		$data['simpanan'] = $this->model_simpanan->semua_simpanan();
		$this->load->view('admin/simpanan_index', $data);
	}

	//controller untuk tambah simpanan
	public function tambah()
	{	
		$this->form_validation->set_rules('id_users', 'Anggota', 'required');
		$this->form_validation->set_rules('id_kwarran', 'Kwarran', 'required');
		$this->form_validation->set_rules('bsr_simpanan', 'Besar Simpanan', 'required');
		$this->form_validation->set_rules('tgl', 'Tanggal', 'required|trim|xss_clean');
		$this->form_validation->set_rules('penerima', 'Penerima', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$data['propinsi'] = $this->db->get('kwarran');
			$this->load->view('admin/simpanan_tambah', $data);	
		}else{
			$data_simpanan = array(
					'id_kwarran'	=> set_value('id_kwarran'),
					'id_users'		=> set_value('id_users'),
					'bsr_simpanan'	=> set_value('bsr_simpanan'),
					'tgl'			=> set_value('tgl'),
					'penerima'		=> set_value('penerima')
				);
				$this->model_simpanan->tambah_simpanan($data_simpanan);
				$this->session->set_flashdata('add','<div class="alert alert-success"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Data berhasil ditambah</div>');
				redirect('simpanan');		
		}
	}


	//controller untuk merubah simpanan
	public function ubah($id_simpanan)
	{
		$this->form_validation->set_rules('id_users', 'Anggota', 'required');
		$this->form_validation->set_rules('id_kwarran', 'Kwarran', 'required');
		$this->form_validation->set_rules('bsr_simpanan', 'Besar Simpanan', 'required');
		$this->form_validation->set_rules('tgl', 'Tanggal', 'required|trim|xss_clean');
		$this->form_validation->set_rules('penerima', 'Penerima', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['propinsi'] = $this->db->get('kwarran');
			$data['simpanan'] = $this->model_simpanan->find_id($id_simpanan);
			$this->load->view('admin/simpanan_edit', $data);
		 } else {
					$data_simpanan =	array(
					'id_kwarran'	=> set_value('id_kwarran'),
					'id_users'		=> set_value('id_users'),
					'bsr_simpanan'	=> set_value('bsr_simpanan'),
					'tgl'			=> set_value('tgl'),
					'penerima'		=> set_value('penerima')
					);
					$this->model_simpanan->rubah($id_simpanan, $data_simpanan);
					$this->session->set_flashdata('edit','<div class="alert alert-success"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Data berhasil diubah</div>');
					redirect('simpanan');
				
			}  
			
	}

	//controller untuk menghapus kwarran
	public function hapus($id_simpanan)
	{
		$this->model_simpanan->hapus($id_simpanan);
		$this->session->set_flashdata('delete','<div class="alert alert-success"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Data berhasil dihapus</div>');
		redirect('simpanan');
	}

	Public function get_countries()
	{
		$query=$this->db->get('kwarran');
        $result= $query->result();
        $data=array();
		foreach($result as $r)
		{
			$data['value']=$r->id_kwarran;
			$data['label']=$r->kwarran;
			$json[]=$data;
			
			
		}
		echo json_encode($json);
		

	
	}

	function kabupaten(){
        $propinsiID = $_GET['id_kwarran'];
        $kabupaten   = $this->db->get_where('users',array('id_kwarran'=>$propinsiID));
        echo "<select id='kabupaten' onChange='loadKecamatan()' class='form-control' name='id_users'>";
        foreach ($kabupaten->result() as $k)
        {
            echo "<option value='$k->id_users' id='id_users'>$k->nama_users</option>";
        }
        echo "</select></div>";
    }





}

