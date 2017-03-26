<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		if($this->session->userdata('group') != '1'){
			$this->session->set_flashdata('error','Sorry, you are not logged in!');
			redirect('login');
		}
		
		//load model -> model_users
		$this->load->model('model_users');
		//load model kwarran
		$this->load->model('model_kwarran');
	}
	
	public function index()
	{
		$data['users'] = $this->model_users->all();
		$this->load->view('admin/user_index', $data);
	}

	public function lihat($id_users)
	{
		$data['users'] = $this->model_users->find_users($id_users);
		$this->load->view('admin/user_detail', $data);
	}
	
	public function create(){
		$this->form_validation->set_rules('id_kwarran', 'Kwarran', 'required');
		$this->form_validation->set_rules('nama_users', 'Nama User', 'required');
		$this->form_validation->set_rules('no_gudep', 'No Gudep', 'required|valid_gudep|is_unique[users.no_gudep]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
		$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'trim|required|matches[password]|md5');
		$this->form_validation->set_rules('telp', 'Telp', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$data['kwarran'] = $this->model_kwarran->semua_kwarran();
			$this->load->view('admin/user_tambah',$data);	
		}else{
			$data_users =	array(
					'id_kwarran'	=> set_value('id_kwarran'),
					'no_gudep'		=> set_value('no_gudep'),
					'nama_users'	=> set_value('nama_users'),
					'password'		=> set_value ('password'),
					'telp'	        => set_value('telp'),
					'alamat'		=> set_value('alamat'),
					'email'			=> set_value('email'),
					'group'			=> set_value('group')
				);
				$this->model_users->create($data_users);
				$this->session->set_flashdata('add','<div class="alert alert-success"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Data berhasil ditambah</div>');
				redirect('users');
		}
	
	}

	public function update($id_users){
		$this->form_validation->set_rules('id_kwarran', 'Kwarran', 'required');
		$this->form_validation->set_rules('nama_users', 'Nama User', 'required');
		$this->form_validation->set_rules('no_gudep', 'No Gudep', 'required');
		$this->form_validation->set_rules('telp', 'Telp', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['kwarran'] = $this->model_kwarran->semua_kwarran();
			$data['users'] = $this->model_users->find_users($id_users);
			$this->load->view('admin/user_edit', $data);
		 } else {
					$data_users =	array(
						'id_kwarran'	=> set_value('id_kwarran'),
						'no_gudep'		=> set_value('no_gudep'),
						'nama_users'	=> set_value('nama_users'),
						'email'			=> set_value('email'),
						'telp'			=> set_value('telp'),
						'alamat'		=> set_value('alamat')
					);
					$this->model_users->update($id_users, $data_users);
					$this->session->set_flashdata('add','<div class="alert alert-success"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Data berhasil diubah</div>');
					redirect('users');
				
			} 
			
	}


	
	//ganti password
	public function update_password($id_users){
	$this->form_validation->set_rules('password', 'password', 'required|md5');
	$this->form_validation->set_rules('re_password', 're_password', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['users'] = $this->model_users->find_users($id_users);
			$this->load->view('backend/form_ganti_password', $data);
		 } else {
				
						$data_users =	array(
						
						'password'		=> set_value ('password')
						
						);
						$this->model_users->update($id_users, $data_users);
						redirect('admin/users');
					
					
				}	
		
	}
	
	public function ganti_pass($id_users){
		$data['users'] = $this->model_users->find_users($id_users);
		$this->load->view('backend/form_ganti_password');
	}

	public function aktifkan($id_users){
		$this->model_users->aktif($id_users);
		redirect('users');
	}
	
	public function delete($id){
		$this->model_users->delete($id);
		$this->session->set_flashdata('delete','<div class="alert alert-success"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Data berhasil dihapus</div>');
		redirect('users');
	}

}